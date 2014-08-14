<?php
$this->breadcrumbs=array(
    Yii::t('main','Admin Users')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Admin Users'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update Admin Users'),'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('main','Delete Admin Users'),'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main','List Admin Users'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1 align="center"><?php echo Yii::t('main','View Admin Users');?> #<?php echo $model->id; ?></h1>
<!--注释掉的部分
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'profile',
	),
)); ?>    -->
 <div class="container" id="demo-table" >
   <table class="table table-striped table-bordered">
       <tr>
           <th class="col-xs-2">ID</th>
           <td class="col-xs-4">1</td>
       </tr>
       <tr>
           <th class="col-xs-2">Username：</th>
           <td class="col-xs-4">demo</td>
       </tr>
       <tr>
           <th class="col-xs-2">Password：</th>
           <td class="col-xs-4">xxxx</td>
       </tr>
       <tr>
           <th class="col-xs-2">Email：</th>
           <td class="col-xs-4">xx@qq.com</td>
       </tr>
       <tr>
           <th class="col-xs-2">profile：</th>
           <td class="col-xs-4">xxxxx</td>
       </tr>



   </table>
</div>