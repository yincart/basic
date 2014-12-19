<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14-1-13
 * Time: 下午2:12
 * To change this template use File | Settings | File Templates.
 */

?>

<div class="input-group space">
    <?php echo $form->labelEx($model, 'memo', array('class' => 'input-group-addon')); ?>
    <?php echo $form->textArea($model, 'memo', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
</div>