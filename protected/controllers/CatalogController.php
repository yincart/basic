<?php

class CatalogController extends Controller {

    public $layout = '//layouts/catalog';

    public function actionIndex($key) {
        $category=Category::model()->findByPk(3);
        $model = $category->findByAttributes(array('url' => $key));
        $childs=$model->descendants()->findAll();
        $ids = array($model->id);
        foreach($childs as $child)
        $ids[] = $child->id;
        $cid = implode(',', $ids);
        $criteria = new CDbCriteria(array(
                    'condition' => 'category_id in ( '.$cid. ')'
                ));
        $count = Item::model()->count($criteria);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        $items = Item::model()->findAll($criteria);
        $criteria = new CDbCriteria(array(
                    'condition' => 'is_hot = 1 and category_id in ( '.$cid. ')',
                    'limit' => '4'
                ));
        $hotItems = Item::model()->findAll($criteria);
        $this->render('index', array(
            'model' => $model,
            'items' => $items,
            'pages' => $pages,
            'hotItems' => $hotItems,
            'key' => $key
        ));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}