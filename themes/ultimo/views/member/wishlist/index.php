<?php
$this->breadcrumbs = array(
    'Wishlists',
);

$this->menu = array(
    array('label' => 'Create Wishlist', 'url' => array('create')),
    array('label' => 'Manage Wishlist', 'url' => array('admin')),
);
?>

<div class="col-main grid12-9 grid-col2-main in-col2">
    <div id="map-popup" class="map-popup" style="display:none;">
        <a href="#" class="map-popup-close" id="map-popup-close">x</a>
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
    <div class="my-account"><div class="my-wishlist">
            <div class="page-title title-buttons">
                <h1>Wishlist</h1>
            </div>

            <form id="wishlist-view-form" action="http://ultimo.infortis-themes.com/demo/default/wishlist/index/update/wishlist_id/15/" method="post">
                <fieldset>
                    <p class="wishlist-empty">You have no items in your wishlist.</p>
                    <div class="buttons-set buttons-set2">



                    </div>
                </fieldset>
            </form>

            <script type="text/javascript">
                //<![CDATA[
                var wishlistForm = new Validation($('wishlist-view-form'));
                function addAllWItemsToCart() {
                    var url = 'http://ultimo.infortis-themes.com/demo/default/wishlist/index/allcart/wishlist_id/15/';
                    var separator = (url.indexOf('?') >= 0) ? '&' : '?';
                    $$('#wishlist-view-form .qty').each(
                            function(input, index) {
                                url += separator + input.name + '=' + encodeURIComponent(input.value);
                                separator = '&';
                            }
                    );
                    setLocation(url);
                }
                //]]>
            </script>
        </div>
        <div class="buttons-set">
            <p class="back-link"><a href="http://ultimo.infortis-themes.com/demo/default/customer/account/"><small>« </small>Back</a></p>
        </div></div>                </div>