<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'menu-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php
if (!$model->isNewRecord) {
    $menu_check = Menu::model()->findByPk($model->id);
    $parent = $menu_check->parent()->find();
}
echo '<select id="Menu_node" name="Menu[node]">';
$menu = Menu::model()->roots()->findAll();
$level = 1;
echo '<option value="0">请选择分类</option>';
foreach ($menu as $n => $m) {
    if (!$model->isNewRecord) {
        if ($parent->id == $m->id) {
            $selected = 'selected';
            echo '<option value="' . $m->id . '" selected="' . $selected . '">' . $m->name . '</option>';
        } else {
            echo '<option value="' . $m->id . '">' . $m->name . '</option>';
        }
    } else {
        echo '<option value="' . $m->id . '">' . $m->name . '</option>';
    }

    $children = $m->descendants()->findAll();
    foreach ($children as $child) {
        $string = '&nbsp;&nbsp;';
        $string .= str_repeat('&nbsp;&nbsp;', 2*($child->level - $level));
//        if ($child->isLeaf() && !$child->next()->find()) {
//            $string .= '';
//        } else {
//
//            $string .= '';
//        }
        $string .= $child->name;
//		echo $string;
        if (!$model->isNewRecord) {
            if ($parent->id == $child->id) {
                $selected = 'selected';

                echo '<option value="' . $child->id . '" selected="' . $selected . '">' . $string . '</option>';
            } else {
                echo '<option value="' . $child->id . '" >' . $string . '</option>';
            }
        } else {
            echo '<option value="' . $child->id . '" >' . $string . '</option>';
        }
    }
}
echo '</select>';
?>

<?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldControlGroup($model, 'url', array('class' => 'span5', 'maxlength' => 255,'hint'=>'格式为：模块/控制器/动作  Modules/Controller/action 没地址请留空')); ?>

<?php //echo $form->fileFieldRow($model,'pic',array('class'=>'span5','maxlength'=>255)); ?>

<?php //echo $form->dropDownListRow($model, 'position', array('middle' => '前台主目录导航', 'bottom' => '前台底部导航', 'admin' => '后台菜单导航')); ?>

<?php echo $form->dropDownListControlGroup($model, 'if_show', array('1' => '是', '0' => '否')); ?>

    <?php echo $form->textAreaControlGroup($model, 'memo', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>


    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    ));?>

<?php $this->endWidget(); ?>
