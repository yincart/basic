<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'address-result-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_name'); ?>
		<?php echo $form->textField($model,'contact_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'contact_name'); ?>
	</div>

            <div class="row">
            <?php
                $state_data=  Area::model()->findAll("grade=:grade",
                  array(":grade"=>1));

                $state=CHtml::listData($state_data,"id","name");
                $s_default = $model->isNewRecord ? '' : $model->state;
                echo '省&nbsp;'.CHtml::dropDownList('AddressResult[state]', $s_default, $state,
                            array(
                            'empty'=>'请选择省份',   
                            'ajax' => array(
                            'type'=>'GET', //request type
                            'url'=>CController::createUrl('dynamiccities'), //url to call
                            'update'=>'#AddressResult_city', //selector to update
                            'data'   => 'js:"AddressResult_state="+jQuery(this).val()',
                            )));

                            //empty since it will be filled by the other dropdown
                $c_default = $model->isNewRecord ? '' : $model->city;
                if(!$model->isNewRecord){
                $city_data=Area::model()->findAll("parent_id=:parent_id",
                  array(":parent_id"=>$model->state));
                $city=CHtml::listData($city_data,"id","name");
                }

                $city_update = $model->isNewRecord ? array() : $city;
                echo '&nbsp;市&nbsp;'.CHtml::dropDownList('AddressResult[city]', $c_default, $city_update,
                            array(
                            'empty'=>'请选择城市',
                            'ajax' => array(
                            'type'=>'GET', //request type
                            'url'=>CController::createUrl('dynamicdistrict'), //url to call
                            'update'=>'#AddressResult_district', //selector to update
                            'data'  => 'js:"AddressResult_city="+jQuery(this).val()',
                            )));   
                $d_default = $model->isNewRecord ? '' : $model->district;
                if(!$model->isNewRecord){
                $district_data=Area::model()->findAll("parent_id=:parent_id",
                  array(":parent_id"=>$model->city));
                $district=CHtml::listData($district_data,"id","name");
                }          
                $district_update = $model->isNewRecord ? array() : $district;
                 echo '&nbsp;区&nbsp;'.CHtml::dropDownList('AddressResult[district]', $d_default, $district_update,
                         array(
                            'empty'=>'请选择地区', 
                         )
                         );
                         ?>
                <?php echo '&nbsp;邮政编号 <font color="red">*</font>：'.$form->textField($model,'zipcode',array('size'=>10,'maxlength'=>45)); ?>
                <?php echo $form->error($model,'zipcode'); ?>
            </div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'mobile_phone'); ?>
		<?php echo $form->textField($model,'mobile_phone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'mobile_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'is_default'); ?>
		<?php echo $form->dropDownlist($model,'is_default', array('0'=>'否', '1'=>'是')); ?>
		<?php echo $form->error($model,'is_default'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'memo'); ?>
		<?php echo $form->textArea($model,'memo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'memo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->