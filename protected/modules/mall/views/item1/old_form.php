<div class="form">

<?php
$form = $this->beginWidget('CActiveForm', array(
'id' => 'item-form',
'htmlOptions' => array('enctype' => 'multipart/form-data'),
'enableAjaxValidation' => false,
));
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
<?php echo $form->labelEx($model, 'title'); ?>
<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->error($model, 'title'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'category_id'); ?>
<select name="Item[category_id]" id="Item_category_id"> 
<?php echo $this->parent; ?>
</select> 
<?php echo $form->error($model, 'category_id'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'sn'); ?>
<?php echo $form->textField($model, 'sn', array('size' => 20, 'maxlength' => 60)); ?>
<?php echo $form->error($model, 'sn'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'unit'); ?>
<?php echo $form->textField($model, 'unit', array('size' => 20, 'maxlength' => 20)); ?>
<span class="hint">例如：块、片、个、瓶、条</span>
<?php echo $form->error($model, 'unit'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'stock'); ?>
<?php echo $form->textField($model, 'stock'); ?>
<span class="hint">库存默认为1000</span>
<?php echo $form->error($model, 'stock'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'min_number'); ?>
<?php echo $form->textField($model, 'min_number', array('size' => 20, 'maxlength' => 100)); ?>
    <span class="hint">最少订货量默认为1</span>
<?php echo $form->error($model, 'min_number'); ?>
</div>

