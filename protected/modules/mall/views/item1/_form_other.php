<?php echo $form->textFieldRow($model, 'post_fee', array('lable' => '平邮费用')); ?>
<?php echo $form->textFieldRow($model, 'express_fee', array('lable' => '快递费用')); ?>
<?php echo $form->textFieldRow($model, 'ems_fee', array('lable' => 'EMS 费用')); ?>

<?php echo $form->radioButtonListInlineRow($model, 'is_show', array('1' => '是', '0' => '否'), array('lable' => '上架')); ?>
<?php echo $form->radioButtonListInlineRow($model, 'is_promote', array('1' => '是', '0' => '否'), array('lable' => '促销')); ?>
<?php echo $form->radioButtonListInlineRow($model, 'is_new', array('1' => '是', '0' => '否'), array('lable' => '新品')); ?>
<?php echo $form->radioButtonListInlineRow($model, 'is_hot', array('1' => '是', '0' => '否'), array('lable' => '热卖')); ?>
<?php echo $form->radioButtonListInlineRow($model, 'is_best', array('1' => '是', '0' => '否'), array('lable' => '精品')); ?>
<?php echo $form->radioButtonListInlineRow($model, 'is_discount', array('1' => '是', '0' => '否'), array('lable' => '会员打折')); ?>
<?php echo $form->textFieldRow($model, 'sort_order', array('lable' => '排序')); ?>
