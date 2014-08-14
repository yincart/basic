<div class="form">

   <?php ?>
<?php
    if($model->contact_name) {
        $form=$this->beginWidget('CActiveForm', array(
            'id'=>'address-result-form',
            'enableAjaxValidation'=>false,
            'enableClientValidation'=>true
        ));
    } else {
        $form=$this->beginWidget('CActiveForm', array(
            'id'=>'address-result-form',
            'action' => 'create',
            'enableAjaxValidation'=>false,
            'enableClientValidation'=>true
        ));
    }
 ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'contact_name',array('class'=>'col-xs-2 control-label')); ?>
        <div class="col-xs-7">
		    <?php echo $form->textField($model,'contact_name',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
        </div>
		<?php echo $form->error($model,'contact_name'); ?>
	</div>

    <div class="form-group" style="height:40px; overflow:hidden;border:1px solid white">
        <label class="col-xs-2 control-label" ><b>所在地区：</b><span class="required">*</span></label>
        <?php
        $state_data=  Area::model()->findAll("grade=:grade",
            array(":grade"=>1));
        $state=CHtml::listData($state_data,"area_id","name");
        $s_default = $model->isNewRecord ? '' : $model->state;
        echo '&nbsp;&nbsp;&nbsp;&nbsp;'.CHtml::dropDownList('AddressResult[state]', $s_default, $state,
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
            $city=CHtml::listData($city_data,"area_id","name");
        }

        $city_update = $model->isNewRecord ? array() : $city;
        echo '&nbsp;&nbsp;'.CHtml::dropDownList('AddressResult[city]', $c_default, $city_update,
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
            $district=CHtml::listData($district_data,"area_id","name");
        }
        $district_update = $model->isNewRecord ? array() : $district;
        echo '&nbsp;&nbsp;'.CHtml::dropDownList('AddressResult[district]', $d_default, $district_update,
                array(
                    'empty'=>'请选择地区',
                )
            );
        ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'zipcode',array('class'=>'col-xs-2 control-label')); ?>
        <div class="col-xs-7">
            <?php echo $form->textField($model,'zipcode',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
        </div>
        <?php echo $form->error($model,'zipcode'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'address',array('class'=>'col-xs-2 control-label')); ?>
        <div class="col-xs-7">
            <?php echo $form->textField($model,'address',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
        </div>
        <?php echo $form->error($model,'address'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'mobile_phone',array('class'=>'col-xs-2 control-label')); ?>
        <div class="col-xs-7">
            <?php echo $form->textField($model,'mobile_phone',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
        </div>
        <?php echo $form->error($model,'mobile_phone'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'phone',array('class'=>'col-xs-2 control-label')); ?>
        <div class="col-xs-7">
            <?php echo $form->textField($model,'phone',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
        </div>
        <?php echo $form->error($model,'phone'); ?>
    </div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'is_default',array('class'=>'col-xs-2 control-label')); ?>
        <div class="col-xs-7">
		    <?php echo $form->dropDownlist($model,'is_default', array('0'=>'否', '1'=>'是'),array('class'=>'form-control')); ?>
        </div>
		<?php echo $form->error($model,'is_default'); ?>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'memo',array('class'=>'col-xs-2 control-label')); ?>
        <div class="col-xs-7">
            <?php echo $form->textArea($model,'memo',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
        </div>
        <?php echo $form->error($model,'memo'); ?>
    </div>

	<div class="row buttons " style="margin-left: 35px;">
		<?php echo
        CHtml::submitButton($model->isNewRecord ? '创建' : '保存',array('class'=>'btn btn-success ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->