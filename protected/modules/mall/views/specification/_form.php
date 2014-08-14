<?php
echo CGoogleApi::init();
//echo CHtml::script(CGoogleApi::load('jquery', '1.4.2'));
echo CHtml::script(CGoogleApi::load("jqueryui", "1.8.2"));
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.dynotable.js');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#t1').dynoTable();
        
        /*
         * dynoTable configuration options
         * These are the options that are available with their default values
         */
        $('#t1').dynoTable({
            removeClass: '.row-remover',        //class for the clickable row remover
            cloneClass: '.row-cloner',          //class for the clickable row cloner
            addRowTemplateId: '#add-template',  //id for the "add row template"
            addRowButtonId: '#add-row',         //id for the clickable add row button, link, etc
            lastRowRemovable: true,             //If true, ALL rows in the table can be removed, otherwise there will always be at least one row
            orderable: true,                    //If true, table rows can be rearranged
            dragHandleClass: ".drag-handle",    //class for the click and draggable drag handle
            insertFadeSpeed: "slow",            //Fade in speed when row is added
            removeFadeSpeed: "fast",            //Fade in speed when row is removed
            hideTableOnEmpty: true,             //If true, table is completely hidden when empty
            onRowRemove: function(){
                //Do something when a row is removed
            },
            onRowClone: function(){
                //Do something when a row is cloned
            },
            onRowAdd: function(){
                //Do something when a row is added
            },
            onTableEmpty: function(){
                //Do something when ALL rows have been removed
            },
            onRowReorder: function(){
                //Do something when table rows have been rearranged
            }
        });
    });
</script>
<style type="text/css">
    table {
        background: #D0E5F5;
        border: 1px solid #c0c0c0; 
        width:660px;
    }

    table th{
        padding:10px;
        text-align:center;
    }

    table td {
        vertical-align: middle;
        text-align:center; 
    }

    table td input {
        width:150px;
        margin: 0;
        background: #fff;
        height: 18px;
    }  

    table td select {
        background: #fff;
        height: 18px;
        width: 90px;
    }

    table .icons{
        width:50px;
    }

    #msg {
        width: 420px;
        float:left;
    }

    button {
        width: 100px;
        height: 25px; 
        float:left;                
    }

    .clr {
        clear: both;
    }

    .row-cloner, .row-remover {
        cursor: pointer;
    } 

    pre, code {
        margin: 0 !important;
        padding: 0 !important;
    }
</style>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'specification-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'spec_name'); ?>
        <?php echo $form->textField($model, 'spec_name', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'spec_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spec_memo'); ?>
        <?php echo $form->textField($model, 'spec_memo', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'spec_memo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'spec_type'); ?>
        <?php echo $form->radioButtonList($model, 'spec_type', array('text' => '文字', 'image' => '图片'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
        <?php echo $form->error($model, 'spec_type'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'spec_show_type'); ?>
        <?php echo $form->radioButtonList($model, 'spec_show_type', array('flat' => '平铺显示', 'select' => '下拉显示'), array('separator' => '&nbsp;', 'labelOptions' => array('class' => 'labelForRadio'))); ?>
        <?php echo $form->error($model, 'spec_show_type'); ?>
    </div>

    <!--	<div class="row">
    <?php echo $form->labelEx($model, 'sort_order'); ?>
    <?php echo $form->textField($model, 'sort_order'); ?>
    <?php echo $form->error($model, 'sort_order'); ?>
            </div>
            
            <div class="row">
    <?php echo $form->labelEx($model, 'disabled'); ?>
    <?php echo $form->textField($model, 'disabled', array('size' => 5, 'maxlength' => 5)); ?>
    <?php echo $form->error($model, 'disabled'); ?>
            </div>-->
    <h2><a id="add-row" href="#">添加规格值</a></h2>  
    <fieldset>
        <legend>规格值</legend>
        <div class="SpecValues">
            <table id="t1" class="example">
                <tr>
                    <th>移动</th>
                    <th>规格值名称</th>
                    <th>图片地址</th>
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
                            <input id="tf1" type="text" name="SpecValue[spec_value][]" />
                        </td>
                        <td>
                            <input id="tf2" type="text" name="SpecValue[spec_image][]" />
                        </td>
                        <td>
                            <input id="tf3" type="text" name="SpecValue[sort_order][]" />
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
                                'condition' => 'spec_id =' . $model->spec_id,
                                'order' => 'sort_order asc, spec_value_id asc'
                            ));
                    $specValues = SpecValue::model()->findAll($cri);

                    foreach ($specValues as $k => $sv) {
                        ?>
                        <tr id="update-template">
                            <td class="icons">
                                <img class="drag-handle" src="<?php echo Yii::app()->theme->baseUrl ?>/images/small_icons/drag.png" alt="click and drag to rearrange" />
                            </td>
                            <td>
                                <input id="tf1__c" type="text" name="SpecValue[spec_value][]" value="<?php echo $sv->spec_value ?>" />
                            </td>
                            <td>
                                <input id="tf2__c" type="text" name="SpecValue[spec_image][]" value="<?php echo $sv->spec_image ?>" />
                            </td>
                            <td>
                                <input id="tf3__c" type="text" name="SpecValue[sort_order][]" value="<?php echo $sv->sort_order ?>" />
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
                            <input id="tf1" type="text" name="SpecValue[spec_value][]" />
                        </td>
                        <td>
                            <input id="tf2" type="text" name="SpecValue[spec_image][]" />
                        </td>
                        <td>
                            <input id="tf3" type="text" name="SpecValue[sort_order][]" />
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

    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->