<?php
$itemPropValues = json_decode($item->props, true);
$itemSkus = $item->skus;
foreach ($itemProps as $itemProp) {
    if (!$itemProp->is_sale_prop) {
        $itemPropValue =  '';
        if (isset($itemPropValues[$itemProp->item_prop_id])) {
            $values = explode(':', $itemPropValues[$itemProp->item_prop_id]);
            $itemPropValue = $values[1];
        }
        $name = 'ItemProp[' . $itemProp->item_prop_id . ']';
        switch ($itemProp->type) {
            case 1:
                echo TbHtml::textFieldControlGroup($name, $itemPropValue, array('label' => $itemProp->prop_name));
                break;
            case 2:
                $propValueData = CHtml::listData($itemProp->propValues, 'prop_value_id', 'value_name');
                echo TbHtml::dropDownListControlGroup($name, $itemPropValue, $propValueData, array('label' => $itemProp->prop_name));
                break;
            case 3:
                $propValueData = CHtml::listData($itemProp->propValues, 'prop_value_id', 'value_name');
                echo TbHtml::inlineCheckBoxListControlGroup($name, $itemPropValue, $propValueData, array('label' => $itemProp->prop_name));
                break;
        }
    }
}
?>
<hr/>
<?php
$thead = '';
$i = 0;
foreach ($itemProps as $itemProp) {
    if ($itemProp->is_sale_prop) {
        $itemPropValue =  array();
        if (isset($itemPropValues[$itemProp->item_prop_id]) && is_array($itemPropValues[$itemProp->item_prop_id])) {
            foreach ($itemPropValues[$itemProp->item_prop_id] as $value) {
                $values = explode(':', $value);
                $itemPropValue[] = $values[1];
            }
        }
        $name = 'Item[skus][checkbox][' . $itemProp->item_prop_id . ']';
        $propValueData = CHtml::listData($itemProp->propValues, 'prop_value_id', 'value_name');
        $class = $itemProp->is_color_prop ? 'change color-prop' : 'change';
        echo TbHtml::inlineCheckBoxListControlGroup($name, $itemPropValue, $propValueData, array('label' => $itemProp->prop_name, 'class' => $class, 'data-id' => $itemProp->item_prop_id));
        $thead .= '<th><span id="thop_' . $i++ . '">' . $itemProp->prop_name . '</span></th>';
    }
}
?>
<hr id="output" />
<div id="sku_error" class="alert alert-info">您需要选择所有的销售属性，才能组合成完整的规格信息。</div>
<div class="control-group">
    <div class="sku-map">
        <table id="sku" class="table table-bordered">
            <thead>
            <tr>
                <?php echo $thead; ?>
                <th>价格</th>
                <th>数量</th>
                <th>商家编码</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
