<div class="header container">
<div class="grid-full">

    <div class="header-top clearer">
        <div class="block_header_top_left item item-left"><div class="hide-below-768 phone" title="You can put here a phone number or some additional help info">Call +001 555 801</div></div>
        <div class="block_header_top_left2 item item-left">
            <div class="show-separators">

                <ul class="links">
                    <li class="first hide-below-480">
                        <?php echo CHtml::link(F::t('About Us'), array('/page/index', 'key' => 'about'), array('title' => 'About our store')) ?>
                    </li>
                    <li class="hide-below-768">
                        <?php echo CHtml::link(F::t('Features'), array('/site/page', 'view' => 'features'), array('title' => 'See the list of all features')) ?>
                    </li>
                    <li class="last hide-below-480">
                        <?php echo CHtml::link(F::t('Contact Us'), array('/page/index', 'key' => 'contact'), array('title' => 'Contact Us')) ?>
                    </li>
                </ul>

            </div>
        </div>
        <div class="item item-left hide-below-960">
            <p class="welcome-msg"><?php echo F::t('Welcome to our store!') ?> </p>
        </div>

        <div class="block_header_top_right item item-right"><div class="show-separators">

                <ul class="links">
                    <li class="first hide-below-960">
                        <?php echo CHtml::link(F::t('News'), array('/article/index'), array('title'=>'Our store news')) ?>
                    </li>
                    <li class="last hide-below-960">
                        <?php echo CHtml::link(F::t('Feedback'), array('/feedback/index'), array('title'=>'Feedback on our store')) ?>
                    </li>
                </ul>

            </div>
        </div>


        <div class="dropdown currency-switcher item item-right">
            <div class="dropdown-toggle cover">
                <div>
                    <div class="label hide-below-768"><?php echo F::t('Currency:')?></div>
                    <div class="value">USD</div>
                    <div class="caret">&nbsp;</div>
                </div>
            </div>
            <ul class="dropdown-menu left-hand" style="display: none;"><li><a href="http://ultimo.infortis-themes.com/demo/default/directory/currency/switch/currency/BRL/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/">BRL - Brazilian Real</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/directory/currency/switch/currency/GBP/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/">GBP - British Pound Sterling</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/directory/currency/switch/currency/CNY/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/">CNY - Chinese Yuan Renminbi</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/directory/currency/switch/currency/EUR/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/">EUR - Euro</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/directory/currency/switch/currency/RUB/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC8,/">RUB - Russian Ruble</a></li><li class="current">USD - US Dollar</li></ul>    </div>

        <div class="dropdown lang-switcher item item-right">
            <div class="dropdown-toggle cover">
                <div>
                    <div class="label dropdown-icon flag" style="background-image:url(<?php echo F::baseUrl().'/images/flag_'.Yii::app()->translate->getLanguage().'.png' ?>)">&nbsp;</div>
                    <div class="value"><?php echo Yii::app()->translate->getLanguageName(Yii::app()->translate->getLanguage()) ?></div>
                    <div class="caret">&nbsp;</div>
                </div>
            </div>
            <ul class="dropdown-menu left-hand" style="display: none;">
                <li><a href="<?php echo Yii::app()->createUrl('/translate/translate/set', array('lang'=>'en')) ?>" class="current">
                    <span class="label dropdown-icon" style="background-image:url(<?php echo F::baseUrl().'/images/flag_en.png'?>);">&nbsp;</span>English</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/translate/translate/set', array('lang'=>'de')) ?>">
                        <span class="label dropdown-icon" style="background-image:url(<?php echo F::baseUrl().'/images/flag_de.png'?>);">&nbsp;</span>German</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/translate/translate/set', array('lang'=>'zh_cn')) ?>">
                        <span class="label dropdown-icon" style="background-image:url(<?php echo F::baseUrl().'/images/flag_zh_cn.png'?>);">&nbsp;</span>Chinese</a></li>  
                <li><a href="<?php echo Yii::app()->createUrl('/translate/translate/set', array('lang'=>'en_us')) ?>">
                        <span class="label dropdown-icon" style="background-image:url(<?php echo F::baseUrl().'/images/flag_en_us.png'?>);">&nbsp;</span>America</a></li>    
                <li><a href="<?php echo Yii::app()->createUrl('/translate/translate/set', array('lang'=>'ru')) ?>">
                        <span class="label dropdown-icon" style="background-image:url(<?php echo F::baseUrl().'/images/flag_ru.png'?>);">&nbsp;</span>Russian</a></li>        
            </ul>    
        </div>
    </div>

    <!-- end: header-top %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

    <div class="header-main v-grid-container">
        <div class="logo-wrapper grid12-4 v-grid">
            <h1 class="logo"><strong>Responsive Magento Theme</strong><a href="<?php echo F::themeUrl() ?>/media/index.html" title="Responsive Magento Theme"><img src="<?php echo F::themeUrl() ?>/media/logo.png" alt="Responsive Magento Theme"></a></h1>
        </div>

        <!--<div class="grid12-8 v-grid">-->	<!-- TODO:remove test!!!!!!!!!!!!!! -->

        <div class="header-top-search-wrapper grid12-4 v-grid clearer">
                <form  id="search_mini_form" action="<?php echo Yii::app()->createUrl("/item/index")?>" method="get">
                <div class="form-search">
                    <label for="search">Search:</label>
                    <input id="search" type="text" name="q" value="" class="input-text" maxlength="128" autocomplete="off">
                        <button type="submit" title="Search" class="button"><span><span>Search</span></span></button>
                        <div id="search_autocomplete" class="search-autocomplete" style="display: none;"></div>
                        <script type="text/javascript">
                            //<![CDATA[
                            var searchForm = new Varien.searchForm('search_mini_form', 'search', 'Search entire store here...');
                            searchForm.initAutocomplete('http://ultimo.infortis-themes.com/demo/default/catalogsearch/ajax/suggest/', 'search_autocomplete');
                            //]]>
                        </script>
                </div>
            </form>
        </div>

        <div class="user-menu clearer grid12-4 v-grid">


            <div id="mini-cart" class="dropdown is-not-empty">

                <div class="dropdown-toggle cover" title="View Cart">
                    <div>
     
                        <span class="first close-to-text icon i-cart no-bg-color">&nbsp;</span>
                        <div class="hide-below-960"><?php echo F::t('Cart') ?></div>
                        <div class="label amount">
                            <?php 
                            $cart = Yii::app()->cart;
                            $count = $cart->total_items();
                            $total = $cart->total();
                            ?>
                            (<?php echo $count ?>)</div>
                        <a class="summary" href="<?php echo Yii::app()->createUrl('/cart/index') ?>" title="View all items in your shopping cart">
                            <span class="subtotal">
                                <span class="price">$<?php echo $total ?></span>                    				
                            </span>
                        </a>
                        <div class="caret">&nbsp;</div>

                    </div> <!-- end: dropdown-toggle > div -->
                </div> <!-- end: dropdown-toggle -->

                <div class="dropdown-menu left-hand">
                    <div class="">
                        <div class="block_mini_cart_above_products"><div style="padding:15px; background-color:#f5f5f5; color:#d90000;" title="Customizable CMS block for promo info">
                                <?php echo CHtml::link('Check our latest super promotions!', array('/item/promotion'), array('class'=>'go')) ?>
                            </div></div>

                        <h4 class="block-subtitle">Recently added item(s)</h4>
                        <ol id="cart-sidebar" class="mini-products-list clearer">
                            <li class="item last odd">
                                <a href="http://ultimo.infortis-themes.com/demo/default/dress1.html" title="Sample Fashion Product" class="product-image">
                                    <img src="<?php echo F::themeUrl() ?>/media/model1a_1.jpg" width="50" height="50" alt="Sample Fashion Product">
                                </a>
                                <div class="product-details">
                                    <a href="" title="Remove This Item" onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?');" class="btn-remove">Remove This Item</a>
                                    <a href="http://ultimo.infortis-themes.com/demo/default/checkout/cart/configure/id/855/" title="Edit item" class="btn-edit">Edit item</a>
                                    <p class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/dress1.html">Sample Fashion Product</a></p>
                                    <strong>1</strong> x
                                    <span class="price">$50.00</span>           
                                    <div class="truncated">
                                        <div class="truncated_full_value">
                                            <dl class="item-options">
                                                <dt>Color</dt>
                                                <dd>
                                                    White                                    
                                                </dd>
                                                <dt>Size</dt>
                                                <dd>
                                                    S                                    
                                                </dd>
                                            </dl>
                                        </div>
                                        <a href="http://ultimo.infortis-themes.com/demo/default/#" onclick="return false;" class="details">Details</a>
                                    </div>
                                </div>
                            </li>
                        </ol>
                        <script type="text/javascript">decorateList('cart-sidebar', 'none-recursive')</script>

                        <div class="actions clearer">
                            <button type="button" title="View all items in your shopping cart" class="button btn-inline" onclick="setLocation('<?php echo Yii::app()->createUrl('/cart/index')?>')"><span><span><?php echo F::t('View All') ?></span></span></button>

                            <button type="button" title="Proceed to Checkout" class="button btn-checkout btn-inline " onclick="setLocation('<?php echo Yii::app()->createUrl('/order/checkout')?>')"><span><span><?php echo F::t('Proceed to Checkout') ?></span></span></button>
                        </div>

                    </div> <!-- end: block-content-inner -->
                </div> <!-- end: dropdown-menu -->

            </div> <!-- end: mini-cart -->

            <div class="after-mini-cart"></div>

            <div class="top-links show-separators">


                <div class="dropdown quick-compare is-empty">

                    <div class="dropdown-toggle cover" title="You have no items to compare.">
                        <div>
                            <span class="first close-to-text icon i-compare no-bg-color">&nbsp;</span>
                            <div class="hide-below-1280"><?php echo F::t('Compare') ?></div>
                            <div class="amount">(0)</div>
                            <div class="caret">&nbsp;</div>
                        </div>
                    </div>
                    <div class="dropdown-menu left-hand">
                        <div class="empty"><?php echo F::t('You have no items to compare.') ?></div>
                    </div><!-- end: dropdown-menu -->

                </div>


                <ul class="links">


                    <li class="first"><?php echo CHtml::link(F::t('Account'), array('/member'), array('title'=>'Account'))?></li>
                    <li><?php echo CHtml::link(F::t('Wishlist'), array('/member/wishlist'), array('title'=>'Wishlist'))?></li>
                    <li><?php echo CHtml::link(F::t('Log In'), array('/user/login'), array('title'=>'Log In'))?></li>
                    <li class=" last" id="link-sign-up"><?php echo CHtml::link(F::t('Sign Up'), array('/user/registration'), array('title'=>'Sign Up'))?></li>
                </ul>
            </div> <!-- end: top-links -->

        </div> <!-- end: user-menu -->

        <!--</div>-->	<!-- TODO:remove test!!!!!!!!!!! -->

    </div> <!-- end: header-main -->

</div> <!-- end: grid unit -->
</div> <!-- end: header -->