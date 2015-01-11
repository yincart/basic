<?php
/**
 * Created by PhpStorm.
 * User: Yinhe
 * Date: 1/10/2015
 * Time: 12:57 PM
 */
class ErrorController extends Controller {

    public function actionIndex() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('index', $error);
        }    }
}