<?php

class ItemPropController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/mall';
    public $parent;

    function init() {
        parent::init();
        //上一级 可支持无限级 分类
        //上一级 可支持无限级 分类
        $data = ItemProp::model()->findAll(array('order' => 'sort_order asc, prop_id asc'));
        $parent = CHtml::tag('option', array('value' => 0), F::t('Please Select'));
        $this->parent = $parent . F::toTree($data, $model->prop_id, 'prop_id', 'parent_prop_id', 'prop_name', 1);
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new ItemProp;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ItemProp'])) {
            $model->attributes = $_POST['ItemProp'];
            if ($model->save()){
                
                if (isset($_POST['PropValue']))
                $model->setPropValues($_POST['PropValue']);
                
                $this->redirect(array('view', 'id' => $model->prop_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ItemProp'])) {
            $model->attributes = $_POST['ItemProp'];
            
            if (isset($_POST['PropValue']))
                $model->setPropValues($_POST['PropValue']);
            
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->prop_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ItemProp');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ItemProp('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ItemProp']))
            $model->attributes = $_GET['ItemProp'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = ItemProp::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'item-prop-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
