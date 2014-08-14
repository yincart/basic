<?php
/**
 * Created by PhpStorm.
 * author: shuai.du@jago-ag.cn
 * Date: 3/12/14
 * Time: 11:42 AM
 */
?>
        <?php
         $form=$this->beginWidget('CActiveForm', array(
            'id'=>'deliver-form',
            'enableAjaxValidation'=>false,
        ));
                $this->widget('bootstrap.widgets.TbDetailView', array(
                    'data'=> $Order,
                    'id' => 'deliverForm',
                    'attributes'=>array(
                        'order_id',
                        array(
                            'name' => 'user_id',
                            'value' => Tbfunction::getUser($Order->user_id),

                        ),
                        array(
                            'name' => 'pay_status',
                            'value' => Tbfunction::showPayStatus($Order->pay_status),
                        ),
                        array(
                            'name'=>'pay_time',
                            'value'=>date('Y-m-d H:i:s',$Order->create_time),
                        ),
                        array(
                            'name' => 'refund_status',
                            'value' => Tbfunction::showRefundStatus($Order->refund_status),
                        ),
                        array(
                            'name' => 'payment_method_id',
                            'value' => Tbfunction::showPayMethod($Order->payment_method_id),
                        ),
                        'pay_fee',
                        'ship_fee',
                        array(
                            'name' => 'shipping_method_id',
                            'value' => Tbfunction::showShipMethod($Order->shipping_method_id),
                        ),
                        array(
                            'name' => 'status',
                            'value' => Tbfunction::showStatus($Order->status),
                        ),
                        'memo',
                        'receiver_name',
                        array(
                            'name'=>'收货地址',
                            'value' =>Tbfunction::showReceiveAddress($Order) ,
                        ),
                        'receiver_zip',
                        'receiver_mobile',
                        'receiver_phone',
                        array(
                            'name'=>'create_time',
                            'value'=>date('Y-m-d H:i:s',$Order->create_time),
                        ),
                        array(
                            'name'=>'ship_status',
                            'value' => Tbfunction::showShipStatus($Order->ship_status),
                        ),
                        'order_ship_id',
                        array(
                            'name'=>'ship_time',
                            'value'=>date('Y-m-d H:i:s',$Order->ship_time),
                        ),
                    ),
                ));
            ?>
            <div>
                <?php echo $form->labelEx($Order,'order_ship_id'); ?>
                <?php echo $form->textField($Order,'order_ship_id'); ?>
                <?php echo $form->error($Order,'order_ship_id'); ?>
                <?php echo CHtml::hiddenField('backurl',Yii::app()->request->urlReferrer)?>
            </div>
            <?php
            echo TbHtml::formActions(array(
            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY )),
        ));?>
        <?php
         $this->endWidget();
    ?>

<script>
    $('#deliverForm').removeClass().addClass('table table-bordered table-responsive');
</script>