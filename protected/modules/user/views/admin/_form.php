<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
	));
?>

<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

<?php echo $form->errorSummary(array($model, $profile)); ?>

<?php echo $form->textFieldRow($model, 'username', array('size' => 20, 'maxlength' => 20)); ?>

<?php echo $form->passwordFieldRow($model, 'password', array('size' => 60, 'maxlength' => 128)); ?>

<?php echo $form->textFieldRow($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>

<?php echo $form->dropDownListRow($model, 'superuser', User::itemAlias('AdminStatus')); ?>

<?php echo $form->dropDownListRow($model, 'status', User::itemAlias('UserStatus')); ?>
<?php
$profileFields = Profile::getFields();
if ($profileFields) {
    foreach ($profileFields as $field) {
	?>

	<?php
	if ($widgetEdit = $field->widgetEdit($profile)) {
	    echo $widgetEdit;
	} elseif ($field->range) {
	    echo $form->dropDownListRow($profile, $field->varname, Profile::range($field->range));
	} elseif ($field->field_type == "TEXT") {
	    echo $form->textAreaRow($profile, $field->varname, array('rows' => 6, 'cols' => 50));
	} else {
	    echo $form->textFieldRow($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
	}
	?>
	<?php
    }
}
?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType' => 'submit',
	'type' => 'primary',
	'label' => $model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>