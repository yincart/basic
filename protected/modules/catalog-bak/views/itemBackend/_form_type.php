<?php
$data = Category::model()->getSelectOptions(3);
echo $form->dropDownListControlGroup($model, 'category_id', $data, array('data-url' => Yii::app()->createUrl('/mall/item/itemProps'), 'data-item_id' => $model->item_id ? $model->item_id : 0));
?>
<div id="item_prop_values"></div>
<input type="hidden" id="currentRow" value="0"/>
<input type="hidden" id="skus_info" data-id="<?php echo ($model->item_id) ? $model->item_id : 0; ?>"
       data-url="<?php echo Yii::app()->createUrl('/mall/item/ajaxGetSkus'); ?>" value=""/>

<div id="hint-contentbox" style="display: none">
    <div class="batch-body">
    </div>
    <div class="batch-foot">
        <a class="btn btn-success" id="btnPopSub" href="javascript:void(0)">确定</a>
        <a class="btn btn-info cancel" id="btnPopCancel" href="javascript:void(0)">取消</a>
    </div>
</div>


