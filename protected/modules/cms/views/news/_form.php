<?php
$action = 'post';
//$id = Yii::app()->user->id;
//$id = array_rand(array_fill_keys(range('a','z'), null), 1);
$id = NULL;
Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&id=' . $id . '"', CClientScript::POS_HEAD);
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'post-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
        ));
?>


<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php
echo '<select id="News_category_id" name="News[category_id]">';

$category = Category::model()->findByPk(5);
$descendants = $category->descendants()->findAll();
$level = 1;
echo '<option value="">请选择分类</option>';
foreach ($descendants as $child) {
    $string = '&nbsp;&nbsp;';
    $string .= str_repeat('&nbsp;&nbsp;', $child->level - $level);
    if ($child->isLeaf() && !$child->next()->find()) {
        $string .= '';
    } else {

        $string .= '';
    }
    $string .= '' . $child->name;
//		echo $string;
    if (!$model->isNewRecord) {
        if ($model->category_id == $child->id) {
            $selected = 'selected';

            echo '<option value="' . $child->category_id . '" selected="' . $selected . '">' . $string . '</option>';
        } else {
            echo '<option value="' . $child->category_id . '" >' . $string . '</option>';
        }
    } else {
        echo '<option value="' . $child->category_id . '" >' . $string . '</option>';
    }
}
echo '</select>';
?>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5')); ?>

<?php echo $form->dropDownListControlGroup($model, 'language', array('en_us' => 'English' , 'zh_cn' => '中文')); ?>

<?php echo $form->textFieldControlGroup($model, 'source', array('class' => 'span5', 'value' => '本站')); ?>

<?php echo $form->textFieldControlGroup($model, 'tags', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'status', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'author', array('class' => 'span5', 'value' => Yii::app()->user->name)); ?>

<?php $this->widget('ext.elFinder.ServerFileInput', array(
    'model' => $model,
    'attribute' => 'pic_url',
    'filebrowserBrowseUrl' => Yii::app()->createUrl('mall/elfinder/view'),
));?>

<?php echo $form->textAreaControlGroup($model, 'summary', array('class' => 'span5', 'style'=>'height:100px')); ?>

<?php echo $form->textAreaControlGroup($model, 'content', array('visibility' => 'hidden')); ?>
<?php
$this->widget('ext.kindeditor.KindEditorWidget', array(
    'id' => 'Post_content', //Textarea id
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
    'options' => array('action' => $action, 'id' => $id)
));
?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>

<?php $this->endWidget(); ?>
