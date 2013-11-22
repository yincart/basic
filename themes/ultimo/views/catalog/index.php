<?php
$this->pageTitle = Yii::app()->name . ' - ' . ucfirst(F::t($key));
$this->breadcrumbs = array(
    ucfirst(F::t($key)),
);
?>

 <div class="page-title category-title">
                <h1><?php echo ucfirst($key) ?></h1>
            </div>

            <div class="horizontal-section">

                <a href="http://ultimo.infortis-themes.com/demo/default/women.html#">
                    <!--<img src="<?php echo F::themeUrl() ?>/media/category01.jpg" title="You can edit this block or replace it with custom content" alt="Sample banner">-->
<?php echo CHtml::image(F::baseUrl().'/../../upload/category/'.$model->pic, $key, array('title'=>$key)) ?>
                    <div class="caption light3 full-width">
                        <h2 class="heading permanent">Category Banner</h2>
                        <p>Upload image and description for every category in the store</p>
                        <p>Create landing pages for categories</p>
                    </div>
                </a>

            </div>    




            <div class="category-products">
                <div class="toolbar">

                    <div class="sorter">

                        <p class="amount">
                            Items 1 to 8 of 12 total                    </p>

                        <div class="sort-by">
                            <label>Sort By</label>
                            <select onchange="setLocation(this.value)">
                                <option value="http://ultimo.infortis-themes.com/demo/default/women.html?dir=asc&amp;order=position" selected="selected">
                                    Position                </option>
                                <option value="http://ultimo.infortis-themes.com/demo/default/women.html?dir=asc&amp;order=name">
                                    Name                </option>
                                <option value="http://ultimo.infortis-themes.com/demo/default/women.html?dir=asc&amp;order=price">
                                    Price                </option>
                            </select>
                            <a class="category-asc v-middle" href="http://ultimo.infortis-themes.com/demo/default/women.html?dir=desc&order=position" title="Set Descending Direction">Set Descending Direction</a>
                        </div>

                        <div class="limiter">
                            <label>Show</label>
                            <select onchange="setLocation(this.value)">
                                <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=4">
                                    4                </option>
                                <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=8" selected="selected">
                                    8                </option>
                                <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=12">
                                    12                </option>
                                <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=15">
                                    15                </option>
                                <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=30">
                                    30                </option>
                                <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=80">
                                    80                </option>
                                <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=all">
                                    All                </option>
                            </select> per page        </div>

                        <p class="view-mode">
                            <label>View as:</label>
                            <span title="Grid" class="grid">Grid</span>&nbsp;
                            <a href="<?php echo Yii::app()->createUrl('/catalog/women') ?>?mode=list" title="List" class="list">List</a>&nbsp;
                        </p>

                    </div> <!-- end: sorter -->

                    <div class="pager">
                        <div class="pages gen-direction-arrows1">
                            <strong>Page:</strong>
                            <ol>



                                <li class="current">1</li>
                                <li><a href="http://ultimo.infortis-themes.com/demo/default/women.html?p=2">2</a></li>




                                <li class="next">
                                    <a class="next i-next" href="http://ultimo.infortis-themes.com/demo/default/women.html?p=2" title="Next">
                                        Next                        
                                    </a>
                                </li>
                            </ol>

                        </div>    </div>

                </div>


                <ul class="products-grid category-products-grid itemgrid itemgrid-adaptive itemgrid-3col hover-effect equal-height">
                    <li class="item" style="height: 368px; padding-bottom: 65px;">

                        <div class="product-image-wrapper" style="max-width:295px;">

                            <a href="<?php echo Yii::app()->createUrl('/item/view', array('id'=>94))?>" title="Sample Fashion Product" class="product-image">
                                <img src="<?php echo F::themeUrl() ?>/media/model1a_1(1).jpg" alt="Sample Fashion Product">

                                <img class="alt-img" src="<?php echo F::themeUrl() ?>/media/model1d.jpg" alt="Sample Fashion Product">   

                            </a>

                            <ul class="add-to-links clearer addto-icons addto-onimage display-onhover" style="display: none;"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/1/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/1/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                
                        </div> <!-- end: product-image-wrapper -->

                        <h2 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/dress1.html" title="Sample Fashion Product">Sample Fashion Product</a></h2>

                        <div class="display-onhover" style="display: none;"></div>




                        <div class="price-box">
                            <span class="regular-price" id="product-price-1">
                                <span class="price">$50.00</span>                                    </span>

                        </div>


                        <div class="actions clearer">
                            <button type="button" title="Add to Cart" class="button btn-cart" onclick="setLocation( & #39; http://ultimo.infortis-themes.com/demo/default/dress1.html?options=cart&#39;)"><span><span>Add to Cart</span></span></button>

                        </div> <!-- end: actions -->
                    </li>
                    <li class="item" style="height: 368px; padding-bottom: 65px;">

                        <div class="product-image-wrapper" style="max-width:295px;">

                            <a href="http://ultimo.infortis-themes.com/demo/default/dress2.html" title="Sample Dress with Variants" class="product-image">
                                <img src="<?php echo F::themeUrl() ?>/media/model1f_1.jpg" alt="Sample Dress with Variants">

                                <img class="alt-img" src="<?php echo F::themeUrl() ?>/media/model1e.jpg" alt="Sample Dress with Variants">   

                            </a>

                            <ul class="add-to-links clearer addto-icons addto-onimage display-onhover" style="display: none;"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/6/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/6/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                
                        </div> <!-- end: product-image-wrapper -->

                        <h2 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/dress2.html" title="Sample Dress with Variants">Sample Dress with Variants</a></h2>





                        <div class="price-box">
                            <span class="regular-price" id="product-price-6">
                                <span class="price">$45.00</span>                                    </span>

                        </div>


                        <div class="actions clearer">
                            <button type="button" title="Add to Cart" class="button btn-cart" onclick="setLocation( & #39; http://ultimo.infortis-themes.com/demo/default/dress2.html?options=cart&#39;)"><span><span>Add to Cart</span></span></button>

                        </div> <!-- end: actions -->
                    </li>
                    <li class="item" style="height: 368px; padding-bottom: 65px;">

                        <div class="product-image-wrapper" style="max-width:295px;">

                            <a href="http://ultimo.infortis-themes.com/demo/default/dress3.html" title="Sample Customizable Dress" class="product-image">
                                <img src="<?php echo F::themeUrl() ?>/media/model3a.jpg" alt="Sample Customizable Dress">



                            </a>

                            <ul class="add-to-links clearer addto-icons addto-onimage display-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/7/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/7/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                
                        </div> <!-- end: product-image-wrapper -->

                        <h2 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/dress3.html" title="Sample Customizable Dress">Sample Customizable Dress</a></h2>





                        <div class="price-box">
                            <span class="regular-price" id="product-price-7">
                                <span class="price">$79.99</span>                                    </span>

                        </div>


                        <div class="actions clearer">
                            <button type="button" title="Add to Cart" class="button btn-cart" onclick="setLocation( & #39; http://ultimo.infortis-themes.com/demo/default/dress3.html?options=cart&#39;)"><span><span>Add to Cart</span></span></button>

                        </div> <!-- end: actions -->
                    </li>
                    <li class="item" style="height: 368px; padding-bottom: 65px;">

                        <div class="product-image-wrapper" style="max-width:295px;">

                            <a href="http://ultimo.infortis-themes.com/demo/default/dress4.html" title="Configurable Dress Example" class="product-image">
                                <img src="<?php echo F::themeUrl() ?>/media/model1b_4.jpg" alt="Configurable Dress Example">



                            </a>

                            <ul class="add-to-links clearer addto-icons addto-onimage display-onhover" style="display: none;"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/8/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/8/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                
                        </div> <!-- end: product-image-wrapper -->

                        <h2 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/dress4.html" title="Configurable Dress Example">Configurable Dress Example</a></h2>

                        <div class="display-onhover" style="display: none;"></div>




                        <div class="price-box">
                            <span class="regular-price" id="product-price-8">
                                <span class="price">$100.00</span>                                    </span>

                        </div>


                        <div class="actions clearer">
                            <button type="button" title="Add to Cart" class="button btn-cart" onclick="setLocation( & #39; http://ultimo.infortis-themes.com/demo/default/dress4.html?options=cart&#39;)"><span><span>Add to Cart</span></span></button>

                        </div> <!-- end: actions -->
                    </li>
                    <li class="item" style="height: 368px; padding-bottom: 65px;">

                        <div class="product-image-wrapper" style="max-width:295px;">

                            <a href="http://ultimo.infortis-themes.com/demo/default/dress5.html" title="Simple Dress Example" class="product-image">
                                <img src="<?php echo F::themeUrl() ?>/media/model6a.jpg" alt="Simple Dress Example">



                            </a>

                            <ul class="add-to-links clearer addto-icons addto-onimage display-onhover" style="display: none;"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/13/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/13/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                
                        </div> <!-- end: product-image-wrapper -->

                        <h2 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/dress5.html" title="Simple Dress Example">Simple Dress Example</a></h2>

                        <div class="display-onhover" style="display: none;"></div>




                        <div class="price-box">
                            <span class="regular-price" id="product-price-13">
                                <span class="price">$35.50</span>                                    </span>

                        </div>


                        <div class="actions clearer">
                            <button type="button" title="Add to Cart" class="button btn-cart" onclick="setLocation( & #39; http://ultimo.infortis-themes.com/demo/default/checkout/cart/add/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/product/13/&#39;)"><span><span>Add to Cart</span></span></button>

                        </div> <!-- end: actions -->
                    </li>
                    <li class="item" style="height: 368px; padding-bottom: 65px;">

                        <div class="product-image-wrapper" style="max-width:295px;">

                            <a href="http://ultimo.infortis-themes.com/demo/default/dress6.html" title="Set of Many Products" class="product-image">
                                <img src="<?php echo F::themeUrl() ?>/media/model7a.jpg" alt="Set of Many Products">



                            </a>

                            <ul class="add-to-links clearer addto-icons addto-onimage display-onhover" style="display: none;"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/14/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/14/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                
                        </div> <!-- end: product-image-wrapper -->

                        <h2 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/dress6.html" title="Set of Many Products">Set of Many Products</a></h2>




                        <div class="price-box">
                            <p class="minimal-price">
                                <span class="price-label">Starting at:</span>
                                <span class="price" id="product-minimal-price-14">
                                    $35.50                </span>
                            </p>
                        </div>

                        <div class="actions clearer">
                            <button type="button" title="Add to Cart" class="button btn-cart" onclick="setLocation( & #39; http://ultimo.infortis-themes.com/demo/default/checkout/cart/add/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/product/14/&#39;)"><span><span>Add to Cart</span></span></button>

                        </div> <!-- end: actions -->
                    </li>
                    <li class="item" style="height: 368px; padding-bottom: 65px;">

                        <div class="product-image-wrapper" style="max-width:295px;">

                            <a href="http://ultimo.infortis-themes.com/demo/default/dress-example-size-xl.html" title="Dress Example Size XL" class="product-image">
                                <img src="<?php echo F::themeUrl() ?>/media/model5a_3.jpg" alt="Dress Example Size XL">



                            </a>

                            <ul class="add-to-links clearer addto-icons addto-onimage display-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/19/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/19/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                
                        </div> <!-- end: product-image-wrapper -->

                        <h2 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/dress-example-size-xl.html" title="Dress Example Size XL">Dress Example Size XL</a></h2>

                        <div class="display-onhover"></div>




                        <div class="price-box">
                            <span class="regular-price" id="product-price-19">
                                <span class="price">$100.00</span>                                    </span>

                        </div>


                        <div class="actions clearer">
                            <button type="button" title="Add to Cart" class="button btn-cart" onclick="setLocation( & #39; http://ultimo.infortis-themes.com/demo/default/checkout/cart/add/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/product/19/&#39;)"><span><span>Add to Cart</span></span></button>

                        </div> <!-- end: actions -->
                    </li>
                    <li class="item" style="height: 368px; padding-bottom: 65px;">

                        <div class="product-image-wrapper" style="max-width:295px;">

                            <a href="http://ultimo.infortis-themes.com/demo/default/dress-example-size-l.html" title="Dress Example Size L" class="product-image">
                                <img src="<?php echo F::themeUrl() ?>/media/model8a.jpg" alt="Dress Example Size L">



                            </a>

                            <ul class="add-to-links clearer addto-icons addto-onimage display-onhover"><li><a href="http://ultimo.infortis-themes.com/demo/default/wishlist/index/add/product/18/" class="link-wishlist" title="Add to Wishlist">Add to Wishlist</a></li><li><a href="http://ultimo.infortis-themes.com/demo/default/catalog/product_compare/add/product/18/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/" class="link-compare" title="Add to Compare">Add to Compare</a></li></ul>                
                        </div> <!-- end: product-image-wrapper -->

                        <h2 class="product-name"><a href="http://ultimo.infortis-themes.com/demo/default/dress-example-size-l.html" title="Dress Example Size L">Dress Example Size L</a></h2>





                        <div class="price-box">
                            <span class="regular-price" id="product-price-18">
                                <span class="price">$100.00</span>                                    </span>

                        </div>


                        <div class="actions clearer">
                            <button type="button" title="Add to Cart" class="button btn-cart" onclick="setLocation( & #39; http://ultimo.infortis-themes.com/demo/default/checkout/cart/add/uenc/aHR0cDovL3VsdGltby5pbmZvcnRpcy10aGVtZXMuY29tL2RlbW8vZGVmYXVsdC93b21lbi5odG1s/product/18/&#39;)"><span><span>Add to Cart</span></span></button>

                        </div> <!-- end: actions -->
                    </li>

                </ul>

                <div class="toolbar-bottom">
                    <div class="toolbar">

                        <div class="sorter">

                            <p class="amount">
                                Items 1 to 8 of 12 total                    </p>

                            <div class="sort-by">
                                <label>Sort By</label>
                                <select onchange="setLocation(this.value)">
                                    <option value="http://ultimo.infortis-themes.com/demo/default/women.html?dir=asc&amp;order=position" selected="selected">
                                        Position                </option>
                                    <option value="http://ultimo.infortis-themes.com/demo/default/women.html?dir=asc&amp;order=name">
                                        Name                </option>
                                    <option value="http://ultimo.infortis-themes.com/demo/default/women.html?dir=asc&amp;order=price">
                                        Price                </option>
                                </select>
                                <a class="category-asc v-middle" href="http://ultimo.infortis-themes.com/demo/default/women.html?dir=desc&order=position" title="Set Descending Direction">Set Descending Direction</a>
                            </div>

                            <div class="limiter">
                                <label>Show</label>
                                <select onchange="setLocation(this.value)">
                                    <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=4">
                                        4                </option>
                                    <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=8" selected="selected">
                                        8                </option>
                                    <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=12">
                                        12                </option>
                                    <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=15">
                                        15                </option>
                                    <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=30">
                                        30                </option>
                                    <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=80">
                                        80                </option>
                                    <option value="http://ultimo.infortis-themes.com/demo/default/women.html?limit=all">
                                        All                </option>
                                </select> per page        </div>

                            <p class="view-mode">
                                <label>View as:</label>
                                <span title="Grid" class="grid">Grid</span>&nbsp;
                                <a href="http://ultimo.infortis-themes.com/demo/default/women.html?mode=list" title="List" class="list">List</a>&nbsp;
                            </p>

                        </div> <!-- end: sorter -->

                        <div class="pager">
                            <div class="pages gen-direction-arrows1">
                                <strong>Page:</strong>
                                <ol>



                                    <li class="current">1</li>
                                    <li><a href="http://ultimo.infortis-themes.com/demo/default/women.html?p=2">2</a></li>




                                    <li class="next">
                                        <a class="next i-next" href="http://ultimo.infortis-themes.com/demo/default/women.html?p=2" title="Next">
                                            Next                        
                                        </a>
                                    </li>
                                </ol>

                            </div>    </div>

                    </div>
                </div>
            </div>

            <div class="block_category_below_collection std"><div class="nested-container hide-below-768">

                    <div class="page-banners clearer">
                        <div class="grid12-6 banner">
                            <a href="http://ultimo.infortis-themes.com/demo/default/about-magento-demo-store" title="Replace this image with your own">
                                <img src="<?php echo F::themeUrl() ?>/media/01(2).png" alt="Sample banner">
                            </a>
                        </div>
                        <div class="grid12-6 banner">
                            <a href="http://ultimo.infortis-themes.com/demo/default/about-magento-demo-store" title="Replace this image with your own">
                                <img src="<?php echo F::themeUrl() ?>/media/03(2).png" alt="Sample banner">
                            </a>
                        </div>
                    </div>

                </div></div>

            <div id="map-popup" class="map-popup" style="display:none;">
                <a href="http://ultimo.infortis-themes.com/demo/default/women.html#" class="map-popup-close" id="map-popup-close">x</a>
                <div class="map-popup-arrow"></div>
                <div class="map-popup-heading"><h2 id="map-popup-heading"></h2></div>
                <div class="map-popup-content" id="map-popup-content">
                    <div class="map-popup-checkout">
                        <form action="" method="POST" id="product_addtocart_form_from_popup">
                            <input type="hidden" name="product" class="product_id" value="" id="map-popup-product-id">
                            <div class="additional-addtocart-box">
                            </div>
                            <button type="button" title="Add to Cart" class="button btn-cart" id="map-popup-button"><span><span>Add to Cart</span></span></button>
                        </form>
                    </div>
                    <div class="map-popup-msrp" id="map-popup-msrp-box"><strong>Price:</strong> <span style="text-decoration:line-through;" id="map-popup-msrp"></span></div>
                    <div class="map-popup-price" id="map-popup-price-box"><strong>Actual Price:</strong> <span id="map-popup-price"></span></div>
                    <script type="text/javascript">
                            //<![CDATA[
                            document.observe("dom:loaded", Catalog.Map.bindProductForm);
                            //]]>
                    </script>
                </div>
                <div class="map-popup-text" id="map-popup-text">Our price is lower than the manufacturer's "minimum advertised price."  As a result, we cannot show you the price in catalog or the product page. <br><br> You have no obligation to purchase the product once you know the price. You can simply remove the item from your cart.</div>
                <div class="map-popup-text" id="map-popup-text-what-this">Our price is lower than the manufacturer's "minimum advertised price."  As a result, we cannot show you the price in catalog or the product page. <br><br> You have no obligation to purchase the product once you know the price. You can simply remove the item from your cart.</div>
            </div>