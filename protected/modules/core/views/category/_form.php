                      <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php
if (!$model->isNewRecord) {
    $category_check = Category::model()->findByPk($model->category_id);
    $parent = $category_check->parent()->find();
}
echo '<select id="Category_node" name="Category[node]">';
$categories = Category::model()->roots()->findAll();
$level = 1;
echo '<option value="0">请选择分类</option>';

foreach ($categories as $n => $category) {
    if (!$model->isNewRecord) {
        if ($parent->category_id == $category->category_id) {
            $selected = 'selected';
            echo '<option value="' . $category->category_id . '" selected="' . $selected . '">' . $category->name . '</option>';
        } else {
            echo '<option value="' . $category->category_id . '">' . $category->name . '</option>';
        }
    } else {
        echo '<option value="' . $category->category_id . '">' . $category->name . '</option>';
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
            if ($parent->category_id == $child->category_id) {
                $selected = 'selected';

                echo '<option value="' . $child->category_id . '" selected="' . $selected . '">' . $string . '</option>';
            } else {
                echo '<option value="' . $child->category_id . '" >' . $string . '</option>';
            }
        } else {
            echo '<option value="' . $child->category_id . '" >' . $string . '</option>';
        }
    }
}
echo '</select>';
?>

	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldControlGroup($model,'url',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->fileFieldControlGroup($model,'pic',array('class'=>'span5','maxlength'=>255)); ?>

<!--	--><?php //echo $form->textFieldControlGroup($model,'position',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->dropDownListControlGroup($model,'is_show',array('1'=>'是', '0'=>'否')); ?>

<!--	--><?php //echo $form->textAreaControlGroup($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php echo TbHtml::formActions(array(
            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::resetButton('Reset'),
        )); ?>
	</div>

                     
<?php $this->endWidget(); ?>
