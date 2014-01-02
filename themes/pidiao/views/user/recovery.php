<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
);
?>
<div class="login_box">

<h1><?php echo UserModule::t("Restore"); ?></h1>
    <div class="login_ct">
        <div class="login">
            <div class="login_form">
<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="form_c">
		<div class="form_1"> <?php echo CHtml::activeLabel($form,'login_or_email'); ?></div>
		<?php echo CHtml::activeTextField($form,'login_or_email') ?></>
		<div class="form_1"> <p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p></div>
	</div>
	
	<div class="form_submit">
		<?php echo CHtml::submitButton(UserModule::t("Restore")); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>
    </div>
</div>
        <div class="logo_b">
            <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/logo_b.png" width="257" height="152"/>
        </div>
</div>
</div>