<style type="text/css">
	.media-title{
		margin-left:70px;
		text-shadow: 0 1px 1px rgba(0, 0, 0, 0.75);
	}
</style>
<div class="form form-horizontal">
	<?php echo CHtml::beginForm(); ?>

	<div class="control-group">		
		<?php echo CHtml::Label('启用','media',array('class'=>'control-label')); ?>
		<div class="controls">
			<lable class="checkbox inline">
				<?php 
				echo CHtml::checkBoxList('media',$enable,array('qq'=>'QQ','weibo'=>'新浪微博'),
					array('template'=>"<div class='form-checkbox'>{input} {label}</div>",'separator'=>'')); 
				?>
			</lable>
		</div>		
	</div>

	<div class="media-qq" style="display:none;">

		<div class="media-title">QQ登录:</div>

		<div class="control-group">		
			<?php echo CHtml::Label('APP ID','QQAuth_appkey',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo CHtml::textField('QQAuth_appkey',$input['QQAuth_appkey']) ?>
			</div>
		</div>

		<div class="control-group">
			<?php echo CHtml::Label('APP KEY','QQAuth_appsecret',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo CHtml::textField('QQAuth_appsecret',$input['QQAuth_appsecret']) ?>
			</div>
		</div>

	</div>

	<div class="media-weibo" style="display:none;">

		<div class="media-title">新浪微博登录:</div>

		<div class="control-group">		
			<?php echo CHtml::Label('App Key','SinaAuth_appkey',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo CHtml::textField('SinaAuth_appkey',$input['SinaAuth_appkey']) ?>
			</div>
		</div>

		<div class="control-group">
			<?php echo CHtml::Label('App Secret','SinaAuth_appsecret',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo CHtml::textField('SinaAuth_appsecret',$input['SinaAuth_appsecret']) ?>
			</div>
		</div>

	</div>

	<div class="form-submit">
		<button class="btn" type="submit">保存</button>
	</div>

	<?php echo CHtml::endForm(); ?>
</div>
<?php
$js = 'var enable = '.CJavaScript::encode($enable).';showMedia();function showMedia(){for (k in enable) {jQuery(".media-" + enable[k]).show();};}';
$js_jq = 'jQuery("#media input").change(function(){jQuery(".media-" + jQuery(this).val()).toggle();});';

Yii::app()->clientScript->registerScript('auth_cp_1',$js,CClientScript::POS_END);
Yii::app()->clientScript->registerScript('auth_cp_1',$js_jq,CClientScript::POS_READY);