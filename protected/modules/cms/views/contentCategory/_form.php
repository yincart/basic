<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'category-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php
if (!$model->isNewRecord) {
    $category_check = Category::model()->findByPk($model->id);
    $parent = $category_check->parent()->find();
}
echo '<select id="Category_node" name="Category[node]">';

$descendants = Category::model()->findAll(array('condition' => 'root=1', 'order' => 'lft'));
$level = 1;
foreach ($descendants as $child) {
    $string = '&nbsp;&nbsp;';
    $string .= str_repeat('&nbsp;&nbsp;', 2*($child->level - $level));
//    if ($child->isLeaf() && !$child->next()->find()) {
//        $string .= '&nbsp;&nbsp;';
//    } else {
//
//        $string .= '';
//    }
    $string .= $child->name;
//		echo $string;
    if (!$model->isNewRecord) {
        if ($parent->id == $child->id) {
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

    <?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

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
