<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
    UserModule::t("Registration"),
);
?>
<?php CHtml::$afterRequiredLabel = '';?>
<!--breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <ul class="horizontal_list clearfix bc_list f_size_medium">
            <li class="m_right_10 current"><a href="#" class="default_t_color">首页<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
            <li><a href="#" class="default_t_color">注册</a></li>
        </ul>
    </div>
</section>
<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-6 col-sm-6 col-md-6 m_bottom_40">
                <!--login form-->
                <h2 class="color_dark m_bottom_25">登录</h2>
                <h5 class="fw_medium m_bottom_15">I am Already Registered</h5>
                <form action="<?php echo F::url('/user/login') ?>" method="post">
                    <ul>
                        <li class="clearfix m_bottom_15">
                            <div class="half_column type_2 f_left">
                                <label for="username" class="m_bottom_5 d_inline_b">Username</label>
                                <input type="text" id="username" name="UserLogin[username]" class="r_corners full_width m_bottom_5">
                                <a href="#" class="color_dark f_size_medium">Forgot your username?</a>
                            </div>
                            <div class="half_column type_2 f_left">
                                <label for="pass" class="m_bottom_5 d_inline_b">Password</label>
                                <input type="password" id="pass" name="UserLogin[password]" class="r_corners full_width m_bottom_5">
                                <a href="#" class="color_dark f_size_medium">Forgot your password?</a>
                            </div>
                        </li>
                        <li class="m_bottom_15">
                            <input type="checkbox" class="d_none" name="UserLogin[rememberMe]" id="checkbox_4"><label for="checkbox_4">Remember me</label>
                        </li>
                        <li><button class="button_type_4 r_corners bg_scheme_color color_light tr_all_hover">登录</button></li>
                    </ul>
                </form>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 m_bottom_40">
                <h2 class="color_dark m_bottom_25">注册</h2>
                <?php $form=$this->beginWidget('UActiveForm', array(
                    'id'=>'registration-form',
                    'enableAjaxValidation'=>true,
                    'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                    'htmlOptions' => array('enctype'=>'multipart/form-data'),
                )); ?>
                    <ul>
                        <?php if($model->hasErrors()):?>
                        <li class="m_bottom_15">
                            <div class="alert_box r_corners error m_bottom_10">
                                <i class="fa fa-exclamation-triangle"></i><p><?php echo $form->errorSummary(array($model,$profile)); ?></p>
                            </div>
                        </li>
                        <?php endif; ?>
                        <li class="m_bottom_15">
<!--                            <label for="u_name" class="d_inline_b m_bottom_5 required">Username</label>-->
                            <?php echo $form->labelEx($model,'username', array('class'=>'d_inline_b m_bottom_5 required')); ?>
                            <input type="text" id="u_name" name="RegistrationForm[username]" class="r_corners full_width">
                        </li>
                        <li class="m_bottom_15">
<!--                            <label for="u_pass" class="d_inline_b m_bottom_5 required">Password</label>-->
                            <?php echo $form->labelEx($model,'password', array('class'=>'d_inline_b m_bottom_5 required')); ?>
                            <input type="password" id="u_pass" name="RegistrationForm[password]" class="r_corners full_width">
                        </li>
                        <li>
<!--                            <label for="u_repeat_pass" class="d_inline_b m_bottom_5 required">Confirm Password</label>-->
                            <?php echo $form->labelEx($model,'verifyPassword', array('class'=>'d_inline_b m_bottom_5 required')); ?>
                            <input type="password" id="u_repeat_pass" name="RegistrationForm[verifyPassword]" class="r_corners full_width">
                        </li>
                        <li class="m_bottom_15">
<!--                            <label for="u_email" class="d_inline_b m_bottom_5 required">Email</label>-->
                            <?php echo $form->labelEx($model,'email', array('class'=>'d_inline_b m_bottom_5 required')); ?>
                            <input type="email" id="u_email" name="RegistrationForm[email]" class="r_corners full_width">
                        </li>
                        <?php
                        $profileFields=Profile::getFields();
                        if ($profileFields) {
                            foreach($profileFields as $field) {
                                ?>
                        <li class="m_bottom_15">
                                    <?php echo $form->labelEx($profile,$field->varname); ?>
                                    <?php
                                    if ($widgetEdit = $field->widgetEdit($profile)) {
                                        echo $widgetEdit;
                                    } elseif ($field->range) {
                                        echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
                                    } elseif ($field->field_type=="TEXT") {
                                        echo$form->textArea($profile,$field->varname,array('class'=>'r_corners full_width' ,'rows'=>6, 'cols'=>50));
                                    } else {
                                        echo $form->textField($profile,$field->varname,array('class'=>'r_corners full_width', 'size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
                                    }
                                    ?>
                                    <?php echo $form->error($profile,$field->varname); ?>
                         </li>
                            <?php
                            }
                        }
                        ?>
                        <?php if (UserModule::doCaptcha('registration')): ?>
                        <li class="m_bottom_15">
<!--                            <label for="u_email" class="d_inline_b m_bottom_5 required">VerifyCode</label>-->
                            <?php echo $form->labelEx($model,'verifyCode', array('class'=>'d_inline_b m_bottom_5 required')); ?>
                                <?php $this->widget('CCaptcha'); ?>
                                <?php echo $form->textField($model,'verifyCode', array('class'=>'r_corners full_width')); ?>

                                <p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
                                    <br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
                        </li>
                        <?php endif; ?>
                        <li class="m_bottom_15">
                            <button class="button_type_4 r_corners bg_scheme_color color_light tr_all_hover">注册</button>
                        </li>
                    </ul>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>