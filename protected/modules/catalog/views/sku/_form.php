<?php
/* @var $this SkuController */
/* @var $model Sku */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'sku-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php
    $propNames = json_decode($model->props_name, true);
    $propNames = implode(';', $propNames);
    ?>
	<?php echo $form->textFieldControlGroup($model, 'props_name', array('class'=>'span8', 'disabled' => 'disabled', 'value' => $propNames)); ?>

    <?php
    $this->widget('ext.elFinder.ServerFileInput', array(
        'model' => new ItemImg(),
        'attribute' => 'pic',
        'models' => $model->skuImgs,
        'attributes' => array('item_img_id'),
        'filebrowserBrowseUrl' => Yii::app()->createUrl('core/elfinder/view'),
        'isMulti' => true,
    ));
    ?>

    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    ));
    ?>

<?php $this->endWidget(); ?>

</div><!-- form -->