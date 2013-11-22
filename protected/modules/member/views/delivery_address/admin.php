<?php
$this->breadcrumbs = array(
    '收货地址' => array('admin'),
    '管理',
);
?>

<div class="box">
    <div class="box-title">收货地址</div>
    <div class="box-content">
        <?php echo CHtml::link('添加收货地址', array('create'))?>
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'address-result-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'contact_name',
//                'country',
                's.name',
                'c.name',
                'd.name',
                'zipcode',
                'address',
                'mobile_phone',
                array(
                    'name' => 'is_default',
                    'value' => '$data->getDefault()',
                ),
                /*
                  'memo',
                  'create_time',
                  'update_time',
                 */
                array(
                    'class' => 'CButtonColumn',
                ),
            ),
        ));
        ?>

    </div>
</div>