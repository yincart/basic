<?php
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/skus.js', CClientScript::POS_END);

$cs->registerScript('skusJsD','
	$("#Item_category_id").change(function() {
	    $("#item_prop_values").show();
	    var Tid = $("#Item_category_id").select().val();
//           var Tid = $("#Item_category_id  option:selected").val();
//5(178918267)友情提示
	    $.ajax
		    ({
			type: "POST",
			data: {"category_id":Tid, "YII_CSRF_TOKEN":$("[name=YII_CSRF_TOKEN]").val()},
			url: "' . Yii::app()->createUrl('/admin/item/getPropValues').'",
			dataType: "html",
			success: function(results)
			{
			    $("#item_prop_values").empty();
			    $(results).appendTo("#item_prop_values");
			}
		    });

	});
//返源<pizigou@vip.qq.com>友情提示
	if ($("#Item_category_id").find("option:selected").val() > 0) {
//		alert($("#Item_category_id").find("option:selected").val());
	    $("#item_prop_values").show();
	    var Tid = $("#Item_category_id").find("option:selected").val();
//           var Tid = $("#Item_category_id  option:selected").val();
//5(178918267)友情提示
	    $.ajax
		    ({
			type: "POST",
			data: "category_id=" + Tid + "&item_id='.$model->item_id.'",
			url: "'.Yii::app()->createUrl('/admin/item/getPropValues').'",
			dataType: "html",
			success: function(results)
			{
			    $("#item_prop_values").empty();
			    $(results).appendTo("#item_prop_values");
				renderTable();
			}
		    });
	}
	
	

');

?>
<style>
    table{width:100%}
    td{height:25px;}
	#hint-contentbox{
	display: none;
	}
</style>

<div class="row" style='margin-bottom:10px'>
    <?php echo $form->labelEx($model, 'category_id', array('class' => 'span2 control-label')); ?>
    <div class="span5">
	<?php echo $form->dropDownList($model, 'category_id', $model->attrCategory(3)); ?>
    </div>
    <?php echo $form->error($model, 'category_id'); ?>
</div>

<div class="row" style='margin-bottom:10px'>
    <div id="item_prop_values" style="display:none">

    </div>
    <input type="hidden" id="currentRow"  value="0"/>
    <input type="hidden" id="skus_info" data-id="<?php echo ($model->item_id)? $model->item_id : 0; ?>" data-url="<?php echo Yii::app()->createUrl('/admin/item/ajaxGetSkus'); ?>" value=""/>
</div>  


<div id="hint-contentbox">  
 <div class="batch-body row">
 </div>	
  <div class="batch-foot"><a class="btn btn-success" id="btnPopSub" href="javascript:void(0)">确定</a>  <a class="btn btn-info cancel" id="btnPopCancel" href="javascript:void(0)">取消</a></div>
</div>


