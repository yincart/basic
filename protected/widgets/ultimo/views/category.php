<div class="block-title">
    <strong><span><?php echo F::t('Categories') ?></span></strong>
</div>
<div class="block-content" style="">
    
<?php
$categories = Category::model()->findByPk(3);
$descendants = $categories->descendants()->findAll();
$level = 2;
$k=1;

foreach ($descendants as $category) {
    if ($category->level == $level)
        echo CHtml::closeTag('li') . "\n";
    else if ($category->level > $level)
        echo CHtml::openTag('ul' , array('class'=>'level0')) . "\n";
    else {
        echo CHtml::closeTag('li') . "\n";

        for ($i = $level - $category->level; $i; $i--) {
            echo CHtml::closeTag('ul') . "\n";
            echo CHtml::closeTag('li') . "\n";
        }
    }

    
    
    echo CHtml::openTag('li', array('class'=>'level0 nav-'.$k.' level-top'));
    echo CHtml::encode($category->name).$category->getLabel();
    $level = $category->level;
    
}

for ($i = $level; $i; $i--) {
    echo CHtml::closeTag('li') . "\n";
    echo CHtml::closeTag('ul') . "\n";
    
}
?>


        <?php
        echo '<hr />';
        $category = Category::model()->findByPk(3);
        $parent = $category->children()->findAll();
        foreach ($parent as $k => $p) {
            ?>
            <li class="level0 nav-<?php echo $k+1 ?> level-top">
                <a href="<?php echo Yii::app()->createUrl('/item/index', array('id' => $p->id)) ?>" class="level-top">
                    <span><?php echo $p->name ?> 
                    <?php if($p->label=='1') {
                        echo '<span class="cat-label cat-label-label1 pin-bottom">New</span>';
                    }elseif($p->label=='2'){
                        echo '<span class="cat-label cat-label-label2">Hot!</span>';
                    }
?>
                    </span>
                </a>
                <?php if($p->getChildCount()>0) { ?>
                <span class="opener">&nbsp;</span>
                <ul class="level0" style="display: block;">
                    
                </ul>
                <?php } ?>
            </li>
        <?php } ?>
            
