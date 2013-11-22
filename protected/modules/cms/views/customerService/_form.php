<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'customer-service-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php
echo '<select id="CustomerService_category_id" name="CustomerService[category_id]">';

$category = Category::model()->findByPk(104);
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


<?php echo $form->dropDownListRow($model, 'type', array('1' => 'QQ', '2' => '阿里旺旺', '3' => 'Skype')); ?>

<?php echo $form->textFieldRow($model, 'nick_name', array('size' => 50, 'maxlength' => 50)); ?>


<?php echo $form->textFieldRow($model, 'account', array('size' => 60, 'maxlength' => 100)); ?>

<?php echo $form->dropDownListRow($model, 'is_show', array('1' => '是', '0' => '否')); ?>

<?php echo $form->textFieldRow($model, 'sort_order'); ?>

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