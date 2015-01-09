<aside class="col-lg-3 col-md-3 col-sm-3">
    <!--widgets-->
    <figure class="widget shadow r_corners wrapper m_bottom_30">
        <figcaption>
            <h3 class="color_light">商品分类</h3>
        </figcaption>
        <div class="widget_content">
            <!--Categories list-->
            <ul class="categories_list">
                <?php
                foreach ($model as $c):
                ?>
                <li class="">
                    <a href="#" class="f_size_large scheme_color d_block relative">
                        <b><?php echo $c->name ?></b>
                        <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                    </a>
                    <!--second level-->
                    <ul>
                        <?php
                        $model = Category::model()->findByPk($c->category_id);
                                                $cc = $model ? $model->children()->findAll() : '';
                                                foreach ($cc as $cc):
                        ?>
                        <li class="">
                            <a href="#" class="d_block f_size_large color_dark relative">
                                <?php echo $cc->name ?><span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                            </a>
                            <!--third level-->
<!--                            <ul>-->
<!--                                <li><a href="#" class="color_dark d_block">Evening Dresses</a></li>-->
<!--                                <li><a href="#" class="color_dark d_block">Casual Dresses</a></li>-->
<!--                                <li><a href="#" class="color_dark d_block">Party Dresses</a></li>-->
<!--                            </ul>-->
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </figure>
    <!--compare products-->
    <figure class="widget shadow r_corners wrapper m_bottom_30">
        <figcaption>
            <h3 class="color_light">Compare Products</h3>
        </figcaption>
        <div class="widget_content">
            You have no product to compare.
        </div>
    </figure>
    <!--banner-->
    <a href="#" class="d_block r_corners m_bottom_30">
        <img src="<?php echo F::themeUrl() ?>/images//banner_img_6.jpg" alt="">
    </a>
    <!--Bestsellers-->
    <figure class="widget shadow r_corners wrapper m_bottom_30">
        <figcaption>
            <h3 class="color_light">Bestsellers</h3>
        </figcaption>
        <div class="widget_content">
            <div class="clearfix m_bottom_15">
                <img src="<?php echo F::themeUrl() ?>/images//bestsellers_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                <a href="#" class="color_dark d_block bt_link">Ut tellus dolor dapibus</a>
                <!--rating-->
                <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
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
                <p class="scheme_color">$61.00</p>
            </div>
            <hr class="m_bottom_15">
            <div class="clearfix m_bottom_15">
                <img src="<?php echo F::themeUrl() ?>/images//bestsellers_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                <a href="#" class="color_dark d_block bt_link">Elementum vel</a>
                <!--rating-->
                <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
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
                <p class="scheme_color">$57.00</p>
            </div>
            <hr class="m_bottom_15">
            <div class="clearfix m_bottom_5">
                <img src="<?php echo F::themeUrl() ?>/images//bestsellers_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                <a href="#" class="color_dark d_block bt_link">Crsus eleifend elit</a>
                <!--rating-->
                <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
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
                <p class="scheme_color">$24.00</p>
            </div>
        </div>
    </figure>
    <!--tags-->
    <figure class="widget shadow r_corners wrapper m_bottom_30">
        <figcaption>
            <h3 class="color_light">Tags</h3>
        </figcaption>
        <div class="widget_content">
            <div class="tags_list">
                <a href="#" class="color_dark d_inline_b v_align_b">accessories,</a>
                <a href="#" class="color_dark d_inline_b f_size_ex_large v_align_b">bestseller,</a>
                <a href="#" class="color_dark d_inline_b v_align_b">clothes,</a>
                <a href="#" class="color_dark d_inline_b f_size_big v_align_b">dresses,</a>
                <a href="#" class="color_dark d_inline_b v_align_b">fashion,</a>
                <a href="#" class="color_dark d_inline_b f_size_large v_align_b">men,</a>
                <a href="#" class="color_dark d_inline_b v_align_b">pants,</a>
                <a href="#" class="color_dark d_inline_b v_align_b">sale,</a>
                <a href="#" class="color_dark d_inline_b v_align_b">short,</a>
                <a href="#" class="color_dark d_inline_b f_size_ex_large v_align_b">skirt,</a>
                <a href="#" class="color_dark d_inline_b v_align_b">top,</a>
                <a href="#" class="color_dark d_inline_b f_size_big v_align_b">women</a>
            </div>
        </div>
    </figure>
</aside>