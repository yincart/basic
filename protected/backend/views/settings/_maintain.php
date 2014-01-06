<?php foreach ($values as $key => $val): ?>
    <div class="control-group">
        <?php echo CHtml::label($model->getAttributesLabels($key), $key); ?>
        <?php
            echo CHtml::checkBox(get_class($model) . '[' . $category . '][' . $key . ']', $val);
            echo ("<br/>The system maintenance site is in &nbsp$nbsp'/update/index.php'<br/> If you need to update your website ,please check! ");
        ?>
        <?php echo CHtml::error($model, $category); ?>
    </div>
<?php endforeach; ?>