<script type="text/javascript">
    $(document).ready(function() {
        $("#Item_type_id").change(function() {
            $("#item_prop_values").show();
            var Tid = $("#Item_type_id").select().val();
//           var Tid = $("#Item_type_id  option:selected").val();
//5(178918267)友情提示
            $.ajax
                    ({
                        type: "POST",
                        data: "type_id=" + Tid,
                        url: "<?php echo Yii::app()->createUrl('/mall/item/getPropValues') ?>",
                        dataType: 'html',
                        success: function(results)
                        {
                            $("#item_prop_values").empty();
                            $(results).appendTo("#item_prop_values");
                        }
                    });
        });
//返源<pizigou@vip.qq.com>友情提示
        if ($("#Item_type_id").find("option:selected").val() > 0) {
//		alert($("#Item_type_id").find("option:selected").val());
            $("#item_prop_values").show();
            var Tid = $("#Item_type_id").find("option:selected").val();
//           var Tid = $("#Item_type_id  option:selected").val();
//5(178918267)友情提示
            $.ajax
                    ({
                        type: "POST",
                        data: "type_id=" + Tid + "&item_id=<?php echo $model->item_id ?>",
                        url: "<?php echo Yii::app()->createUrl('/mall/item/getPropValues') ?>",
                        dataType: 'html',
                        success: function(results)
                        {
                            $("#item_prop_values").empty();
                            $(results).appendTo("#item_prop_values");
                        }
                    });
        }
    });
</script>

<?php
$cri = new CDbCriteria(array(
    'condition' => 'enabled = 1'
        ));
$ItemType = ItemType::model()->findAll($cri);
$list = CHtml::listData($ItemType, 'type_id', 'name');
echo $form->DropDownListRow($model, 'type_id', $list, array('empty' => '请选择商品类型', 'hint' => '请选择商品的所属类型，进而完善此商品的属性'));
//$props_list = Item::model()->findByPk($model->item_id);
//$props_arr = explode(';', $props_list->props);
//foreach ($props_arr as $k => $v) {
//    $newarr[] = explode(':', $v);
//}
//foreach ($newarr as $k => $v) {
//        $v_arr = explode(',', $v[1]);
//        $arr[$v[0]] = $v_arr;
//}
//print_r($arr);
?>


<div id="item_prop_values" style="display:none">

</div>