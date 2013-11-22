<div class="main-container col1-layout">
    <div class="main container show-bg">
        <div class="preface grid-full in-col1">
            <div class="the-slideshow-wrapper nested-container clearer">
                <div class="the-slideshow gen-slider-arrows2 gen-slider-pager1 gen-slider-pager1-pos-bottom-right grid12-9  ">

                    <!--<div class="viewport" style="overflow: hidden; position: relative; height: 390px;">-->
                        <ul class="slides">
                            <?php
    $ad_list = Ad::model()->findAll();
    foreach ($ad_list as $k => $a) {
        ?>
                            <li>
                                <a title="Click to see all features" href="<?php echo $a->url ?>">
                                    <?php echo CHtml::image(F::baseUrl().'/../../upload/ad/'.$a->pic) ?>
                                    <div class="caption dark3">
                                        <h2 class="heading permanent"><?php echo $a->title ?></h2>
                                        <p><?php echo $a->content ?></p>
                                    </div>
                                </a>
                            </li>
    <?php } ?>
<!--                            <li>
                                <a title="Click to see all features" href="http://ultimo.infortis-themes.com/demo/default/ultimo-responsive-magento-theme/">
                                    <img alt="Customizable Magento Theme" src="http://ultimo.infortis-themes.com/demo/media/wysiwyg/demo/infortis/ultimo/slideshow/s1_1.jpg">
                                    <div class="caption light1 top-right">
                                        <h2 class="heading permanent">Customizable Theme</h2>
                                        <p>You can change colors of almost every element</p>
                                        <p>You have never seen so many options</p>
                                    </div>
                                </a>					
                            </li>-->
                        </ul>
                    <!--</div>-->
                    
                </div>
                <script type="text/javascript">
                    //&lt;![CDATA[

                    //jQuery(function($) {
                    jQuery(window).load(function() {
                        jQuery('.the-slideshow').flexslider({
                            namespace: "",
                            animation: 'slide',
                            easing: 'easeInOutSine',
                            useCSS: false,
                            animationLoop: 1,
                            smoothHeight: true,
                            slideshow: false,
                            animationSpeed: 400,
                            pauseOnHover: 1});
                    });
                    //]]&gt;
                </script>    


                <div class="slideshow-banners grid12-3 hide-below-768">
                    <a title="Go to ThemeForest marketplace to buy this theme" href="http://themeforest.net/item/ultimo-fluid-responsive-magento-theme/3231798?ref=infortis" class="banner">
                        <img alt="Buy This Theme" src="http://ultimo.infortis-themes.com/demo/media/wysiwyg/demo/infortis/ultimo/slideshow/banner/s1/01.jpg">

                        <div class="caption light1 full-width right">
                            <p class="right">Buy This Theme</p>
                        </div>

                    </a>

                    <a title="Click to see a list of all demos of this  Magento theme" href="http://ultimo.infortis-themes.com/demo/select-demo/" class="banner">
                        <img alt="List of all demos" src="http://ultimo.infortis-themes.com/demo/media/wysiwyg/demo/infortis/ultimo/slideshow/banner/s1/02.jpg">

                        <div class="caption dark1 full-width right">
                            <p class="right">See All Demos</p>
                        </div>

                    </a>

                    <a title="Sell downloads in your Magento store (software, e-books, music, any digital products)" href="http://ultimo.infortis-themes.com/demo/default/downloadable/ebooks.html" class="banner">
                        <img alt="Sell Downloads" src="http://ultimo.infortis-themes.com/demo/media/wysiwyg/demo/infortis/ultimo/slideshow/banner/s1/03.jpg">

                        <div class="caption dark2 full-width right">
                            <p class="right">Sell Downloads</p>
                        </div>

                    </a>        
                </div>


            </div>

        </div>
        <div class="col-main grid-full in-col1">
            <div class="std"><span class="section-line"></span>
                <br>
                <div class="grid12-4">

                    <div class="feature feature-icon-hover indent large">
                        <span class="icon large">
                            <img src="<?php echo F::themeUrl() ?>/media/paintbrush.png" alt="Customizable design">
                        </span>
                        <h6 class="above-heading">Customizable design</h6>
                        <h3>Unlimited Colors</h3>
                        <p>You have never seen so many options! Change colors of dozens of elements, apply textures, upload background images...</p>
                        <a href="http://ultimo.infortis-themes.com/demo/default/ultimo-responsive-magento-theme/" class="go">See all features</a>
                    </div>

                </div>
                <div class="grid12-4">

                    <div class="feature feature-icon-hover indent large">
                        <span class="icon large">
                            <img src="<?php echo F::themeUrl() ?>/media/responsive.png" alt="Responsive Layout">
                        </span>
                        <h6 class="above-heading">12-column grid</h6>
                        <h3>Responsive Layout</h3>
                        <p>Ultimo can be displayed on any screen. It is based on fluid grid system. If screen is resized, layout will be automatically adjusted...</p>
                        <a href="http://ultimo.infortis-themes.com/demo/default/ultimo-responsive-magento-theme/" class="go">See all features</a>
                    </div>

                </div>
                <div class="grid12-4">

                    <div class="feature feature-icon-hover indent large">
                        <span class="icon large">
                            <img src="<?php echo F::themeUrl() ?>/media/menu.png" alt="Mega Menu">
                        </span>
                        <h6 class="above-heading">Customizable drop-down menu</h6>
                        <h3>Mega Menu</h3>
                        <p>Two styles: wide mega menu or classic drop-down menu. You can add any custom content (images, text, HTML) to any category in the catalog...</p>
                        <a href="http://ultimo.infortis-themes.com/demo/default/ultimo-responsive-magento-theme/" class="go">See all features</a>
                    </div>

                </div>
                <div class="clearer"></div>



                <br>
                <br>

                <h3 class="section-title padding-right">See Our Featured Products</h3>
                <div class="itemslider-wrapper">

                    <div class="nav-wrapper gen-slider-arrows1 gen-slider-arrows1-pos-top-right" id="nav-wrapper-dda85f0680556d4b2cf5aa7f9c753753"><ul class="direction-nav"><li><a class="prev disabled" href="http://ultimo.infortis-themes.com/demo/default/#">Previous</a></li><li><a class="next" href="http://ultimo.infortis-themes.com/demo/default/#">Next</a></li></ul></div>

                    <div class="itemslider itemslider-horizontal itemslider-responsive" id="itemslider-dda85f0680556d4b2cf5aa7f9c753753">
                        <!-- end: slides -->
                        <div class="viewport" style="overflow: hidden; position: relative;"><ul class="slides products-grid" style="width: 1600%; -webkit-transition: 0s; transition: 0s; -webkit-transform: translate3d(0px, 0, 0);">
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/top1.html" title="Product with Variants" class="product-image">
                                            <img src="<?php echo F::themeUrl() ?>/media/3b.jpg" alt="Product with Variants">

                                            <img class="alt-img" src="<?php echo F::themeUrl() ?>/media/3bb.jpg" alt="Product with Variants">							
                                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/35/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/35/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                        
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/top1.html" title="Product with Variants">Product with Variants</a></h3>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:80%"></div>
                                        </div>
                                        <span class="amount">2 Review(s)</span>
                                    </div>



                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-35">
                                            <span class="price">$40.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/top2.html" title="First label" class="product-image">
                                            <img src="<?php echo F::themeUrl() ?>/media/1_1.jpg" alt="First label">

                                            <img class="alt-img" src="<?php echo F::themeUrl() ?>/media/1b.jpg" alt="Sample Product">							
                                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/36/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/36/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                        
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/top2.html" title="Sample Product">Sample Product</a></h3>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>



                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-36">
                                            <span class="price">$45.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/top3.html" title="Product Example" class="product-image">
                                            <img src="<?php echo F::themeUrl() ?>/media/2b_2.jpg" alt="Product Example">


                                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/37/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/37/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                        
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/top3.html" title="Product Example">Product Example</a></h3>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:80%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>



                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-37">
                                            <span class="price">$99.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/top4.html" title="New Hot Top" class="product-image">
                                            <img src="<?php echo F::themeUrl() ?>/media/4_3.jpg" alt="New Hot Top">

                                            <img class="alt-img" src="<?php echo F::themeUrl() ?>/media/4c.jpg" alt="New Hot Top">							
                                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/39/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/39/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                        
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/top4.html" title="New Hot Top">New Hot Top</a></h3>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">2 Review(s)</span>
                                    </div>



                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-39">
                                            <span class="price">$80.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/top5.html" title="Another Sample Top" class="product-image">
                                            <img src="<?php echo F::themeUrl() ?>/media/6.jpg" alt="Another Sample Top">


                                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/40/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/40/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                        
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/top5.html" title="Another Sample Top">Another Sample Top</a></h3>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:80%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>



                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-40">
                                            <span class="price">$110.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/top6.html" title="Next Sample Product" class="product-image">
                                            <img src="<?php echo F::themeUrl() ?>/media/5.jpg" alt="Next Sample Product">


                                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/41/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/41/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                        
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/top6.html" title="Next Sample Product">Next Sample Product</a></h3>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:60%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>



                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-41">
                                            <span class="price">$110.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/top7.html" title="Some Other Product" class="product-image">
                                            <img src="<?php echo F::themeUrl() ?>/media/7b.jpg" alt="Some Other Product">


                                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/42/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/42/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                        
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/top7.html" title="Some Other Product">Some Other Product</a></h3>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>



                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-42">
                                            <span class="price">$200.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/top8.html" title="Simple Woman Top" class="product-image">
                                            <img src="<?php echo F::themeUrl() ?>/media/8_1.jpg" alt="Simple Woman Top">


                                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/43/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/43/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                        
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/top8.html" title="Simple Woman Top">Simple Woman Top</a></h3>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>



                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-43">
                                            <span class="price">$39.50</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                            </ul></div></div> <!-- end: itemslider -->

                </div> <!-- end: itemslider-wrapper -->
                <script type="text/javascript">
                    //<![CDATA[
                    jQuery(function($) {

                        $('#itemslider-dda85f0680556d4b2cf5aa7f9c753753').flexslider({
                            namespace: "",
                            animation: "slide",
                            easing: "easeInQuart",
                            slideshow: false,
                            animationLoop: false,
                            animationSpeed: 300,
                            pauseOnHover: true,
                            controlNav: false,
                            controlsContainer: "#nav-wrapper-dda85f0680556d4b2cf5aa7f9c753753",
                            itemWidth: 188,
                            minItems: 5,
                            maxItems: 5,
                            move: 0})
                                .data("breakpoints", [[1680, 8], [1440, 7], [1360, 6], [1280, 6], [960, 5], [768, 4], [640, 3], [480, 2], [320, 1], [290, 3]])
                                ; //IMPORTANT: don't remove semicolon!

                    });
                    //]]>
                </script>


                <h3 class="section-title padding-right">New Products in our Store</h3>
                <div class="itemslider-wrapper new-itemslider-wrapper">

                    <div class="nav-wrapper gen-slider-arrows1 gen-slider-arrows1-pos-top-right"><ul class="direction-nav"><li><a class="prev disabled" href="http://ultimo.infortis-themes.com/demo/default/#">Previous</a></li><li><a class="next" href="http://ultimo.infortis-themes.com/demo/default/#">Next</a></li></ul></div>

                    <div class="itemslider itemslider-horizontal itemslider-responsive">
                        <!-- end: slides -->
                        <div class="viewport" style="overflow: hidden; position: relative;"><ul class="slides products-grid" style="width: 1600%; -webkit-transition: 0s; transition: 0s; -webkit-transform: translate3d(0px, 0, 0);">
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/phone4.html" title="Simple Phone" class="product-image">

                                            <img src="<?php echo F::themeUrl() ?>/media/phone1b_2.jpg" alt="Simple Phone">


                                            <span class="sticker-wrapper top-left"><span class="sticker new">New</span></span>                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/29/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/29/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                    
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/phone4.html" title="Simple Phone">Simple Phone</a></h3>

                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>




                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-29-new">
                                            <span class="price">$699.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/phone7.html" title="Phone Gray" class="product-image">

                                            <img src="<?php echo F::themeUrl() ?>/media/phone1g.jpg" alt="Phone Gray">


                                            <span class="sticker-wrapper top-left"><span class="sticker new">New</span></span>                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/32/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/32/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                    
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/phone7.html" title="Phone Gray">Phone Gray</a></h3>

                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>




                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-32-new">
                                            <span class="price">$999.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/phone5.html" title="Phone Blue" class="product-image">

                                            <img src="<?php echo F::themeUrl() ?>/media/phone1ff_1_1.jpg" alt="Phone Blue">


                                            <span class="sticker-wrapper top-left"><span class="sticker new">New</span></span>                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/30/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/30/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                    
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/phone5.html" title="Phone Blue">Phone Blue</a></h3>

                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>




                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-30-new">
                                            <span class="price">$400.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/phone1.html" title="Brand New Phone" class="product-image">

                                            <img src="<?php echo F::themeUrl() ?>/media/phone1a_1.jpg" alt="Brand New Phone">

                                            <img class="alt-img" src="<?php echo F::themeUrl() ?>/media/phone2a_3.jpg" alt="Brand New Phone">                                                        
                                            <span class="sticker-wrapper top-left"><span class="sticker new">New</span></span>                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/21/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/21/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                    
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/phone1.html" title="Brand New Phone">Brand New Phone</a></h3>

                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>




                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-21-new">
                                            <span class="price">$800.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/phone9.html" title="Sample image label" class="product-image">

                                            <img src="<?php echo F::themeUrl() ?>/media/phone9a.jpg" alt="Sample image label">


                                            <span class="sticker-wrapper top-left"><span class="sticker new">New</span></span>                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/34/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/34/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                    
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/phone9.html" title="Groupped Product">Groupped Product</a></h3>

                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>



                                    <div class="price-box">
                                        <p class="minimal-price">
                                            <span class="price-label">Starting at:</span>
                                            <span class="price" id="product-minimal-price-34-new">
                                                $124.00                </span>
                                        </p>
                                    </div>
                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/phone6.html" title="Phone Navy Color" class="product-image">

                                            <img src="<?php echo F::themeUrl() ?>/media/phone1cc.jpg" alt="Phone Navy Color">


                                            <span class="sticker-wrapper top-left"><span class="sticker new">New</span></span>                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/31/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/31/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                    
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/phone6.html" title="Phone Navy Color">Phone Navy Color</a></h3>

                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>




                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-31-new">
                                            <span class="price">$124.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/phone2.html" title="Phone with Variants" class="product-image">

                                            <img src="<?php echo F::themeUrl() ?>/media/phone1e_1.jpg" alt="Phone with Variants">

                                            <img class="alt-img" src="<?php echo F::themeUrl() ?>/media/iphone2_2.jpg" alt="Phone with Variants">                                                        
                                            <span class="sticker-wrapper top-left"><span class="sticker new">New</span></span>                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/22/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/22/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                    
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/phone2.html" title="Phone with Variants">Phone with Variants</a></h3>

                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:80%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>




                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-22-new">
                                            <span class="price">$750.00</span>                                    </span>

                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                                <li class="item" style="width: 176px; float: left; display: block;">

                                    <div class="product-image-wrapper" style="max-width:168px;">

                                        <a href="http://ultimo.infortis-themes.com/demo/default/phone8.html" title="Tier Pricing Product" class="product-image">

                                            <img src="<?php echo F::themeUrl() ?>/media/phone2a_6.jpg" alt="Tier Pricing Product">


                                            <span class="sticker-wrapper top-left"><span class="sticker new">New</span></span>                        </a>

                                        <ul class="add-to-links clearer addto-icons addto-onimage visible-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/33/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/33/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                    
                                    </div> <!-- end: product-image-wrapper -->

                                    <h3 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/phone8.html" title="Tier Pricing Product">Tier Pricing Product</a></h3>

                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating" style="width:100%"></div>
                                        </div>
                                        <span class="amount">1 Review(s)</span>
                                    </div>




                                    <div class="price-box">
                                        <span class="regular-price" id="product-price-33-new">
                                            <span class="price">$500.00</span>                                    </span>



                                        <a href="http://ultimo.infortis-themes.com/demo/default/phone8.html" class="minimal-price-link">
                                            <span class="label">As low as:</span>
                                            <span class="price" id="product-minimal-price-33-new">
                                                $400.00            </span>
                                        </a>
                                    </div>

                                    <div class="actions">



                                    </div>
                                </li>
                            </ul></div></div> <!-- end: itemslider -->

                </div> <!-- end: new-itemslider-wrapper -->
                <script type="text/javascript">
                    //<![CDATA[
                    jQuery(function($) {

                        $('.new-itemslider-wrapper .itemslider').flexslider({
                            namespace: "",
                            animation: "slide",
                            easing: "easeInQuart",
                            slideshow: false,
                            animationLoop: false,
                            animationSpeed: 300,
                            pauseOnHover: true,
                            controlNav: false,
                            controlsContainer: ".new-itemslider-wrapper .nav-wrapper",
                            itemWidth: 188,
                            minItems: 5,
                            maxItems: 5,
                            move: 0})
                                .data("showItems", 5)
                                ; //IMPORTANT: don't remove semicolon!

                    });
                    //]]>
                </script>





                <h3 class="section-title padding-right">Product Brands</h3>
                <div class="brand-slider-wrapper itemslider-wrapper">

                    <div class="nav-wrapper gen-slider-arrows1 gen-slider-arrows1-pos-top-right"><ul class="direction-nav"><li><a class="prev disabled" href="http://ultimo.infortis-themes.com/demo/default/#">Previous</a></li><li><a class="next" href="http://ultimo.infortis-themes.com/demo/default/#">Next</a></li></ul></div>

                    <div class="brand-slider itemslider itemslider-horizontal itemslider-responsive">
                        <!-- end: slides -->
                        <div class="viewport" style="overflow: hidden; position: relative;"><ul class="slides products-grid" style="width: 1600%; margin-left: 0px;">
                                <li class="item" style="width: 215.2px; float: left; display: block;">
                                    <a href="http://ultimo.infortis-themes.com/demo/default/catalogsearch/result/?q=Brandissimi" title="Click to see more products from Brandissimi">
                                        <img src="<?php echo F::themeUrl() ?>/media/brandissimi.png" alt="Brandissimi">
                                    </a>
                                </li>
                                <li class="item" style="width: 215.2px; float: left; display: block;">
                                    <a href="http://ultimo.infortis-themes.com/demo/default/catalogsearch/result/?q=Company" title="Click to see more products from Company">
                                        <img src="<?php echo F::themeUrl() ?>/media/company.png" alt="Company">
                                    </a>
                                </li>
                                <li class="item" style="width: 215.2px; float: left; display: block;">
                                    <a href="http://ultimo.infortis-themes.com/demo/default/catalogsearch/result/?q=DummyBrand" title="Click to see more products from DummyBrand">
                                        <img src="<?php echo F::themeUrl() ?>/media/dummybrand.png" alt="DummyBrand">
                                    </a>
                                </li>
                                <li class="item" style="width: 215.2px; float: left; display: block;">
                                    <a href="http://ultimo.infortis-themes.com/demo/default/catalogsearch/result/?q=Manufacturer" title="Click to see more products from Manufacturer">
                                        <img src="<?php echo F::themeUrl() ?>/media/manufacturer.png" alt="Manufacturer">
                                    </a>
                                </li>
                                <li class="item" style="width: 215.2px; float: left; display: block;">
                                    <a href="http://ultimo.infortis-themes.com/demo/default/catalogsearch/result/?q=Publisher" title="Click to see more products from Publisher">
                                        <img src="<?php echo F::themeUrl() ?>/media/publisher.png" alt="Publisher">
                                    </a>
                                </li>
                                <li class="item" style="width: 215.2px; float: left; display: block;">
                                    <a href="http://ultimo.infortis-themes.com/demo/default/catalogsearch/result/?q=SampleLogo" title="Click to see more products from SampleLogo">
                                        <img src="<?php echo F::themeUrl() ?>/media/samplelogo.png" alt="SampleLogo">
                                    </a>
                                </li>
                                <li class="item" style="width: 215.2px; float: left; display: block;">
                                    <a href="http://ultimo.infortis-themes.com/demo/default/catalogsearch/result/?q=Samsung" title="Click to see more products from Samsung">
                                        <img src="<?php echo F::themeUrl() ?>/media/samsung.png" alt="Samsung">
                                    </a>
                                </li>
                                <li class="item" style="width: 215.2px; float: left; display: block;">
                                    <a href="http://ultimo.infortis-themes.com/demo/default/catalogsearch/result/?q=Apple" title="Click to see more products from Apple">
                                        <img src="<?php echo F::themeUrl() ?>/media/apple.png" alt="Apple">
                                    </a>
                                </li>
                            </ul></div></div> <!-- end: itemslider -->

                </div> <!-- end: brand-slider-wrapper -->
                <script type="text/javascript">
                    //<![CDATA[
                    jQuery(function($) {

                        $('.brand-slider-wrapper .itemslider').flexslider({
                            namespace: "",
                            animation: "slide",
                            animationLoop: 0,
                            easing: "easeInOutQuint",
                            useCSS: false,
                            slideshow: false,
                            animationSpeed: 500,
                            pauseOnHover: 1,
                            controlNav: false,
                            controlsContainer: ".brand-slider-wrapper .nav-wrapper",
                            itemWidth: 188,
                            minItems: 4,
                            maxItems: 4,
                            move: 0
                        })
                                .data("showItems", 4)
                                ; //IMPORTANT: don't remove semicolon!

                    });
                    //]]>
                </script>




                <span class="section-title">Sample Custom Banners</span>
                <br>
                <div class="nested-container">

                    <div class="page-banners clearer">
                        <div class="grid12-3 banner hide-below-768">
                            <a href="http://ultimo.infortis-themes.com/demo/default/typography#banners" title="Click to see more exemples of banners">
                                <img src="<?php echo F::themeUrl() ?>/media/01(3).png" alt="Sample banner">
                            </a>
                        </div>
                        <div class="grid12-3 banner hide-below-480">
                            <a href="http://ultimo.infortis-themes.com/demo/default/typography#banners" title="Replace this image with your own">
                                <img src="<?php echo F::themeUrl() ?>/media/01(3).png" alt="Sample banner">
                            </a>
                        </div>
                        <div class="grid12-3 banner">
                            <a href="http://ultimo.infortis-themes.com/demo/default/typography#banners" title="Replace this image with your own">
                                <img src="<?php echo F::themeUrl() ?>/media/01(3).png" alt="Sample banner">
                            </a>
                        </div>
                        <div class="grid12-3 banner">
                            <a href="http://ultimo.infortis-themes.com/demo/default/typography#banners" title="Replace this image with your own">
                                <img src="<?php echo F::themeUrl() ?>/media/01(3).png" alt="Sample banner">
                            </a>
                        </div>
                    </div>

                </div></div>                </div>
        <div class="postscript grid-full in-col1"></div>
    </div>
</div>