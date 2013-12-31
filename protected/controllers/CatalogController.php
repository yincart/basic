<?php

class CatalogController extends YController
{
    public function actionIndex($key = 3, $prop = '')
    {
        $category = is_numeric($key) ? Category::model()->findByPk($key) : Category::model()->findByAttributes(array('url' => $key));
        if (empty($category) || $category->root != 3) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $parentCategories = $category->parent()->findAll();
        $parentCategories = array_reverse($parentCategories);
        $categoryIds = array($category->category_id);
        foreach ($parentCategories as $cate) {
            if (!$cate->isRoot()) {
                $this->breadcrumbs[] = array('name' => $cate->name . '>>', 'url' => Yii::app()->createUrl('catalog/index', array('key' => $cate->getUrl())));
                $categoryIds[] = $cate->category_id;
            }
        }
        $this->breadcrumbs[] = array('name' => $category->name, 'url' => Yii::app()->createUrl('catalog/index', array('key' => $category->getUrl())));
        Yii::app()->params['categoryIds'] = $categoryIds;

        $descendantIds = $category->getDescendantIds();
        $criteria = new CDbCriteria();
        $criteria->addInCondition('category_id', $descendantIds);
        if (!empty($prop)) {
            $pvids = array();
            $props = explode(';', $prop);
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
                    $where = [];
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
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 12;
        $pages->applyLimit($criteria);
        $items = Item::model()->findAll($criteria);
        $this->render('index', array(
            'key' => $key,
            'category' => $category,
            'items' => $items,
            'pages' => $pages,
        ));
    }
}