<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
	));
?>

<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

<?php echo $form->errorSummary(array($model, $profile)); ?>

<?php echo $form->textFieldControlGroup($model, 'username', array('size' => 20, 'maxlength' => 20)); ?>

<?php echo $form->passwordFieldControlGroup($model, 'password', array('size' => 60, 'maxlength' => 128)); ?>

<?php echo $form->textFieldControlGroup($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>

<?php echo $form->dropDownListControlGroup($model, 'superuser', User::itemAlias('AdminStatus')); ?>

<?php echo $form->dropDownListControlGroup($model, 'status', User::itemAlias('UserStatus')); ?>
<?php
$profileFields = Profile::getFields();
if ($profileFields) {
    foreach ($profileFields as $field) {
	?>

	<?php
	if ($widgetEdit = $field->widgetEdit($profile)) {
	    echo $widgetEdit;
	} elseif ($field->range) {
	    echo $form->dropDownListControlGroup($profile, $field->varname, Profile::range($field->range));
	} elseif ($field->field_type == "TEXT") {
	    echo $form->textAreaControlGroup($profile, $field->varname, array('rows' => 6, 'cols' => 50));
	} else {
	    echo $form->textFieldControlGroup($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
	}
	?>
	<?php
    }
}
?>
<?php
echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
));
?>

<?php $this->endWidget(); ?>