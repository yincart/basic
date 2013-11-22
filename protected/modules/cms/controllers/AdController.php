<?php

class AdController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/cms';

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
        $model = new Ad('create');
        $action = 'ad';

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Ad'])) {
            $model->attributes = $_POST['Ad'];
            // file handling
            $imageUploadFile = CUploadedFile::getInstance($model, 'pic');
            if ($imageUploadFile !== null) { // only do if file is really uploaded
                $imageFileExt = $imageUploadFile->extensionName;

                $save_path = dirname(Yii::app()->basePath) . '/upload/' . $action . '/';
                if (!file_exists($save_path)) {
                    mkdir($save_path, 0777, true);
                }
                $ymd = date("Ymd");
                $save_path .= $ymd . '/';
                if (!file_exists($save_path)) {
                    mkdir($save_path, 0777, true);
                }
                $img_prefix = date("YmdHis") . '_' . rand(10000, 99999);
                $imageFileName = $img_prefix . '.' . $imageFileExt;
                $model->pic = $ymd . '/' . $imageFileName;
                $save_path .= $imageFileName;
            }
            if ($model->save()) {
                if ($imageUploadFile !== null) { // validate to save file
                    $imageUploadFile->saveAs($save_path);
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
            return true;
        }

        $this->render('create', array(
            'model' => $model
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->scenario = 'update';
        $action = 'ad';

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Ad'])) {
            $model->attributes = $_POST['Ad'];
            $imageUploadFile = CUploadedFile::getInstance($model, 'pic');
            if ($imageUploadFile !== null) { // only do if file is really uploaded
                $old_image = dirname(Yii::app()->basePath) . '/upload/' . $action . '/' . $model->pic;
                if (file_exists($old_image)) {
                    @unlink($old_image);
                }
                $imageFileExt = $imageUploadFile->extensionName;

                $save_path = dirname(Yii::app()->basePath) . '/upload/' . $action . '/';
                if (!file_exists($save_path)) {
                    mkdir($save_path, 0777, true);
                }
                $ymd = date("Ymd");
                $save_path .= $ymd . '/';
                if (!file_exists($save_path)) {
                    mkdir($save_path, 0777, true);
                }
                $img_prefix = date("YmdHis") . '_' . rand(10000, 99999);
                $imageFileName = $img_prefix . '.' . $imageFileExt;
                $model->pic = $ymd . '/' . $imageFileName;
                $save_path .= $imageFileName;
            } else {
                $model->pic = $model->pic;
            }

            if ($model->save()) {
                if ($imageUploadFile !== null) { // validate to save file
                    $imageUploadFile->saveAs($save_path);
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model
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
            $model = $this->loadModel($id);
            $image = dirname(Yii::app()->basePath) . '/upload/ad/'. $model->pic;
            if (file_exists($image)) {
                @unlink($image);
            }
            $model->delete();

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
        $dataProvider = new CActiveDataProvider('Ad');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Ad('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ad']))
            $model->attributes = $_GET['Ad'];

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
        $model = Ad::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'flash-ad-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
