<?php
/* @var $this SkuPriceController */
/* @var $model SkuPrice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'sku-price-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php
        $store = Store::model()->findAll();
        $store_list = CHtml::listData($store, 'store_id', 'name');
        echo $form->dropDownListControlGroup($model,'store_id', $store_list);
        ?>
        <?php echo $form->textFieldControlGroup($model,'sku_id', array('class'=>'span5', 'value'=>$_GET['sku_id'])); ?>
		<?php echo $form->textFieldControlGroup($model,'mode',array('class'=>'span5')); ?>
		<?php echo $form->textFieldControlGroup($model,'price',array('size'=>50,'maxlength'=>50)); ?>
    <?php
    $currency = Currency::model()->findAll();
    $currency_list = CHtml::listData($currency, 'currency_id', 'name');
    echo $form->dropDownListControlGroup($model,'currency_id', $currency_list);
    ?>
		<?php echo $form->dropDownListControlGroup($model,'is_safe', array('0'=>'否', '1'=>'是')); ?>
		<?php echo $form->dropDownListControlGroup($model,'shipping_method', array('0'=>'自己仓库发货', '1'=>'保税区发货', '2'=>'海外直邮')); ?>
        <?php echo $form->textFieldControlGroup($model,'url',array('class'=>'span5')); ?>

    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    ));
    ?>

<?php $this->endWidget(); ?>

</div><!-- form -->