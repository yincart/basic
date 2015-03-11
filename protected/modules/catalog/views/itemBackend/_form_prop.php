<?php
$itemPropValues = json_decode($item->props, true);
$itemSkus = $item->skus;
foreach ($itemProps as $itemProp) {
    if (!$itemProp->is_sale_prop) {
        $itemPropValue =  '';
        if (isset($itemPropValues[$itemProp->prop_id])) {
            if (is_array($itemPropValues[$itemProp->prop_id])) {
                $itemPropValue = array();
                foreach ($itemPropValues[$itemProp->prop_id] as $value) {
                    $values = explode(':', $value);
                    $itemPropValue[] = $values[1];
                }
            } else {
                $values = explode(':', $itemPropValues[$itemProp->prop_id]);
                $itemPropValue = $values[1];
            }
        }
        $name = 'ItemProp[' . $itemProp->prop_id . ']';
        switch ($itemProp->type) {
            case 1:
                echo TbHtml::textFieldControlGroup($name, $itemPropValue, array('label' => $itemProp->prop_name));
                break;
            case 2:
                $propValueData = CHtml::listData($itemProp->propValues, 'value_id', 'value_name');
                echo TbHtml::dropDownListControlGroup($name, $itemPropValue, $propValueData, array('label' => $itemProp->prop_name));
                break;
            case 3:
                $propValueData = CHtml::listData($itemProp->propValues, 'value_id', 'value_name');
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
        if (isset($itemPropValues[$itemProp->prop_id]) && is_array($itemPropValues[$itemProp->prop_id])) {
            foreach ($itemPropValues[$itemProp->prop_id] as $value) {
                $values = explode(':', $value);
                $itemPropValue[] = $values[1];
            }
        }
        $name = 'Item[skus][checkbox][' . $itemProp->prop_id . ']';
        $propValueData = CHtml::listData($itemProp->propValues, 'value_id', 'value_name');
        $class = $itemProp->is_color_prop ? 'change color-prop' : 'change';
        echo TbHtml::inlineCheckBoxListControlGroup($name, $itemPropValue, $propValueData, array('label' => $itemProp->prop_name, 'class' => $class, 'data-id' => $itemProp->prop_id));
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
                <th>标签</th>
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
