<?php
/**
 * Created by PhpStorm.
 * User: Yinhe
 * Date: 2/13/2015
 * Time: 8:45 PM
 */

class TuiController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionMuyin() {
        $this->render('muyin');
    }

    public function actionJiadian() {
        $this->render('jiadian');
    }

    public function actionMeizhuang() {
        $this->render('meizhuang');
    }

    public function actionBaojian() {
        $this->render('baojian');
    }
}