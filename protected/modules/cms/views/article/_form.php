<?php
$action = 'article';
//$id = Yii::app()->user->id;
//$id = array_rand(array_fill_keys(range('a','z'), null), 1);
$id = NULL;
Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&id=' . $id . '"', CClientScript::POS_HEAD);
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'article-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
        ));
?>


<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php
echo '<select id="Article_category_id" name="Article[category_id]">';

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

            echo '<option value="' . $child->id . '" selected="' . $selected . '">' . $string . '</option>';
        } else {
            echo '<option value="' . $child->id . '" >' . $string . '</option>';
        }
    } else {
        echo '<option value="' . $child->id . '" >' . $string . '</option>';
    }
}
echo '</select>';
?>
<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5')); ?>


<?php echo $form->dropDownListRow($model, 'language', array('en_us' => 'English' , 'zh_cn' => '中文')); ?>


<?php echo $form->textFieldRow($model, 'from', array('class' => 'span5', 'value' => '本站')); ?>


<?php echo $form->textFieldRow($model, 'url', array('class' => 'span5')); ?>

<?php echo $form->textAreaRow($model, 'summary', array('class' => 'span5', 'style'=>'height:100px')); ?>

<?php echo $form->textAreaRow($model, 'content', array('visibility' => 'hidden')); ?>
<?php
$this->widget('comext.kindeditor.KindEditorWidget', array(
    'id' => 'Article_content', //Textarea id
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

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
