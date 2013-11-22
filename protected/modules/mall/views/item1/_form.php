<?php
$action = item;
Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '"', CClientScript::POS_HEAD);
//    Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&id=' . $id . '"', CClientScript::POS_HEAD);
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'item-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'type' => 'horizontal',
        ));
?>

<div class="control-group"><p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p></div>

<?php

$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs',
    'placement' => 'above', // 'above', 'right', 'below' or 'left'
    'tabs' => array(
        array('label' => '基本信息', 'content' => $this->renderPartial("_form_base", array('model' => $model, 'form'=>$form), true), 'active' => true),
        array('label' => '详细描述', 'content' => $this->renderPartial("_form_desc", array("model" => $model, 'form'=>$form, 'action'=>$action), true)),
        array('label' => '其他信息', 'content' => $this->renderPartial("_form_other", array("model" => $model, 'form'=>$form), true)),
        array('label' => '商品类型', 'content' => $this->renderPartial("_form_type", array("model" => $model, 'form'=>$form), true)),
        array('label' => '商品图片', 'content' => $this->renderPartial("_form_image", array('form'=>$form, 'img'=>$img), true)),
    ),
));
?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => $model->isNewRecord ? '创建' : '修改')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => '重置')); ?>
</div>
<?php $this->endWidget(); ?>