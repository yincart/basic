<?php
$action = 'item';
$base_url = 'http://' . F::sg('site', 'imageDomain');
$id = $_SESSION['store']['store_id'];
$type = 'store';
Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&base_url=' . $base_url . '&id=' . $id . '&type=' . $type . '"', CClientScript::POS_HEAD);
//    Yii::app()->getClientScript()->registerScript('editorparam', 'window.KEDITOR_PARAM = "action=' . $action . '&id=' . $id . '"', CClientScript::POS_HEAD);
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'item-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal'),
//    'type' => 'horizontal',
));
?>


<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, '<p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p>'); ?>
<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => array(
        array('label' => '基本信息', 'content' => $this->renderPartial("_form_base", array('model' => $model, 'form' => $form), true), 'active' => true),
        array('label' => '详细描述', 'content' => $this->renderPartial("_form_desc", array("model" => $model, 'form' => $form, 'action' => $action, 'base_url' => $base_url, 'id' => $id, 'type' => $type), true)),
        array('label' => '其他信息', 'content' => $this->renderPartial("_form_other", array("model" => $model, 'form' => $form), true)),
        array('label' => '商品类型', 'content' => $this->renderPartial("_form_type", array("model" => $model, 'form' => $form), true)),
        array('label' => '商品分类', 'content' => $this->renderPartial("_form_categories", array("model" => $model, 'form' => $form), true)),
        array('label' => '商品图片', 'content' => $this->renderPartial("_form_image", array('image' => $image, 'form' => $form, 'upload' => $upload, 'id' => $id, 'item' => $model), true)),
    ),
)); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>

<?php $this->endWidget(); ?>
