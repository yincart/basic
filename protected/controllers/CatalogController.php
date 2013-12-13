<?php

class CatalogController extends Controller
{
    public $layout = '//layouts/catalog';

    public function actionIndex($key = 3)
    {
        $category = is_numeric($key) ? Category::model()->findByPk($key) : Category::model()->findByAttributes(array('url' => $key));
        if (empty($category) || $category->root != 3) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $childs = $category->descendants()->findAll();
        $ids = array($category->id);
        foreach ($childs as $child)
            $ids[] = $child->id;
        $criteria = new CDbCriteria();
        $criteria->addInCondition('category_id', $ids);
        $count = Item::model()->count($criteria);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        $items = Item::model()->findAll($criteria);
        $criteria = new CDbCriteria();
        $criteria->addInCondition('category_id', $ids);
        $criteria->addCondition('is_hot = 1');
        $criteria->limit = 4;
        $hotItems = Item::model()->findAll($criteria);
        $this->render('index', array(
            'category' => $category,
            'items' => $items,
            'pages' => $pages,
            'hotItems' => $hotItems,
            'key' => $key
        ));
    }
}