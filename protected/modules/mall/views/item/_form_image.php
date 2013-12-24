<div class="container">
    <?php
    foreach ($model->itemImgs as $itemImg) {
        echo CHtml::hiddenField('ItemImg[item_img_id]', $itemImg->item_img_id);
        $this->widget('ext.yii-elFinder.ServerFileInput', array(
                'name' => 'Item[ItemImg][pic][]',
                'connectorRoute' => 'mall/elfinder/connector',
            )
        );
    }
    echo CHtml::hiddenField('ItemImg[item_img_id]', '0');
    $this->widget('ext.yii-elFinder.ServerFileInput', array(
            'name' => 'Item[ItemImg][pic][]',
            'connectorRoute' => 'mall/elfinder/connector',
        )
    );
    ?>
</div>