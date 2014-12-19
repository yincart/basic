<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14-1-13
 * Time: 下午1:47
 * To change this template use File | Settings | File Templates.
 */
?>
<div id="orderform" class='orderform'>
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'order-form',
        'enableAjaxValidation' => false,
//        'method'=>'GET'
    ));
    ?>
    <link type="text/css" rel="stylesheet"
          href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css"/>
<?php
$this->widget('bootstrap.widgets.TbTabs', array(
'tabs' => array(
array('label' => '基本信息', 'content' => $this->renderPartial("_form_base", array("model" => $model, 'form' => $form), true), 'active' => true),
array('label' => '联系方式', 'content' => $this->renderPartial("_form_contact", array("model" => $model, 'form' => $form), true)),
array('label' => '商品信息', 'content' => $this->renderPartial("_form_item", array("model" => $model, 'Item' => $Item,'ItemSku'=>$ItemSku), true)),
array('label' => '其他信息', 'content' => $this->renderPartial("_form_other", array("model" => $model, 'form' => $form), true)),
//array('label' => '商品信息', 'content' => $this->renderPartial("_form_item", array("model" => $model, 'form' => $form), true)),
),
));

    echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
    ));?>
    <?php $this->endWidget(); ?>
