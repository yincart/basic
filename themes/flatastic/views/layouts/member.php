<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<!--breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <ul class="horizontal_list clearfix bc_list f_size_medium">
            <li class="m_right_10 current"><a href="#" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
            <li><a href="#" class="default_t_color">Manufacturers</a></li>
        </ul>
    </div>
</section>
<!--content-->
<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <!--left content column-->
            <?php echo $content ?>
            <!--right column-->
            <aside class="col-lg-3 col-md-3 col-sm-3">
                <!--widgets-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">会员中心</h3>
                    </figcaption>
                    <div class="widget_content">
                        <!--Categories list-->
                        <ul class="categories_list">
                            <li>
                                <a href="#" class="f_size_large color_dark d_block">
                                    <b>My Account</b>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="f_size_large color_dark d_block">
                                    <b>Orders List</b>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="f_size_large color_dark d_block">
                                    <b>Wishlist</b>
                                </a>
                            </li>
                        </ul>
                    </div>
                </figure>
            </aside>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>