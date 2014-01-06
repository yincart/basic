<?php
$this->breadcrumbs = array(
    '收货地址' => array('admin'),
    '管理',
);
?>

<div class="box">
    <div class="box-title">delivery address</div>
    <div class="box-content">
        <?php echo $this->renderPartial('_form', array('model'=>$model));?>
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'address-result-grid',
            'dataProvider' => $model->search(),
   //         'filter' => $model,
            'columns' => array(
               'contact_name',
//                'country',
                's.name',
                'c.name',
                'd.name',
                'address',
                'zipcode',
                'mobile_phone',
                array(
                    'name' => 'is_default',
                    'value' => '$data->getDefault()',
                ),
                array(
                    'class' => 'CButtonColumn',
                ),
            ),
        ));
        ?>

    </div>
</div>