<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/cart/core.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/cart/box.css');
$this->breadcrumbs = array(
    '购物车',
);
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#updateCart").click(function (event) {
            $('#cartForm').submit();
        });
    });
</script>
<div class="box">
    <div class="box-title">购物车</div>
    <div class="box-content cart">
        <?php echo CHtml::beginForm(array('/cart/update'), 'POST', array('id' => 'cartForm')) ?>
        <table width="100%" border="1" cellspacing="1" cellpadding="0" style="text-align:center;vertical-align:middle">
            <?php $this->renderPartial('_content'); ?>
            <tr>
                <td colspan="7" style="vertical-align:middle"><span
                        style="float:left;padding:5px 10px;"><?php echo CHtml::link('清空购物车', array('/cart/clear'), array('class' => 'btn')) ?></span>
                    <span
                        style="float:right;padding:5px 10px;"><?php echo CHtml::link('继续购物', array('/'), array('class' => 'btn')) ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span
                        style="float:right;padding:5px 10px;"><?php echo CHtml::link('更新购物车', array('/cart/index'), array('id' => 'updateCart', 'class' => 'btn')) ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="7"><span
                        style="float:right;padding:5px 10px;"><?php echo CHtml::link('结算', array('/order/checkout'), array('class' => 'btn1')) ?></span>
                </td>
            </tr>
        </table>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>
<script type="text/javascript">
    $('[name="qty[]"]').change(function () {
        var item_id = $(this).parents('tr').find('[name="item_id[]"]').val();
        var props = $(this).parents('tr').find('[name="props[]"]').val();
        var qty = $(this).val();
        var data = {'item_id': item_id, 'props': props, 'qty': qty};
        $.post($(this).data('url'), data, function (response) {
            window.location.reload();
        }, 'json');
    });
</script>