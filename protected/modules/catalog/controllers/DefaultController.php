<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$cat = isset($_GET['cat']) ? $_GET['cat'] : 3;
		$category = is_numeric($cat) ? Category::model()->findByPk($cat) : Category::model()->findByAttributes(array('url' => $cat));

		if (empty($category) || $category->root != 3) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}

		$descendantIds = $category->getDescendantIds();
		$criteria = new CDbCriteria();
		$criteria->addInCondition('category_id', $descendantIds);

		if (!empty($_GET['key'])) {
			$criteria->addCondition("(t.title LIKE '%{$_GET['key']}%')");
		}
		if(!empty($_GET['floor_price'])&&!empty($_GET['top_price'])&&$_GET['top_price']<$_GET['floor_price']) {
			$criteria->addCondition("t.price >= '{$_GET['top_price']}'");
			$criteria->addCondition("t.price <= '{$_GET['floor_price']}'");
		} else {
			if (!empty($_GET['floor_price'])) {
				$criteria->addCondition("t.price >= '{$_GET['floor_price']}'");
			}
			if (!empty($_GET['top_price'])) {
				$criteria->addCondition("t.price <= '{$_GET['top_price']}'");
			}
		}
		if (!empty($_GET['has_stock']) && $_GET['has_stock']) {
			$criteria->addCondition("t.stock > 0");
		}
		if (!empty($_GET['sort'])) {
			switch ($_GET['sort']) {
				case 'sold':
					break;
				case 'soldd':
					break;
				case 'price':
					$criteria->order = 't.price';
					break;
				case 'priced':
					$criteria->order = 't.price desc';
					break;
				case 'new':
					$criteria->order = 't.update_time';
					break;
				case 'newd':
					$criteria->order = 't.update_time desc';
					break;
				default:
					$criteria->order = 't.click_count desc';
					break;
			}
		}

		if (!empty($_GET['props'])) {
			$pvids = array();
			$props = explode(';', $_GET['props']);
			foreach ($props as $p) {
				$ids = explode(':', $p);
				if (count($ids) >= 2) {
					if (isset($pvids[$ids[0]])) {
						if (!is_array($pvids[$ids[0]]))
							$pvids[$ids[0]] = array($pvids[$ids[0]]);
						$pvids[$ids[0]][] = $ids[1];
					} else {
						$pvids[$ids[0]] = $ids[1];
					}
				}
			}
			foreach ($pvids as $pid => $vids) {
				if (is_array($vids)) {
					$where = array();
					foreach ($vids as $vid) {
						$where[] = "props like '%$pid:$vid%'";
					}
					$where = '(' . implode(' OR ', $where) . ')';
					$criteria->addCondition($where);
				} else {
					$criteria->addSearchCondition('props', $pid . ':' . $vids);
				}
			}
		}
		$count = Item::model()->count($criteria);
		$pager = new CPagination($count);
		$pager->pageSize =8;
		$pager->applyLimit($criteria);
		$items = Item::model()->findAll($criteria);
//        var_dump($criteria);die;
		$parentCategories = $category->parent()->findAll();
		$parentCategories = array_reverse($parentCategories);
		$categoryIds = array($category->category_id);
		$params = array();
		if (!empty($_GET['key'])) {
			$params['key'] = $_GET['key'];
		}
		foreach ($parentCategories as $cate) {
			if (!$cate->isRoot()) {
				$params['cat'] = $cate->getUrl();
				$this->breadcrumbs[] = array('name' => $cate->name . '>> ', 'url' => Yii::app()->createUrl('catalog/index', $params));
				$categoryIds[] = $cate->category_id;
			}
		}
		$params['cat'] = $category->getUrl();
		$this->breadcrumbs[] = array('name' => $category->name, 'url' => Yii::app()->createUrl('catalog/index', $params));
		Yii::app()->params['categoryIds'] = $categoryIds;
//        Yii::app()->params['h']= $category->Keywords;
//        Yii::app()->params['d']= $category->des;
//        Yii::app()->params['t']= $category->title;


		$categories = $category->children()->findAll();
		$itemProps = ItemProp::model()->with('propValues')->findAll(new CDbCriteria(array('condition' => "t.`category_id` = $category->category_id AND t.`type` > 1")));
		$this->render('index', array(
			'cat' => $cat,
			'count' => $count,
			'category' => $category,
			'items' => $items,
			'pager' => $pager,
			'categories' => $categories,
			'itemProps' => $itemProps,
			'sort' => $_GET['sort'],
			'key' => $_GET['key'],
		));
	}
}