<!--        <li class="level0 nav-1 level-top first current">
            <a href="<?php echo F::themeUrl() ?>/media/item.html" class="level-top">
                <span>Women</span>
            </a>
        </li>
        <li class="level0 nav-2 level-top parent active" style="">
            <a href="http://ultimo.infortis-themes.com/demo/default/fashion.html" class="level-top">
                <span>Fashion <span class="cat-label cat-label-label1 pin-bottom">New</span></span>
            </a>
            <span class="opener">&nbsp;</span>

            <ul class="level0" style="display: block;">
                <li class="level1 nav-2-1 first parent" style="">
                    <a href="http://ultimo.infortis-themes.com/demo/default/fashion/tops.html">
                        <span>Tops <span class="cat-label cat-label-label2">Hot!</span></span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-2-1-1 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/tops/evening-tops.html">
                                <span>Evening Tops</span>
                            </a>
                        </li><li class="level2 nav-2-1-2">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/tops/shirts-blouses.html">
                                <span>Shirts &amp; Blouses</span>
                            </a>
                        </li><li class="level2 nav-2-1-3">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/tops/tunics.html">
                                <span>Tunics</span>
                            </a>
                        </li><li class="level2 nav-2-1-4 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/tops/vests.html">
                                <span>Vests</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="level1 nav-2-2 parent" style="">
                    <a href="http://ultimo.infortis-themes.com/demo/default/fashion/dresses.html">
                        <span>Dresses <span class="cat-label cat-label-label2">Hot!</span></span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-2-2-5 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/dresses/casual-dresses.html">
                                <span>Casual Dresses</span>
                            </a>
                        </li><li class="level2 nav-2-2-6">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/dresses/evening.html">
                                <span>Evening</span>
                            </a>
                        </li><li class="level2 nav-2-2-7">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/dresses/designer.html">
                                <span>Designer</span>
                            </a>
                        </li><li class="level2 nav-2-2-8 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/dresses/party.html">
                                <span>Party</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="level1 nav-2-3 parent">
                    <a href="http://ultimo.infortis-themes.com/demo/default/fashion/shoes.html">
                        <span>Shoes</span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-2-3-9 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/shoes/flat-shoes.html">
                                <span>Flat Shoes</span>
                            </a>
                        </li><li class="level2 nav-2-3-10">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/shoes/flat-sandals.html">
                                <span>Flat Sandals</span>
                            </a>
                        </li><li class="level2 nav-2-3-11">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/shoes/boots.html">
                                <span>Boots</span>
                            </a>
                        </li><li class="level2 nav-2-3-12 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/shoes/heels.html">
                                <span>Heels</span>
                            </a>
                        </li>
                    </ul>

                </li><li class="level1 nav-2-4 parent">
                    <a href="http://ultimo.infortis-themes.com/demo/default/fashion/jewelry.html">
                        <span>Jewelry</span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-2-4-13 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/jewelry/bracelets.html">
                                <span>Bracelets</span>
                            </a>
                        </li><li class="level2 nav-2-4-14">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/jewelry/necklaces-pendants.html">
                                <span>Necklaces &amp; Pendants</span>
                            </a>
                        </li><li class="level2 nav-2-4-15 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/jewelry/pins-brooches.html">
                                <span>Pins &amp; Brooches</span>
                            </a>
                        </li>
                    </ul>

                </li><li class="level1 nav-2-5 parent">
                    <a href="http://ultimo.infortis-themes.com/demo/default/fashion/lingerie.html">
                        <span>Lingerie</span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-2-5-16 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/lingerie/bras.html">
                                <span>Bras</span>
                            </a>
                        </li><li class="level2 nav-2-5-17">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/lingerie/bodies.html">
                                <span>Bodies</span>
                            </a>
                        </li><li class="level2 nav-2-5-18">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/lingerie/lingerie-sets.html">
                                <span>Lingerie Sets</span>
                            </a>
                        </li><li class="level2 nav-2-5-19 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/lingerie/shapewear.html">
                                <span>Shapewear</span>
                            </a>
                        </li>
                    </ul>

                </li><li class="level1 nav-2-6 parent">
                    <a href="http://ultimo.infortis-themes.com/demo/default/fashion/coats-jackets.html">
                        <span>Jackets</span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-2-6-20 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/coats-jackets/coats.html">
                                <span>Coats</span>
                            </a>
                        </li><li class="level2 nav-2-6-21">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/coats-jackets/jackets.html">
                                <span>Jackets</span>
                            </a>
                        </li><li class="level2 nav-2-6-22">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/coats-jackets/leather-jackets.html">
                                <span>Leather Jackets</span>
                            </a>
                        </li><li class="level2 nav-2-6-23 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/coats-jackets/blazers.html">
                                <span>Blazers</span>
                            </a>
                        </li>
                    </ul>

                </li><li class="level1 nav-2-7 parent">
                    <a href="http://ultimo.infortis-themes.com/demo/default/fashion/bags-purses.html">
                        <span>Bags &amp; Purses</span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-2-7-24 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/bags-purses/bags.html">
                                <span>Bags</span>
                            </a>
                        </li><li class="level2 nav-2-7-25">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/bags-purses/designer-handbags.html">
                                <span>Designer Handbags</span>
                            </a>
                        </li><li class="level2 nav-2-7-26">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/bags-purses/purses.html">
                                <span>Purses</span>
                            </a>
                        </li><li class="level2 nav-2-7-27 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/bags-purses/shoulder-bags.html">
                                <span>Shoulder Bags</span>
                            </a>
                        </li>
                    </ul>

                </li><li class="level1 nav-2-8 last parent">
                    <a href="http://ultimo.infortis-themes.com/demo/default/fashion/swimwear.html">
                        <span>Swimwear</span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-2-8-28 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/swimwear/swimsuits.html">
                                <span>Swimsuits</span>
                            </a>
                        </li><li class="level2 nav-2-8-29">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/swimwear/beach-clothing.html">
                                <span>Beach Clothing</span>
                            </a>
                        </li><li class="level2 nav-2-8-30 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/fashion/swimwear/bikinis.html">
                                <span>Bikinis</span>
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>
        </li>
        <li class="level0 nav-3 level-top parent">
            <a href="http://ultimo.infortis-themes.com/demo/default/electronics.html" class="level-top">
                <span>Electronics</span>
            </a>
            <span class="opener">&nbsp;</span>

            <ul class="level0" style="display: none;">
                <li class="level1 nav-3-1 first parent">
                    <a href="http://ultimo.infortis-themes.com/demo/default/electronics/smartphones.html">
                        <span>Smartphones</span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-3-1-1 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/smartphones/sample.html">
                                <span>Sample <span class="cat-label cat-label-label1">New</span></span>
                            </a>
                        </li><li class="level2 nav-3-1-2">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/smartphones/apple.html">
                                <span>Apple</span>
                            </a>
                        </li><li class="level2 nav-3-1-3">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/smartphones/samsung.html">
                                <span>Samsung</span>
                            </a>
                        </li><li class="level2 nav-3-1-4">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/smartphones/blackberry.html">
                                <span>BlackBerry</span>
                            </a>
                        </li><li class="level2 nav-3-1-5">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/smartphones/motorola.html">
                                <span>Motorola</span>
                            </a>
                        </li><li class="level2 nav-3-1-6">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/smartphones/nokia.html">
                                <span>Nokia</span>
                            </a>
                        </li><li class="level2 nav-3-1-7 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/smartphones/htc.html">
                                <span>HTC</span>
                            </a>
                        </li>
                    </ul>

                </li><li class="level1 nav-3-2 parent">
                    <a href="http://ultimo.infortis-themes.com/demo/default/electronics/phone-accessories.html">
                        <span>Accessories</span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-3-2-8 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/phone-accessories/headsets.html">
                                <span>Headsets</span>
                            </a>
                        </li><li class="level2 nav-3-2-9">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/phone-accessories/batteries.html">
                                <span>Batteries</span>
                            </a>
                        </li><li class="level2 nav-3-2-10">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/phone-accessories/screen-protectors.html">
                                <span>Screen Protectors</span>
                            </a>
                        </li><li class="level2 nav-3-2-11">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/phone-accessories/memory-cards.html">
                                <span>Memory Cards</span>
                            </a>
                        </li><li class="level2 nav-3-2-12">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/phone-accessories/cables-adapters.html">
                                <span>Cables &amp; Adapters</span>
                            </a>
                        </li><li class="level2 nav-3-2-13">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/phone-accessories/chargers.html">
                                <span>Chargers</span>
                            </a>
                        </li><li class="level2 nav-3-2-14 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/phone-accessories/cases.html">
                                <span>Cases</span>
                            </a>
                        </li>
                    </ul>

                </li><li class="level1 nav-3-3 parent">
                    <a href="http://ultimo.infortis-themes.com/demo/default/electronics/cameras.html">
                        <span>Cameras</span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-3-3-15 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/cameras/digital-cameras.html">
                                <span>Digital Cameras</span>
                            </a>
                        </li><li class="level2 nav-3-3-16">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/cameras/camcorders.html">
                                <span>Camcorders</span>
                            </a>
                        </li><li class="level2 nav-3-3-17">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/cameras/lenses.html">
                                <span>Lenses</span>
                            </a>
                        </li><li class="level2 nav-3-3-18">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/cameras/filters.html">
                                <span>Filters</span>
                            </a>
                        </li><li class="level2 nav-3-3-19 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/cameras/tripods.html">
                                <span>Tripods</span>
                            </a>
                        </li>
                    </ul>

                </li><li class="level1 nav-3-4 last parent">
                    <a href="http://ultimo.infortis-themes.com/demo/default/electronics/computers.html">
                        <span>Computers</span>
                    </a>
                    <span class="opener">&nbsp;</span>

                    <ul class="level1" style="display: none;">
                        <li class="level2 nav-3-4-20 first">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/computers/laptops.html">
                                <span>Laptops</span>
                            </a>
                        </li><li class="level2 nav-3-4-21">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/computers/hard-drives.html">
                                <span>Hard Drives</span>
                            </a>
                        </li><li class="level2 nav-3-4-22">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/computers/monitors.html">
                                <span>Monitors</span>
                            </a>
                        </li><li class="level2 nav-3-4-23 last">
                            <a href="http://ultimo.infortis-themes.com/demo/default/electronics/computers/processors.html">
                                <span>Processors</span>
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>

        </li>
        <li class="level0 nav-4 level-top last">
            <a href="http://ultimo.infortis-themes.com/demo/default/downloadable.html" class="level-top">
                <span>Digital</span>
            </a>
        </li>		-->
    
</div>