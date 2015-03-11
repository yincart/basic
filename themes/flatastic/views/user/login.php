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
            <li><a href="#" class="default_t_color">登录</a></li>
        </ul>
    </div>
</section>
<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12 col-sm-12 col-md-12 m_bottom_40">
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
        </div>
    </div>
</div>