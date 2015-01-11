<!--breadcrumbs-->
    <section class="breadcrumbs">
        <div class="container">
            <ul class="horizontal_list clearfix bc_list f_size_medium">
                <li class="m_right_10 current"><a href="<?php echo F::url('/site/default/index') ?>" class="default_t_color">首页<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                <li><a href="#" class="default_t_color"><?php echo $category->name  ?></a></li>
            </ul>
        </div>
    </section>
<!--content-->
<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <!--left content column-->
            <?php $this->widget('application.modules.catalog.widgets.WLeftMenu') ?>
            <!--right column-->
            <section class="col-lg-9 col-md-9 col-sm-9">
                <!--Hot recommend items-->
                <?php $this->widget('application.modules.catalog.widgets.WHotRecommendItems') ?>
                <!--Item props search-->
                <?php $this->widget('application.modules.catalog.widgets.WItemPropsSearch') ?>
                <!--sort-->
                <div class="row clearfix m_bottom_10">
                    <div class="col-lg-7 col-md-8 col-sm-12 m_sm_bottom_10">
                        <p class="d_inline_middle f_size_medium">Sort by:</p>
                        <div class="clearfix d_inline_middle m_left_10">
                            <!--product name select-->
                            <div class="custom_select f_size_medium relative f_left">
                                <div class="select_title r_corners relative color_dark">Product name</div>
                                <ul class="select_list d_none"></ul>
                                <select name="product_name">
                                    <option value="Product SKU">Product SKU</option>
                                    <option value="Product Price">Product Price</option>
                                    <option value="Product ID">Product ID</option>
                                </select>
                            </div>
                            <button class="button_type_7 bg_light_color_1 color_dark tr_all_hover r_corners mw_0 box_s_none bg_cs_hover f_left m_left_5"><i class="fa fa-sort-amount-asc m_left_0 m_right_0"></i></button>
                        </div>
                        <!--manufacturer select-->
                        <div class="custom_select f_size_medium relative d_inline_middle m_left_15 m_xs_left_5 m_mxs_left_0 m_mxs_top_10">
                            <div class="select_title r_corners relative color_dark">Select manufacturer</div>
                            <ul class="select_list d_none"></ul>
                            <select name="manufacturer">
                                <option value="Manufacture 1">Manufacture 1</option>
                                <option value="Manufacture 2">Manufacture 2</option>
                                <option value="Manufacture 3">Manufacture 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-12 t_align_r t_sm_align_l">
                        <!--grid view or list view-->
                        <p class="d_inline_middle f_size_medium m_right_5">View as:</p>
                        <div class="clearfix d_inline_middle">
                            <button class="button_type_7 bg_scheme_color color_light tr_delay_hover r_corners mw_0 box_s_none bg_cs_hover f_left"><i class="fa fa-th m_left_0 m_right_0"></i></button>
                            <button class="button_type_7 bg_light_color_1 color_dark tr_delay_hover r_corners mw_0 box_s_none bg_cs_hover f_left m_left_5"><i class="fa fa-th-list m_left_0 m_right_0"></i></button>
                        </div>
                    </div>
                </div>
                <hr class="m_bottom_10 divider_type_3">
                <div class="row clearfix m_bottom_15">
                    <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 m_xs_bottom_10">
                        <p class="d_inline_middle f_size_medium d_xs_block m_xs_bottom_5">Results 1 - 5 of 45</p>
                        <p class="d_inline_middle f_size_medium m_left_20 m_xs_left_0">Show:</p>
                        <!--show items per page select-->
                        <div class="custom_select f_size_medium relative d_inline_middle m_left_5">
                            <div class="select_title r_corners relative color_dark">9</div>
                            <ul class="select_list d_none"></ul>
                            <select name="show">
                                <option value="Manufacture 1">6</option>
                                <option value="Manufacture 2">3</option>
                                <option value="Manufacture 3">1</option>
                            </select>
                        </div>
                        <p class="d_inline_middle f_size_medium m_left_5">items per page</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 t_align_r t_xs_align_l">
                        <!--pagination-->
                        <a role="button" href="#" class="button_type_10 color_dark d_inline_middle bg_cs_hover bg_light_color_1 t_align_c tr_delay_hover r_corners box_s_none"><i class="fa fa-angle-left"></i></a>
                        <ul class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">
                            <li class="m_right_10"><a class="color_dark" href="#">1</a></li>
                            <li class="m_right_10"><a class="scheme_color" href="#">2</a></li>
                            <li class="m_right_10"><a class="color_dark" href="#">3</a></li>
                        </ul>
                        <a role="button" href="#" class="button_type_10 color_dark d_inline_middle bg_cs_hover bg_light_color_1 t_align_c tr_delay_hover r_corners box_s_none"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <!--products-->
                <section class="products_container category_grid clearfix m_bottom_15">
                    <!--product item-->
                    <?php foreach ($items as $item) {
                    ?>
                    <div class="product_item hit w_xs_full">
                        <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                            <!--product preview-->
                            <a href="<?php echo $item->getUrl() ?>" class="d_block relative wrapper pp_wrap m_bottom_15">
                                <img src="<?php echo $item->getMainPic(); ?>" class="tr_all_hover" alt="">
                                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                            </a>
                            <!--description and price of product-->
                            <figcaption>
                                <h5 class="m_bottom_10"><a href="<?php echo $item->getUrl() ?>" class="color_dark"><?php echo $item->title; ?></a></h5>
                                <!--rating-->
                                <ul class="horizontal_list d_inline_b m_bottom_10 clearfix rating_list type_2 tr_all_hover">
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                        <i class="fa fa-star active tr_all_hover"></i>
                                    </li>
                                </ul>
                                <p class="scheme_color f_size_large m_bottom_15"><?php echo $item->currency . $item->price ?></p>
                                <div>月成交量:<?php echo $item->deal_count; ?></div>
                                <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                                <div class="clearfix m_bottom_5">
                                    <ul class="horizontal_list d_inline_b l_width_divider">
                                        <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                                        <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                                    </ul>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <?php } ?>
                </section>
                <hr class="m_bottom_10 divider_type_3">
                <div class="row clearfix m_bottom_15 m_xs_bottom_30">
                    <?php $this->widget('CLinkPager', array(
                        'pages' => $pages,
                    )) ?>
                </div>
