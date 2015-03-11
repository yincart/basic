<div class="item_props_search m_bottom_25">
    <div class="item_props_search_title"><h3><?php echo $category->name ?> - <strong>商品筛选</strong></h3></div>
<?php if(isset($key)){?>
    <div class="item_props_search_result">找到了 <span class="cor_red blod"><?php echo $key;?></span> 共计 <span class="cor_red blod"><?php echo $count;?></span>
        款供您选择
    </div>
<?php }?>
    <div class="item_props_search_params">
    <?php
    $params = $_GET;
    $getprops = empty($params['props']) ? array() : array_flip(explode(';', $params['props']));

    if ($itemProps) {
        foreach ($itemProps as $itemProp) {
            ?>
            <div class="prop_name col-lg-2 col-md-2 col-sm-2 m_bottom_5"><?php echo $itemProp->prop_name; ?>：</div>
            <div class="prop_values col-lg-10 col-md-10 col-sm-10 m_bottom_5">
            <ul>
            <?php foreach ($itemProp->propValues as $propValue) {
                $props = $getprops;
                $pvid = $propValue->prop_id . ':' . $propValue->value_id;
                if (array_key_exists($pvid, $props)) {
                    unset($props[$pvid]);
                    $class = 'prop-select';
                } else {
                    $props[$pvid] = '';
                    $class = '';
                }
                $params['props'] = implode(';', array_keys($props));
                echo '<li><a class="' . $class . '" href="' . Yii::app()->createUrl('catalog/index', $params) . '">' . $propValue->value_name . '</a></li>';
            } ?>
            </ul>
            </div>
        <?php
        }
    }
    ?>
</div>
    </div>
    <div class="clear"></div>