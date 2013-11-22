<?php

class Delivery_addressController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/member';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'create', 'update', 'dynamiccities', 'dynamicdistrict'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
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
        $model = new AddressResult;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['AddressResult'])) {
            $model->attributes = $_POST['AddressResult'];
            if ($model->save())
                $this->redirect(array('admin'));
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

        if (isset($_POST['AddressResult'])) {
            $model->attributes = $_POST['AddressResult'];
            if ($model->save())
                $this->redirect(array('admin'));
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
        $dataProvider = new CActiveDataProvider('AddressResult');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new AddressResult('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['AddressResult']))
            $model->attributes = $_GET['AddressResult'];

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
        $model = AddressResult::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'address-result-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDynamiccities() {
        echo $_GET['AddressResult_state'];
        $data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $_GET['AddressResult_state']));

        $data = CHtml::listData($data, "id", "name");
        echo CHtml::tag("option", array("value" => ''), '', true);
        foreach ($data as $value => $name) {
            echo CHtml::tag("option", array("value" => $value), CHtml::encode($name), true);
        }
    }

    public function actionDynamicdistrict() {
        if ($_GET["AddressResult_city"]) {
            $data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $_GET["AddressResult_city"]));

            $data = CHtml::listData($data, "id", "name");
            foreach ($data as $value => $name) {
                echo CHtml::tag("option", array("value" => $value), CHtml::encode($name), true);
            }
        }
    }

    public function actionSetToDefault() {
        $id = $_REQUEST['id'];
        $cri = new CDbCriteria(array(
                    'condition' => 'is_default = 1'
                ));
        $address = Address::model()->find($cri);
        if ($address) {
            $address->is_default = 0;

            if ($address->save()) {
                $address_now = Address::model()->findByPk($id);
                $address_now->is_default = 1;
//           $address_now->save();
                if ($address_now->save())
                    echo '设置成功';
//             $this->refresh();
            }
        }else {
            $address_now = Address::model()->findByPk($id);
            $address_now->is_default = 1;
//           $address_now->save();
            if ($address_now->save())
                echo '设置成功';
//             $this->refresh();
        }
    }

}
