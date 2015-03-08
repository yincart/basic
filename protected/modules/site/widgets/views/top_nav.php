<section class="h_top_part">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-3 t_xs_align_c">
                <p class="f_size_medium"><?php echo Yii::t('site', 'Welcome visitor can you')?>	<a href="#" data-popup="#login_popup"><?php echo Yii::t('site', 'Log In') ?></a> <?php echo Yii::t('site', 'or') ?><a href="#"> <?php echo Yii::t('site', 'Create an Account') ?></a> </p>
            </div>
            <nav class="col-lg-4 col-md-4 col-sm-6 t_align_c t_xs_align_c">
                <ul class="d_inline_b horizontal_list clearfix f_size_medium users_nav">
                    <li><a href="#" class="default_t_color"><?php echo Yii::t('site', 'My Account') ?></a></li>
                    <li><a href="orders_list.html" class="default_t_color"><?php echo Yii::t('site', 'Orders List') ?></a></li>
                    <li><a href="wishlist.html" class="default_t_color"><?php echo Yii::t('site', 'Wishlist') ?></a></li>
                    <li><a href="checkout.html" class="default_t_color"><?php echo Yii::t('site', 'Checkout') ?></a></li>
                </ul>
            </nav>
            <div class="col-lg-4 col-md-4 col-sm-3 t_align_r t_xs_align_c">
                <ul class="horizontal_list clearfix d_inline_b t_align_l f_size_medium site_settings type_2">
                    <?php $this->widget('application.modules.site.widgets.WLangBox') ?>
                    <?php $this->widget('application.modules.site.widgets.WCurrency') ?>
                </ul>
            </div>
        </div>
    </div>
</section>