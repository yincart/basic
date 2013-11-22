<?php

class FriendLinkController extends Controller {

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
        $model = new FriendLink;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['FriendLink'])) {
            $model->attributes = $_POST['FriendLink'];
            $img = CUploadedFile::getInstance($model, 'image');
            if ($img) {
                if ($img->size > 2000000) {
                    $img_size = ($img->size) / 1000;
                    echo '<script>alert("图片大小为' . $img_size . 'KB,请小于2M")</script>';
                } else {
                    $extensionName = explode('.', $img->getName());
                    $extensionName = $extensionName[count($extensionName) - 1];
                    $dir = dirname(Yii::app()->basePath) . '/upload/link/';
                    $img_src = $dir . md5(time()) . '.' . $extensionName;
                    $img1 = md5(time()) . '.' . $extensionName;
                    $model->image = $img1;
                }
            } else {
                echo '<script>alert("请上传图片.")</script>';
            }
            if ($model->save()) {
                $img->saveAs($img_src);
                $this->redirect(array('/cms/friendLink/admin'));
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
        if (isset($_POST['FriendLink'])) {

            $model->attributes = $_POST['FriendLink'];
            $FriendLink = FriendLink::model()->findByPk($id);
            $img = $_FILES['FriendLink']['name']['image'];
            if ($img !== '') {
                $img = CUploadedFile::getInstance($model, 'image');
                $extensionName = explode('.', $img->getName());
                $extensionName = $extensionName[count($extensionName) - 1];
                $dir = dirname(Yii::app()->basePath) . '/upload/link/';
                $img_src = $dir . md5(time()) . '.' . $extensionName;
                $img1 = md5(time()) . '.' . $extensionName;
                $model->image = $img1;
            } else {
                $model->image = $FriendLink->image;
            }
            //$model->cate_id = $_POST['Caigou']['cate_id'];
            if ($model->save()) {
                if ($img !== '') {
                    @unlink(dirname(Yii::app()->basePath) . '/upload/link/' . $FriendLink->image);
                    $img->saveAs($img_src);
                }
                $this->redirect(array('/cms/friendLink/admin'));
            }
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
        $dataProvider = new CActiveDataProvider('FriendLink');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new FriendLink('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['FriendLink']))
            $model->attributes = $_GET['FriendLink'];
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
        $model = FriendLink::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'friend-link-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
