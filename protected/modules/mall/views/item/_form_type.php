<?php
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/skus.js', CClientScript::POS_END);
$data = Category::model()->getSelectOptions(3);
echo $form->dropDownListControlGroup($model, 'category_id', $data);
?>
<div id="item_prop_values"></div>
<input type="hidden" id="currentRow" value="0"/>
<input type="hidden" id="skus_info" data-id="<?php echo ($model->item_id) ? $model->item_id : 0; ?>"
       data-url="<?php echo Yii::app()->createUrl('/mall/item/ajaxGetSkus'); ?>" value=""/>

<div id="hint-contentbox" style="display: none">
    <div class="batch-body row">
    </div>
    <div class="batch-foot">
        <a class="btn btn-success" id="btnPopSub" href="javascript:void(0)">确定</a>
        <a class="btn btn-info cancel" id="btnPopCancel" href="javascript:void(0)">取消</a>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var getItemProps = function () {
            $.get('<?php echo Yii::app()->createUrl('/mall/item/itemProps'); ?>',
                {
                    "category_id": $("#Item_category_id").select().val(),
                    "YII_CSRF_TOKEN": $("[name=YII_CSRF_TOKEN]").val(),
                    "item_id": "<?php echo $model->item_id; ?>"
                }, function (response) {
                    $('#item_prop_values').empty();
                    $('#item_prop_values').append(response);
                    setChbGroupCount();
                    renderTable();
                });
        };
        getItemProps();
        $('#Item_category_id').change(function () {
            getItemProps();
        });
        function setChbGroupCount(){
            var $chb = $('input.change'),
                nameArr = [];
            $chb.each(function(){
                var i;
                for(i in nameArr){
                    if(this.name === nameArr[i]){
                        return;
                    }
                }
                nameArr.push(this.name);
            });
            window.chbGroupCount = nameArr.length;
        }
    });
</script>


