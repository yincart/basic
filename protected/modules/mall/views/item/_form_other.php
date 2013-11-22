<?php echo $form->textFieldControlGroup($model, 'post_fee'); ?>

<?php echo $form->textFieldControlGroup($model, 'express_fee'); ?>

<?php echo $form->textFieldControlGroup($model, 'ems_fee'); ?>

<?php echo $form->radioButtonListControlGroup($model, 'is_show', array('1' => '是', '0' => '否')); ?>

<?php echo $form->radioButtonListControlGroup($model, 'is_promote', array('1' => '是', '0' => '否')); ?>

<?php echo $form->radioButtonListControlGroup($model, 'is_new', array('1' => '是', '0' => '否')); ?>

<?php echo $form->radioButtonListControlGroup($model, 'is_hot', array('1' => '是', '0' => '否')); ?>

<?php echo $form->radioButtonListControlGroup($model, 'is_best', array('1' => '是', '0' => '否')); ?>

<?php echo $form->radioButtonListControlGroup($model, 'is_discount', array('1' => '是', '0' => '否')); ?>

<?php echo $form->textFieldControlGroup($model, 'sort_order'); ?>