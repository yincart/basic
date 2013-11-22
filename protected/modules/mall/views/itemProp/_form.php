<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<?php
//echo CGoogleApi::init();
//echo CHtml::script(CGoogleApi::load('jquery', '1.4.2'));
//echo CHtml::script(CGoogleApi::load("jqueryui", "1.8.2"));
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.dynotable.js');
?>
<script type="text/javascript">
    $(document).ready(function() {
        /*
         * dynoTable configuration options
         * These are the options that are available with their default values
         */
        $('#t1').dynoTable({
            removeClass: '.row-remover', //class for the clickable row remover
            cloneClass: '.row-cloner', //class for the clickable row cloner
            addRowTemplateId: '#add-template', //id for the "add row template"
            addRowButtonId: '#add-row', //id for the clickable add row button, link, etc
            lastRowRemovable: true, //If true, ALL rows in the table can be removed, otherwise there will always be at least one row
            orderable: true, //If true, table rows can be rearranged
            dragHandleClass: ".drag-handle", //class for the click and draggable drag handle
            insertFadeSpeed: "slow", //Fade in speed when row is added
            removeFadeSpeed: "fast", //Fade in speed when row is removed
            hideTableOnEmpty: true, //If true, table is completely hidden when empty
            onRowRemove: function() {
                //Do something when a row is removed
            },
            onRowClone: function() {
                //Do something when a row is cloned
            },
            onRowAdd: function() {
                //Do something when a row is added
            },
            onTableEmpty: function() {
                //Do something when ALL rows have been removed
            },
            onRowReorder: function() {
                //Do something when table rows have been rearranged
            }
        });
    });
</script>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'item-prop-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>



    <div class="control-group">
        <?php echo $form->labelEx($model, 'category_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'category_id', $model->attrCategory(3)); ?>
            <?php echo $form->error($model, 'category_id'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'parent_prop_id'); ?>
        <select name="ItemProp[parent_prop_id]" id="ItemProp_parent_prop_id"> 
            <?php echo $this->parent; ?>
        </select> 
        <?php echo $form->error($model, 'parent_prop_id'); ?>
    </div>

    <!--	<div class="row">
    <?php echo $form->labelEx($model, 'parent_value_id'); ?>
    <?php echo $form->textField($model, 'parent_value_id', array('size' => 10, 'maxlength' => 10)); ?>
    <?php echo $form->error($model, 'parent_value_id'); ?>
    </div>-->

    <?php echo $form->textFieldRow($model, 'prop_name'); ?>

    <?php echo $form->textFieldRow($model, 'prop_alias', array('size' => 60, 'maxlength' => 100)); ?>

    <?php echo $form->radioButtonListRow($model, 'type', array('input' => '输入', 'optional' => '枚举', 'multiCheck' => '多选')); ?>

    <?php echo $form->dropDownListRow($model, 'is_key_prop', array('1' => '是', '0' => '否')); ?>

    <?php echo $form->dropDownListRow($model, 'is_sale_prop', array('1' => '是', '0' => '否')); ?>

    <?php echo $form->dropDownListRow($model, 'is_color_prop', array('1' => '是', '0' => '否')); ?>

    <?php echo $form->dropDownListRow($model, 'is_enum_prop', array('1' => '是', '0' => '否')); ?>

    <?php echo $form->dropDownListRow($model, 'is_item_prop', array('1' => '是', '0' => '否')); ?>

    <?php echo $form->dropDownListRow($model, 'must', array('1' => '是', '0' => '否')); ?>

    <?php echo $form->dropDownListRow($model, 'multi', array('1' => '是', '0' => '否')); ?>

    <div class="clear"></div>
    <!--	<div class="row">
    <?php echo $form->labelEx($model, 'prop_values'); ?>
    <?php echo $form->textArea($model, 'prop_values', array('rows' => 6, 'cols' => 50)); ?>
    <?php echo $form->error($model, 'prop_values'); ?>
    </div>-->

    <?php echo $form->dropDownListRow($model, 'status', array('normal' => '正常', 'deleted' => '删除')); ?>


    <?php echo $form->textFieldRow($model, 'sort_order'); ?>

    <h2><a id="add-row" href="#">添加属性值</a></h2>  
    <fieldset>
        <legend>属性值</legend>
        <div class="PropValues">
            <table id="t1" class="example">
                <tr>
                    <th>移动</th>
                    <th>属性值名称</th>
                    <th>排序</th>
                    <th>克隆</th>
                    <th>删除</th>
                </tr>
                <?php if ($model->isNewRecord) { ?>
                    <tr id="add-template">
                        <td class="icons">
                            <img class="drag-handle" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/drag.png" alt="click and drag to rearrange" />
                        </td>
                        <td>
                            <input id="tf1" type="text" name="PropValue[value_name][]" />
                        </td>
                        <td>
                            <input id="tf3" type="text" name="PropValue[sort_order][]" />
                        </td>
                        <td class="icons">
                            <img class="row-cloner" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/clone.png" alt="Clone Row" />
                        </td>
                        <td class="icons">
                            <img class="row-remover" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/remove.png" alt="Remove Row" />
                        </td>
                    </tr>
                    <?php
                } else {
                    $cri = new CDbCriteria(array(
                        'condition' => 'prop_id =' . $model->prop_id,
                        'order' => 'sort_order asc, value_id asc'
                    ));
                    $propValues = PropValue::model()->findAll($cri);

                    foreach ($propValues as $k => $sv) {
                        ?>
                        <tr id="update-template">
                            <td class="icons">
                                <img class="drag-handle" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/drag.png" alt="click and drag to rearrange" />
                            </td>
                            <td>
                                <input id="tf1__c" type="text" name="PropValue[value_name][]" value="<?php echo $sv->value_name ?>" />
                            </td>
                            <td>
                                <input id="tf3__c" type="text" name="PropValue[sort_order][]" value="<?php echo $sv->sort_order ?>" />
                            </td>
                            <td class="icons">
                                <img class="row-cloner" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/clone.png" alt="Clone Row" />
                            </td>
                            <td class="icons">
                                <img class="row-remover" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/remove.png" alt="Remove Row" />
                            </td>
                        </tr>
                    <?php } ?>

                    <tr id="add-template">
                        <td class="icons">
                            <img class="drag-handle" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/drag.png" alt="click and drag to rearrange" />
                        </td>
                        <td>
                            <input id="tf1" type="text" name="PropValue[value_name][]" />
                        </td>

                        <td>
                            <input id="tf3" type="text" name="PropValue[sort_order][]" />
                        </td>
                        <td class="icons">
                            <img class="row-cloner" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/clone.png" alt="Clone Row" />
                        </td>
                        <td class="icons">
                            <img class="row-remover" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/remove.png" alt="Remove Row" />
                        </td>
                    </tr>

                <?php } ?>
            </table>

        </div>
    </fieldset>

    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'Create' : 'Save',
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->