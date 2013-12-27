<?php
echo $form->textFieldControlGroup($model, 'title');
echo $form->textFieldControlGroup($model, 'stock', array('help' => '库存默认为1000'));
echo $form->textFieldControlGroup($model, 'min_number', array('help' => '最少订货量默认为1'));
echo $form->textFieldControlGroup($model, 'price');
echo $form->dropDownListControlGroup($model, 'currency', array('$' => '美元', '￥' => '人民币'));
echo $form->textFieldControlGroup($model, 'outer_id');
echo $form->dropDownListControlGroup($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English'));
echo $form->dropDownListControlGroup($model, 'country', $model->getCountryAreas(), array('class' => 'area-country'));
echo $form->dropDownListControlGroup($model, 'state', array(), array('class' => 'area-state'));
echo $form->dropDownListControlGroup($model, 'city', array(), array('class' => 'area-city'));
?>
<script type="text/javascript">
    $(document).ready(function() {
        var getChildAreas = function(parentAreaId) {
            $.get('<?php Yii::app()->createUrl('mall/item') ?>')
        };
        $('area-country').change(function() {

        });
    });
</script>