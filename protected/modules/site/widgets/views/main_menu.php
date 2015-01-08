<?php
$menu = Menu::model()->findByPk(4);
$descendants = $menu->children()->findAll();

/*
 * 单级菜单
 */
foreach($descendants as $model){
    $items[] = array('label'=>'<b>'.$model->name.'</b>', 'url'=>$model->url ? Yii::app()->request->baseUrl.'/'.$model->url : '#',
        'active'=>Tbfunction::mainMenu(Yii::app()->baseUrl.'/'.$model->url),
        'linkOptions'=>array('class'=>'tr_delay_hover color_light tt_uppercase'),
//        'template'=>'<b>111</b>'
//        'template'=>'<a href="" class="tr_delay_hover color_light tt_uppercase"><b>{@item}</b></a>')
//        'htmlOptions'=>array('class'=>'tr_delay_hover color_light tt_uppercase')
        );
}
//echo Yii::app()->powered;

/*
 * 多级菜单
 */
//foreach ($descendants as $model) {
//
//    if ($model->getChildCount() > 0) {
//        $items[] = array('label' => F::t($model->name), 'url' => $model->url ? Yii::app()->request->baseUrl . '/' . $model->url : '#',
//            'items' => $model->getChildMenu(),
//            'itemOptions' => array('class' => 'dropdown'), 'submenuOptions' => array('class' => 'dropdown'));
//    } else {
//        $items[] = array('label' => F::t($model->name), 'url' => $model->url ? Yii::app()->request->baseUrl . '/' . $model->url : '#');
//    }
//}

//print_r($items);

//$this->widget('zii.widgets.CMenu', array(
//    'htmlOptions' => array('class' => 'horizontal_list main_menu clearfix'),
//    'activeCssClass'=>'current',
//    'activateParents'=>true,
//    'items' => $items,
//));
?>

<div class="container">
    <section class="menu_wrap type_2 relative clearfix t_xs_align_c m_bottom_20">
        <!--button for responsive menu-->
        <button id="menu_button" class="r_corners centered_db d_none tr_all_hover d_xs_block m_bottom_15">
            <span class="centered_db r_corners"></span>
            <span class="centered_db r_corners"></span>
            <span class="centered_db r_corners"></span>
        </button>
        <!--main menu-->
        <nav role="navigation" class="f_left f_xs_none d_xs_none t_xs_align_l">
            <?php
            $this->widget('zii.widgets.CMenu', array(
                'encodeLabel' => false,
                'htmlOptions' => array('class' => 'horizontal_list main_menu clearfix'),
                'activeCssClass'=>'current',
                'items'=>$items,
                'itemCssClass'=>'relative f_xs_none m_xs_bottom_5',
            ));
            ?>
        </nav>
        <ul class="f_right horizontal_list clearfix t_align_l t_xs_align_c site_settings d_xs_inline_b f_xs_none">
            <!--like-->
            <li class="d_sm_none d_xs_block">
                <a role="button" href="#" class="button_type_1 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none"><i class="fa fa-heart-o f_size_ex_large"></i><span class="count circle t_align_c">12</span></a>
            </li>
            <li class="m_left_5 d_sm_none d_xs_block">
                <a role="button" href="#" class="button_type_1 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none"><i class="fa fa-files-o f_size_ex_large"></i><span class="count circle t_align_c">3</span></a>
            </li>
            <!--shopping cart-->
            <li class="m_left_5 relative container3d" id="shopping_button">
                <a role="button" href="#" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">
									<span class="d_inline_middle shop_icon">
										<i class="fa fa-shopping-cart"></i>
										<span class="count tr_delay_hover type_2 circle t_align_c">3</span>
									</span>
                    <b>$355</b>
                </a>
                <div class="shopping_cart top_arrow tr_all_hover r_corners">
                    <div class="f_size_medium sc_header">Recently added item(s)</div>
                    <ul class="products_list">
                        <li>
                            <div class="clearfix">
                                <!--product image-->
                                <img class="f_left m_right_10" src="<?php echo F::themeUrl() ?>/images/shopping_c_img_1.jpg" alt="">
                                <!--product description-->
                                <div class="f_left product_description">
                                    <a href="#" class="color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>
                                    <span class="f_size_medium">Product Code PS34</span>
                                </div>
                                <!--product price-->
                                <div class="f_left f_size_medium">
                                    <div class="clearfix">
                                        1 x <b class="color_dark">$99.00</b>
                                    </div>
                                    <button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="clearfix">
                                <!--product image-->
                                <img class="f_left m_right_10" src="<?php echo F::themeUrl() ?>/images/shopping_c_img_2.jpg" alt="">
                                <!--product description-->
                                <div class="f_left product_description">
                                    <a href="#" class="color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>
                                    <span class="f_size_medium">Product Code PS34</span>
                                </div>
                                <!--product price-->
                                <div class="f_left f_size_medium">
                                    <div class="clearfix">
                                        1 x <b class="color_dark">$99.00</b>
                                    </div>
                                    <button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="clearfix">
                                <!--product image-->
                                <img class="f_left m_right_10" src="<?php echo F::themeUrl() ?>/images/shopping_c_img_3.jpg" alt="">
                                <!--product description-->
                                <div class="f_left product_description">
                                    <a href="#" class="color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>
                                    <span class="f_size_medium">Product Code PS34</span>
                                </div>
                                <!--product price-->
                                <div class="f_left f_size_medium">
                                    <div class="clearfix">
                                        1 x <b class="color_dark">$99.00</b>
                                    </div>
                                    <button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!--total price-->
                    <ul class="total_price bg_light_color_1 t_align_r color_dark">
                        <li class="m_bottom_10">Tax: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">$0.00</span></li>
                        <li class="m_bottom_10">Discount: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">$37.00</span></li>
                        <li>Total: <b class="f_size_large bold scheme_color sc_price t_align_l d_inline_b m_left_15">$999.00</b></li>
                    </ul>
                    <div class="sc_footer t_align_c">
                        <a href="#" role="button" class="button_type_4 d_inline_middle bg_light_color_2 r_corners color_dark t_align_c tr_all_hover m_mxs_bottom_5">View Cart</a>
                        <a href="#" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">Checkout</a>
                    </div>
                </div>
            </li>
        </ul>
    </section>
</div>