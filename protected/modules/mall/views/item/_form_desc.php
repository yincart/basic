<?php
$this->widget('ext.ckeditor.CKEditor', array(
    'model' => $model,
    'attribute' => 'desc',
    'options' => array('filebrowserBrowseUrl' => Yii::app()->createUrl('mall/elfinder/view')),
));
?>