<!--                <div class="row clearfix m_bottom_15 m_xs_bottom_30">-->
<!--                    <div class="col-lg-7 col-md-7 col-sm-8 m_xs_bottom_10">-->
<!--                        <p class="d_inline_middle f_size_medium d_xs_block m_xs_bottom_5">Results 1 - 5 of 45</p>-->
<!--                        <p class="d_inline_middle f_size_medium m_left_20 m_xs_left_0">Show:</p>-->
                        <!--show items per page select-->
<!--                        <div class="custom_select f_size_medium relative d_inline_middle m_left_5">-->
<!--                            <div class="select_title r_corners relative color_dark">9</div>-->
<!--                            <ul class="select_list d_none"></ul>-->
<!--                            <select name="show_second">-->
<!--                                <option value="Manufacture 1">6</option>-->
<!--                                <option value="Manufacture 2">3</option>-->
<!--                                <option value="Manufacture 3">1</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                        <p class="d_inline_middle f_size_medium m_left_5">items per page</p>-->
<!--                    </div>-->
<!--                    <div class="col-lg-5 col-md-5 col-sm-4 t_align_r t_xs_align_l">-->
                        <!--pagination-->
<!--                        <a role="button" href="#" class="button_type_10 color_dark d_inline_middle bg_cs_hover bg_light_color_1 t_align_c tr_delay_hover r_corners box_s_none"><i class="fa fa-angle-left"></i></a>-->
<!--                        <ul class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">-->
<!--                            <li class="m_right_10"><a class="color_dark" href="#">1</a></li>-->
<!--                            <li class="m_right_10"><a class="scheme_color" href="#">2</a></li>-->
<!--                            <li class="m_right_10"><a class="color_dark" href="#">3</a></li>-->
<!--                        </ul>-->
<!--                        <a role="button" href="#" class="button_type_10 color_dark d_inline_middle bg_cs_hover bg_light_color_1 t_align_c tr_delay_hover r_corners box_s_none"><i class="fa fa-angle-right"></i></a>-->
<!--                    </div>-->
<!--                </div>-->

            </section>
        </div>
    </div>
</div>