<?php
echo $form->textFieldControlGroup($model, 'title');
echo $form->textFieldControlGroup($model, 'stock', array('help' => '库存默认为1000'));
echo $form->textFieldControlGroup($model, 'min_number', array('help' => '最少订货量默认为1'));
echo $form->textFieldControlGroup($model, 'price');
echo $form->dropDownListControlGroup($model, 'currency', array('$' => '美元', '￥' => '人民币'));
echo $form->textFieldControlGroup($model, 'outer_id');
echo $form->dropDownListControlGroup($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English'));
$url = Yii::app()->createUrl('mall/item/getChildAreas');
list($countryAreas, $stateAreas, $citeAreas) = $model->getAreas();
echo $form->dropDownListControlGroup($model, 'country', $countryAreas,
    array('class' => 'area area-country', 'data-child-area' => 'area-state', 'data-url' => $url));
echo $form->dropDownListControlGroup($model, 'state', $stateAreas, array('class' => 'area area-state', 'data-child-area' => 'area-city', 'data-url' => $url));
echo $form->dropDownListControlGroup($model, 'city', $citeAreas, array('class' => 'area-city'));
?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.area').change(function () {
            var area = $(this);
            $.get($(this).data('url'), {'parent_id': $(this).val()}, function (options) {
                var html = '';
                for (var value in options) {
                    html += '<option value="' + value + '">' + options[value] + '</option>';
                }
                var childArea = $('.' + area.data('child-area'));
                childArea.html(html);
                while(childArea.data('child-area')) {
                    childArea = $('.' + childArea.data('child-area'));
                    childArea.html('');
                }
            }, 'json');
        });
    });
</script>