<div class="grid_2 alpha"> 
<div class="row">
<?php echo $form->labelEx($model, 'market_price'); ?>
<?php echo $form->textField($model, 'market_price', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->error($model, 'market_price'); ?>
</div>
</div>
<div class="grid_2"> 
<div class="row">
<?php echo $form->labelEx($model, 'shop_price'); ?>
<?php echo $form->textField($model, 'shop_price', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->error($model, 'shop_price'); ?>
</div>
</div>
<div class="clear"></div>
<div class="grid_2 alpha">        
<div class="row">
<?php echo $form->labelEx($model, 'currency'); ?>
<?php echo $form->dropDownList($model, 'currency', array('￥' => '人民币', '$' => '美元')); ?>
<?php echo $form->error($model, 'currency'); ?>
</div>
</div>
<div class="grid_2">          
<div class="row">
<?php echo $form->labelEx($model, 'language'); ?>
<?php echo $form->dropDownList($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English')); ?>
<?php echo $form->error($model, 'language'); ?>
</div>
</div>
<div class="clear"></div>
<div class="row">
<?php echo $form->labelEx($model, 'pic_url'); ?>
<?php echo $form->fileField($model, 'pic_url', array('size' => 20, 'maxlength' => 200)); ?>
<?php echo $form->error($model, 'pic_url'); ?>
</div>

<?php if(!$model->isNewRecord){?>
  <fieldset style="width:auto">
<legend>商品属性</legend>
<?php
echo '<h3>关键属性</h3>';

$cri = new CDbCriteria(array(
     'condition'=>'is_key_prop=1 and category_id ='.$model->category->parent->category_id,
));
$props = ItemProp::model()->findAll($cri);

foreach($props as $p){
    echo '<div "id"="pid_'.$p->prop_id.'_div">'.$p->prop_name.'：';
    echo $p->getPropOptionValues();
    echo '</div>';
}

echo '<h3>销售属性</h3>';

$cri = new CDbCriteria(array(
     'condition'=>'is_sale_prop=1 and category_id ='.$model->category->parent->category_id,
));
$props = ItemProp::model()->findAll($cri);

foreach($props as $p){
    echo '<div "id"="pid_'.$p->prop_id.'_div">'.$p->prop_name.'：';
    echo $p->getPropCheckBoxListValues();
    echo '</div>';
}

echo '<h3>非关键属性</h3>';

$cri = new CDbCriteria(array(
     'condition'=>'is_key_prop=0 and is_sale_prop=0 and category_id ='.$model->category->parent->category_id,
));
$props = ItemProp::model()->findAll($cri);

foreach($props as $p){
    echo '<div "id"="pid_'.$p->prop_id.'_div">'.$p->prop_name.'：';
    echo $p->getPropOptionValues();
    echo '</div>';
}

?>

  </fieldset>
<?php }?>
<div class="row">
<?php echo $form->labelEx($model, 'desc'); ?>
<?php
echo $form->textArea($model, 'desc', array('rows' => 10, 'cols' => 80));
$this->widget('root.common.extensions.kindeditor', array(
'id' => 'Item_desc',
));
?>
<?php echo $form->error($model, 'item_desc'); ?>
</div>

<!--<div class="row">
<?php echo $form->labelEx($model, 'skus'); ?>
<?php echo $form->textArea($model, 'skus', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'skus'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'props'); ?>
<?php echo $form->textArea($model, 'props', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'props'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'props_name'); ?>
<?php echo $form->textArea($model, 'props_name', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'props_name'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'item_imgs'); ?>
<?php echo $form->textArea($model, 'item_imgs', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'item_imgs'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'prop_imgs'); ?>
<?php echo $form->textArea($model, 'prop_imgs', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'prop_imgs'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'location'); ?>
<?php echo $form->textField($model, 'location', array('size' => 45, 'maxlength' => 45)); ?>
<?php echo $form->error($model, 'location'); ?>
</div>-->

<div class="grid_2 alpha">
<div class="row">
<?php echo $form->labelEx($model, 'post_fee'); ?>
<?php echo $form->textField($model, 'post_fee', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->error($model, 'post_fee'); ?>
</div>
</div>
<div class="grid_2">
<div class="row">
<?php echo $form->labelEx($model, 'express_fee'); ?>
<?php echo $form->textField($model, 'express_fee', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->error($model, 'express_fee'); ?>
</div>
</div>
<div class="grid_2">
<div class="row">
<?php echo $form->labelEx($model, 'ems_fee'); ?>
<?php echo $form->textField($model, 'ems_fee', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->error($model, 'ems_fee'); ?>
</div>
</div>
<div class="clear"></div>
<div class="grid_2 alpha">
<div class="row">
<?php echo $form->labelEx($model, 'is_show'); ?>
<?php echo $form->radioButtonList($model, 'is_show', array('1' => '是', '0' => '否'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
<?php echo $form->error($model, 'is_show'); ?>
</div>
</div>
<div class="grid_2">
<div class="row">
<?php echo $form->labelEx($model, 'is_promote'); ?>
<?php echo $form->radioButtonList($model, 'is_promote', array('1' => '是', '0' => '否'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
<?php echo $form->error($model, 'is_promote'); ?>
</div>
</div>        
<div class="grid_2">
<div class="row">
<?php echo $form->labelEx($model, 'is_new'); ?>
<?php echo $form->radioButtonList($model, 'is_new', array('1' => '是', '0' => '否'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
<?php echo $form->error($model, 'is_new'); ?>
</div>
</div>
<div class="grid_2">    
<div class="row">
<?php echo $form->labelEx($model, 'is_hot'); ?>
<?php echo $form->radioButtonList($model, 'is_hot', array('1' => '是', '0' => '否'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
<?php echo $form->error($model, 'is_hot'); ?>
</div>
</div>
<div class="grid_2">    
<div class="row">
<?php echo $form->labelEx($model, 'is_best'); ?>
<?php echo $form->radioButtonList($model, 'is_best', array('1' => '是', '0' => '否'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
<?php echo $form->error($model, 'is_best'); ?>
</div>
</div>
<div class="grid_2">    
<div class="row">
<?php echo $form->labelEx($model, 'is_discount'); ?>
<?php echo $form->radioButtonList($model, 'is_discount', array('1' => '是', '0' => '否'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
<?php echo $form->error($model, 'is_discount'); ?>
</div>
</div>

<div class="clear"></div>

<div class="row">
<?php echo $form->labelEx($model, 'sort_order'); ?>
<?php echo $form->textField($model, 'sort_order'); ?>
<?php echo $form->error($model, 'sort_order'); ?>
</div>

<div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
    $(function(){ 
        var tid = "<?php echo $model->category_id; ?>";

        $("#Item_category_id option").each(function(i){

            if(this.value == tid)
            {
                $(this).attr("selected","selected");
            } 
        }); 
    });
</script>