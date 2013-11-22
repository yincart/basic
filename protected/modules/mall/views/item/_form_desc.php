
    <?php echo $form->textAreaControlGroup($model, 'desc', array('visibility' => 'hidden')); ?>
    <?php
    $this->widget('comext.kindeditor.KindEditorWidget', array(
	'id' => 'Item_desc', //Textarea id
	'language' => 'zh_CN',
	'items' => array(
	    'width' => '700px',
	    'height' => '300px',
	    'themeType' => 'simple',
	    'allowImageUpload' => true,
	    'allowFileUpload' => true,
	    'allowFileManager' => true,
	    'newlineTag' => 'br',
	    'items' => array(
		'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
		'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
		'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
		'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
		'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
		'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
		'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
		'anchor', 'link', 'unlink'
	    ),
	),
	'options' => array(
	    'action' => $action,
	    'base_url' => $base_url,
	    'id' => $id,
	    'type' => $type
	)
//            'options' => array('action' => $action, 'id' => $id)
    ));
    ?>