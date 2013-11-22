<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php
if (!$model->isNewRecord) {
    $category_check = Category::model()->findByPk($model->id);
    $parent = $category_check->parent()->find();
}
echo '<select id="Category_node" name="Category[node]">';
$categories = Category::model()->roots()->findAll();
$level = 1;
echo '<option value="0">请选择分类</option>';
foreach ($categories as $n => $category) {
    if (!$model->isNewRecord) {
        if ($parent->id == $category->id) {
            $selected = 'selected';
            echo '<option value="' . $category->id . '" selected="' . $selected . '">' . $category->name . '</option>';
        } else {
            echo '<option value="' . $category->id . '">' . $category->name . '</option>';
        }
    } else {
        echo '<option value="' . $category->id . '">' . $category->name . '</option>';
    }

    $children = $category->descendants()->findAll();
    foreach ($children as $child) {
        $string = '&nbsp;&nbsp;';
        $string .= str_repeat('│&nbsp;&nbsp;', $child->level - $level - 1);
        if ($child->isLeaf() && !$child->next()->find()) {
            $string .= '└';
        } else {

            $string .= '├';
        }
        $string .= '─' . $child->name;
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
}
echo '</select>';
?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->fileFieldRow($model,'pic',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->dropDownListRow($model,'if_show',array('1'=>'是', '0'=>'否')); ?>

	<?php echo $form->textAreaRow($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
