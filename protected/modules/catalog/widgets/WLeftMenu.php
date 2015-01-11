<?php
/**
 * Created by PhpStorm.
 * User: Yinhe
 * Date: 1/9/2015
 * Time: 3:41 PM
 */

class WLeftMenu extends CWidget {

    public function run() {
        $cat = isset($_GET['cat']) ? $_GET['cat'] : 3;
        $model = Category::model()->findByAttributes(array('url' => $cat,'root' => 3));
        $childs=$model->children()->findAll();
//        foreach($childs as $child)
//            $ids[] = $child->id;
        $this->render('left_menu', array(
            'childs' => $childs,
            'model' => $model
        ));
    }

}