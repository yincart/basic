<?php
/* @var $this SkuController */
/* @var $model Sku */

$this->breadcrumbs=array(
	'Skus'=>array('index'),
	$model->sku_id,
);

$this->menu=array(
//	array('label'=>'List Sku', 'url'=>array('index')),
//	array('label'=>'Create Sku', 'url'=>array('create')),
	array('label'=>'更新Sku', 'url'=>array('update', 'id'=>$model->sku_id)),
//	array('label'=>'Delete Sku', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sku_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理Sku', 'url'=>array('admin')),
    array('label'=>'添加价格单', 'url'=>array('skuPrice/create', 'sku_id'=>$model->sku_id)),
);
?>

<h1>查看 Sku #<?php echo $model->sku_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sku_id',
		'item_id',
		'props',
		'props_name',
		'quantity',
		'price',
		'outer_id',
		'status',
	),
)); ?>

    <div class='row-fluid'>
    <div class='span12 box bordered-box purple-border' style='margin-bottom:0;'>
    <div class='box-header purple-background'>
        <div class='title'>相关店铺</div>
        <div class='actions'>
            <a class="btn box-remove btn-mini btn-link" href="#"><i class='icon-remove'></i>
            </a>

            <a class="btn box-collapse btn-mini btn-link" href="#"><i></i>
            </a>
        </div>
    </div>
    <div class='box-content box-no-padding'>
    <table class='table table-striped' data='' style='margin-bottom:0;'>
    <thead>
    <tr>
        <th>
            店名
        </th>
        <th>
            价格
        </th>
        <th>
            正品保障
        </th>
        <th></th>
    </tr>
    </thead>
    <tbody>
<?php
$sku_price = $model->skuPrice;
foreach($sku_price as $price){
?>
                <tr>
                    <td><?php echo $price->store->name ?></td>
                    <td><?php echo $price->price ?></td>
                    <td>
                        <span class='label label-important'>是</span>
                    </td>
                    <td>
                        <div class='text-right'>
                            <a class='btn btn-success btn-mini' href='#'>
                                <i class='icon-ok'></i>
                            </a>
                            <a class='btn btn-danger btn-mini' href='#'>
                                <i class='icon-remove'></i>
                            </a>
                        </div>
                    </td>
                </tr>
<?php } ?>

    </tbody>
    </table>
    </div>
    </div>
    </div>