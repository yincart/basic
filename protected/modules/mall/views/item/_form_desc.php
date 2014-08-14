<?php
    if($is_view)
    {
        echo $form->uneditableField($model,'desc');
    }
    else
    {
         $this->widget('ext.ckeditor.CKEditor', array(
          'model' => $model,
          'attribute' => 'desc',
          'options' => array('filebrowserBrowseUrl' => Yii::app()->createUrl('mall/elfinder/view')),
        ));
    }
?>