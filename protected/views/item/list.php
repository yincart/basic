<?php
$this->pageTitle = Yii::app()->name . ' - 商品列表';
if ($key == 'new') {
    $keyTitle = '新品上架';
} elseif ($key == 'hot') {
    $keyTitle = '热销商品';
} elseif ($key == 'best') {
    $keyTitle = '精品推荐';
} elseif ($key == 'promote') {
    $keyTitle = '促销商品';
} elseif ($key == 'all') {
    $keyTitle = '全部商品';
} else {
    $keyTitle = '全部商品';
}
$this->breadcrumbs = array(
    '商品列表' => array('/item-list-all'),
    $keyTitle
);
?>    
<?php echo CHtml::beginForm(array('/cart/addToCart'), 'POST', array('id' => 'orderForm')) ?>
<?php foreach ($categories as $category) { ?>
    <div class="box">
        <div class="box-title"><?php echo $category->name ?></div>
        <div class="box-content item-list" style="width:956px">
            <ul>
                <?php
                
                if ($key == 'new') {
                    $condition = 'is_new = 1 and ';
                } elseif ($key == 'hot') {
                    $condition = 'is_hot = 1 and ';
                } elseif ($key == 'best') {
                    $condition = 'is_best = 1 and ';
                } elseif ($key == 'promote') {
                    $condition = 'is_promote = 1 and ';
                } elseif ($key == 'all') {
                    $condition = '';
                } else {
                    $condition = '';
                }
                $cid = $category->getDescendantsId();
                if($cid){
                    $extra = 'category_id in (' .$category->id.', '. $cid . ')';
                }else{
                    $extra = 'category_id in (' .$category->id.')';
                }
                $criteria = new CDbCriteria(array(
                    'condition' => $condition . $extra,
                    'limit' => '10'
                ));
                $items = Item::model()->findAll($criteria);
                if ($items) {
                    foreach ($items as $i) {
                        ?>
                        <li>
                            <?php echo CHtml::hiddenField('id', $i->item_id) ?>
                            <?php echo CHtml::hiddenField('pic_url', $i->getSmallThumb()) ?>
                            <?php echo CHtml::hiddenField('sn', $i->sn) ?>    
                            <?php echo CHtml::hiddenField('title', $i->title) ?>
                            <?php echo CHtml::hiddenField('name', $i->item_id) ?>
                            <?php echo CHtml::hiddenField('price', $i->shop_price) ?>
                            <div class="image"><?php echo $i->getListThumb() ?></div>
                            <div class="title"><?php echo $i->getTitle() ?></div>
                            <div class="price">零售价：<span class="currency"><?php echo $i->currency ?></span><em><?php echo $i->market_price ?></em></div>
                            <div class="price">批发价：<span class="currency"><?php echo $i->currency ?></span><em><?php echo $i->shop_price ?></em></div>
                            <div class="btn-list"><?php echo $i->getBtnList() ?></div>
                        </li>
                        <?php
                    }
                } else {
                    ?>
                    <p style="text-align:center">没有找到相关商品!</p>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>
<?php echo CHtml::endForm(); ?>