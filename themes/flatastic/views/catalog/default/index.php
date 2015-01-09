<!--breadcrumbs-->
    <section class="breadcrumbs">
        <div class="container">
            <ul class="horizontal_list clearfix bc_list f_size_medium">
                <li class="m_right_10 current"><a href="#" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
                <li><a href="#" class="default_t_color">Women</a></li>
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
                <h2 class="tt_uppercase color_dark m_bottom_25">Women</h2>
                <img class="r_corners m_bottom_40" src="<?php echo F::themeUrl() ?>/images//category_img_1.jpg" alt="">
                <!--categories nav-->
                <nav class="m_bottom_40">
                    <ul class="horizontal_list clearfix categories_nav_list m_xs_right_0 t_mxs_align_c">
                        <li class="m_right_15 f_mxs_none w_mxs_auto d_mxs_inline_b m_mxs_bottom_20">
                            <a href="#" class="d_block photoframe tr_all_hover shadow color_dark r_corners">
											<span class="d_block wrapper">
												<img class="tr_all_long_hover" src="<?php echo F::themeUrl() ?>/images//category_img_2.jpg" alt="">
											</span>
                                Dresses
                            </a>
                        </li>
                        <li class="m_right_15 f_mxs_none w_mxs_auto d_mxs_inline_b m_mxs_bottom_20">
                            <a href="#" class="d_block photoframe tr_all_hover shadow color_dark r_corners">
											<span class="d_block wrapper">
												<img class="tr_all_long_hover" src="<?php echo F::themeUrl() ?>/images//category_img_3.jpg" alt="">
											</span>
                                Tops
                            </a>
                        </li>
                        <li class="m_right_15 f_mxs_none w_mxs_auto d_mxs_inline_b m_mxs_bottom_20">
                            <a href="#" class="d_block photoframe tr_all_hover shadow color_dark r_corners">
											<span class="d_block wrapper">
												<img class="tr_all_long_hover" src="<?php echo F::themeUrl() ?>/images//category_img_4.jpg" alt="">
											</span>
                                Skirts
                            </a>
                        </li>
                        <li class="m_right_15 f_mxs_none w_mxs_auto d_mxs_inline_b m_mxs_bottom_20">
                            <a href="#" class="d_block photoframe tr_all_hover shadow color_dark r_corners">
											<span class="d_block wrapper">
												<img class="tr_all_long_hover" src="<?php echo F::themeUrl() ?>/images//category_img_5.jpg" alt="">
											</span>
                                Pants
                            </a>
                        </li>
                        <li class="m_right_15 f_mxs_none w_mxs_auto d_mxs_inline_b m_mxs_bottom_20">
                            <a href="#" class="d_block photoframe tr_all_hover shadow color_dark r_corners">
											<span class="d_block wrapper">
												<img class="tr_all_long_hover" src="<?php echo F::themeUrl() ?>/images//category_img_6.jpg" alt="">
											</span>
                                Shorts
                            </a>
                        </li>
                    </ul>
                </nav>
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
                    <div class="product_item hit w_xs_full">
                        <figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">
                            <!--product preview-->
                            <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15">
                                <img src="<?php echo F::themeUrl() ?>/images//product_img_1.jpg" class="tr_all_hover" alt="">
                                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                            </a>
                            <!--description and price of product-->
                            <figcaption>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Eget elementum vel</a></h5>
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
                                <p class="scheme_color f_size_large m_bottom_15">$102.00</p>
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
                    <!--product item-->
                    <div class="product_item featured w_xs_full">
                        <figure class="r_corners photoframe tr_all_hover type_2 t_align_c shadow relative">
                            <!--product preview-->
                            <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15">
                                <img src="<?php echo F::themeUrl() ?>/images//product_img_2.jpg" class="tr_all_hover" alt="">
                                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                            </a>
                            <!--description and price of product-->
                            <figcaption>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Ut tellus dolor dapibus</a></h5>
                                <div class="clearfix m_bottom_15">
                                    <!--rating-->
                                    <ul class="horizontal_list type_2 m_bottom_10 d_inline_b clearfix rating_list tr_all_hover">
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
                                    <p class="scheme_color f_size_large">$57.00</p>
                                </div>
                                <div class="clearfix">
                                    <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Add to Cart</button>
                                </div>
                                <div class="clearfix m_bottom_5">
                                    <ul class="horizontal_list d_inline_b l_width_divider">
                                        <li class="m_right_15 f_md_none m_md_right_0"><a href="#" class="color_dark">Add to Wishlist</a></li>
                                        <li class="f_md_none"><a href="#" class="color_dark">Add to Compare</a></li>
                                    </ul>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <!--product item-->
                    <div class="product_item new w_xs_full">
                        <figure class="r_corners photoframe tr_all_hover type_2 t_align_c shadow relative">
                            <!--product preview-->
                            <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15">
                                <img src="<?php echo F::themeUrl() ?>/images//product_img_3.jpg" class="tr_all_hover" alt="">
                                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                            </a>
                            <!--description and price of product-->
                            <figcaption>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Cursus eleifend elit aenean.</a></h5>
                                <div class="clearfix">
                                    <!--rating-->
                                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                                    <p class="scheme_color f_size_large m_bottom_15">$99.00</p>
                                </div>
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
                    <!--product item-->
                    <div class="product_item specials w_xs_full">
                        <figure class="r_corners photoframe tr_all_hover type_2 t_align_c shadow relative">
                            <!--product preview-->
                            <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15">
                                <img src="<?php echo F::themeUrl() ?>/images//product_img_5.jpg" class="tr_all_hover" alt="">
                                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                            </a>
                            <!--description and price of product-->
                            <figcaption>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Aliquam erat volutpat</a></h5>
                                <div class="clearfix">
                                    <!--rating-->
                                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                                    <p class="scheme_color f_size_large m_bottom_15">$102.00</p>
                                </div>
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
                    <!--product item-->
                    <div class="product_item hit w_xs_full">
                        <figure class="r_corners photoframe tr_all_hover type_2 t_align_c shadow relative">
                            <!--product preview-->
                            <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15">
                                <img src="<?php echo F::themeUrl() ?>/images//product_img_8.jpg" class="tr_all_hover" alt="">
                                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                            </a>
                            <!--description and price of product-->
                            <figcaption>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Eget elementum vel</a></h5>
                                <div class="clearfix">
                                    <!--rating-->
                                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                                    <p class="scheme_color f_size_large m_bottom_15">$102.00</p>
                                </div>
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
                    <!--product item-->
                    <div class="product_item featured w_xs_full">
                        <figure class="r_corners photoframe type_2 t_align_c shadow relative tr_all_hover">
                            <!--product preview-->
                            <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15">
                                <img src="<?php echo F::themeUrl() ?>/images//product_img_4.jpg" class="tr_all_hover" alt="">
                                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                            </a>
                            <!--description and price of product-->
                            <figcaption>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Ut tellus dolor dapibus</a></h5>
                                <div class="clearfix m_bottom_15">
                                    <!--rating-->
                                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                                    <p class="scheme_color f_size_large">$57.00</p>
                                </div>
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
                    <!--product item-->
                    <div class="product_item specials w_xs_full">
                        <figure class="r_corners photoframe tr_all_hover type_2 t_align_c shadow relative">
                            <!--product preview-->
                            <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15">
                                <img src="<?php echo F::themeUrl() ?>/images//product_img_7.jpg" class="tr_all_hover" alt="">
                                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                            </a>
                            <!--description and price of product-->
                            <figcaption>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Eget elementum vel</a></h5>
                                <div class="clearfix">
                                    <!--rating-->
                                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                                    <p class="scheme_color f_size_large m_bottom_15">$99.00</p>
                                </div>
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
                    <!--product item-->
                    <div class="product_item specials w_xs_full">
                        <figure class="r_corners photoframe tr_all_hover type_2 t_align_c shadow relative">
                            <!--product preview-->
                            <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15">
                                <img src="<?php echo F::themeUrl() ?>/images//product_img_9.jpg" class="tr_all_hover" alt="">
                                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                            </a>
                            <!--description and price of product-->
                            <figcaption>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Cursus eleifend elit aenean.</a></h5>
                                <div class="clearfix">
                                    <!--rating-->
                                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                                    <p class="scheme_color f_size_large m_bottom_15">$99.00</p>
                                </div>
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
                    <!--product item-->
                    <div class="product_item rated w_xs_full">
                        <figure class="r_corners photoframe tr_all_hover type_2 t_align_c shadow relative">
                            <!--product preview-->
                            <a href="#" class="d_block relative wrapper pp_wrap m_bottom_15">
                                <img src="<?php echo F::themeUrl() ?>/images//product_img_6.jpg" class="tr_all_hover" alt="">
                                <span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                            </a>
                            <!--description and price of product-->
                            <figcaption>
                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Aliquam erat volutpat</a></h5>
                                <div class="clearfix">
                                    <!--rating-->
                                    <ul class="horizontal_list d_inline_b m_bottom_10 type_2 clearfix rating_list tr_all_hover">
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
                                    <p class="scheme_color f_size_large m_bottom_15">$36.00</p>
                                </div>
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
                </section>
                <hr class="m_bottom_10 divider_type_3">
                <div class="row clearfix m_bottom_15 m_xs_bottom_30">
                    <div class="col-lg-7 col-md-7 col-sm-8 m_xs_bottom_10">
                        <p class="d_inline_middle f_size_medium d_xs_block m_xs_bottom_5">Results 1 - 5 of 45</p>
                        <p class="d_inline_middle f_size_medium m_left_20 m_xs_left_0">Show:</p>
                        <!--show items per page select-->
                        <div class="custom_select f_size_medium relative d_inline_middle m_left_5">
                            <div class="select_title r_corners relative color_dark">9</div>
                            <ul class="select_list d_none"></ul>
                            <select name="show_second">
                                <option value="Manufacture 1">6</option>
                                <option value="Manufacture 2">3</option>
                                <option value="Manufacture 3">1</option>
                            </select>
                        </div>
                        <p class="d_inline_middle f_size_medium m_left_5">items per page</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-4 t_align_r t_xs_align_l">
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
            </section>
        </div>
    </div>
</div>