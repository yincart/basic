<?php

class CatalogController extends YController
{
    public function actionIndex($key = 3, $prop = '')
    {
        $category = is_numeric($key) ? Category::model()->findByPk($key) : Category::model()->findByAttributes(array('url' => $key));
        if (empty($category) || $category->root != 3) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $temp_categroy = $category;
        while(!$temp_categroy->isRoot()) {
            array_unshift($this->breadcrumbs, array('name' => $temp_categroy->name, 'url' => Yii::app()->createUrl('catalog/index', array('key' => $temp_categroy->getUrl()))));
            $temp_categroy = $temp_categroy->parent();
        }

        $descendants = $category->descendants()->findAll();
        $ids = array($category->id);
        foreach ($descendants as $descendant)
            $ids[] = $descendant->id;
        $criteria = new CDbCriteria();
        $criteria->addInCondition('category_id', $ids);
        if(!empty($prop)) {
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
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        $items = Item::model()->findAll($criteria);
        $this->render('index', array(
            'category' => $category,
            'items' => $items,
            'pages' => $pages,
            'key' => $key
        ));
    }
}