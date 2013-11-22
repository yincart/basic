<?php echo $form->textFieldRow($model, 'title', array('lable' => '商品标题')); ?>
<div class="control-group ">
    <label for="Page_category_id" class="control-label required">商品分类 <span class="required">*</span></label>
    <div class="controls">
        <?php
        echo '<select id="Item_category_id" name="Item[category_id]">';
        $category = Category::model()->findByPk(3);
        $descendants = $category->descendants()->findAll();
        $level = 1;

        echo '<option value="0" >请选择分类</option>';
        foreach ($descendants as $child) {
            $string = '&nbsp;&nbsp;';
            $string .= str_repeat('&nbsp;&nbsp;', 2 * ($child->level - $level));
            if ($child->isLeaf() && !$child->next()->find()) {
                $string .= '';
            } else {

                $string .= '';
            }
            $string .= '' . $child->name;
//		echo $string;
            if (!$model->isNewRecord) {
                if ($model->category_id == $child->id) {
                    $selected = 'selected';

                    echo '<option value="' . $child->id . '" selected="' . $selected . '">' . $string . '</option>';
                } else {
                    echo '<option value="' . $child->id . '" >' . $string . '</option>';
                }
            } else {
                echo '<option value="' . $child->id . '" >' . $string . '</option>';
            }
        }

        echo '</select>';
        ?>
    </div>
</div>
<?php echo $form->textFieldRow($model, 'sn', array('lable' => '商品货号')); ?>
<?php echo $form->textFieldRow($model, 'unit', array('lable' => '单位', 'hint' => '例如：块、片、个、瓶、条')); ?>
<?php echo $form->textFieldRow($model, 'stock', array('lable' => '库存', 'hint' => '库存默认为1000')); ?>
<?php echo $form->textFieldRow($model, 'min_number', array('lable' => '最少订货量', 'hint' => '最少订货量默认为1')); ?>
<?php echo $form->textFieldRow($model, 'market_price', array('lable' => '零售价')); ?>
<?php echo $form->textFieldRow($model, 'shop_price', array('lable' => '批发价')); ?>
<?php echo $form->dropDownListRow($model, 'currency', array('$' => '美元', '￥' => '人民币'), array('lable' => '货币')); ?>
<?php echo $form->dropDownListRow($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English'), array('lable' => '语言')); ?>