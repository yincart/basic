<?php if(!Yii::app()->user->isGuest){?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php //echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50));
                 $this->widget(
                        'ext.jmarkitup.JHtmlEditor',
                        array(
                            'model'=>$model,
                            'attribute'=>'content',
                            'theme'=>'simple',
                            'htmlOptions'=>array('rows'=>15, 'cols'=>50, 'style'=>'width:420px'),
                            'options'=>array(
                                //'previewParserPath'=>Yii::app()->urlManager->createUrl($preview)
                            )
                        ));
                ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php }else{
    echo F::t("Please {login} to leave your comment", 'Default', array(
        '{login}'=>CHtml::link(F::t('login'), array('/user/login/ajaxLogin'), array('class'=>'login')),
    ));   
 } ?>
