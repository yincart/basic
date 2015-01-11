<?php
$this->widget('ext.elFinder.ServerFileInput', array(
    'model' => new ItemImg(),
    'attribute' => 'pic',
    'models' => $model->itemImgs,
    'attributes' => array('item_img_id'),
    'filebrowserBrowseUrl' => Yii::app()->createUrl('core/elfinder/view'),
    'isMulti' => true,
));