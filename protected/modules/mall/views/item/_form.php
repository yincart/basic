<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'item-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal'),
));
?>


<?php
echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, '<p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p>');
if ($model->hasErrors()) {
    echo $form->errorSummary($model);
}
$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => array(
        array('label' => '基本信息', 'content' => $this->renderPartial("_form_base", array('model' => $model, 'form' => $form,'is_view' => $is_view), true),'active' => true),
        array('label' => '详细描述', 'content' => $this->renderPartial("_form_desc", array("model" => $model, 'form' => $form,'is_view' => $is_view), true)),
        array('label' => '其他信息', 'content' => $this->renderPartial("_form_other", array("model" => $model, 'form' => $form,'is_view' => $is_view), true)),
        array('label' => '商品类型', 'content' => $this->renderPartial("_form_type", array("model" => $model, 'form' => $form,'is_view' => $is_view), true)),
        array('label' => '商品图片', 'content' => $this->renderPartial("_form_image", array('model' => $model, 'form' => $form,'is_view' => $is_view), true)),
    ),
));
if (!$is_view) {
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    ));
}
$this->endWidget();
?>
