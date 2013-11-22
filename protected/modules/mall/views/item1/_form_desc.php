<?php echo $form->textAreaRow($model, 'desc', array('visibility' => 'hidden')); ?>
<?php

$this->widget('ext.kindeditor.KindEditorWidget', array(
    'id' => 'Item_desc', //Textarea id
    'items' => array(
        'width' => '700px',
        'height' => '300px',
        'themeType' => 'simple',
        'allowImageUpload' => true,
        'allowFileUpload' => true,
        'allowFileManager' => true,
        'items' => array(
            'source', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
            'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
            'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
            'emoticons', 'image', 'multiimage', 'link',
        ),
    ),
    'options' => array('action' => $action)
//            'options' => array('action' => $action, 'id' => $id)
));
?>
  