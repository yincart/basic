<div class="container">
    <?php
    $this->widget('xupload.XUpload', array(
        'url' => Yii::app()->createUrl("/admin/item/upload", array("parent_id" => 1)),
        'model' => $upload,
        'attribute' => 'file',
        'multiple' => true,
        'htmlOptions' => array('id'=>'item-form'),
    ));
    //echo Yii::app()->getBasePath() . "/../upload/item/image".'<br />';
    //echo 'http://img.'.F::sg('site', 'domain'). "/item/image";
    //echo $_SESSION['store']['store_id'];
    if(!$item->isNewRecord){
        $cri = new CDbCriteria(array(
            'condition'=>'item_id ='.$item->item_id,
            'order'=>'position'
        ));
        $images = ItemImg::model()->findAll($cri);
        foreach($images as $i) {
            echo CHtml::image('http://'.F::sg('site','imageDomain').'/store/'.$id.'/item/image/'.$i->url, '', array('style'=>'width:100px;padding-right:10px'));
        }

    }
    ?>
</div>