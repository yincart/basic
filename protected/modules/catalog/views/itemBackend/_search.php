<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'item_id',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'category_id',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'type_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'sn',array('class'=>'span5','maxlength'=>60)); ?>

		<?php echo $form->textFieldRow($model,'unit',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'stock',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'min_number',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'market_price',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'shop_price',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'currency',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textAreaRow($model,'skus',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'props',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'props_name',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'item_imgs',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'prop_imgs',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'pic_url',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textAreaRow($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'location',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'post_fee',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'express_fee',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'ems_fee',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'is_show',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'is_promote',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'is_new',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'is_hot',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'is_best',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'is_discount',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'click_count',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'sort_order',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'language',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
