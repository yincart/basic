<?php
$this->breadcrumbs=array(
    Yii::t('main','Admin Users'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Admin Users'),'url'=>array('create')),
	array('label'=>Yii::t('main','Manage Admin Users'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Admin Users');?></h1>
<?php
    if($model) {
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => $model,
            'attributes' => $attributes,
        ));
    }
?>
<div style="display: <?php
                        if($model) echo "none";
                           else echo "display";?>">
<table class="tab" >
  <tr class="tr-border">
     <td class="td-border">ID</td>
     <td>1</td>
  </tr>
  <tr class="tr-border">
     <td class="td-border">Username:</td>
     <td>demo</td>
  </tr>
  <tr class="tr-border">
     <td class="td-border">Password:</td>
     <td>$2a$10$.ln8efv0ruje1k5DwmNNzetuHhPcJNn2N7Wgn.ktuMuw3NC4Yomv2</td>
  </tr>
  <tr class="tr-border">
    <td class="td-border">Email:</td>
    <td> webmaster@example.com</td>
  </tr>
  <tr class="tr-border">
     <td class="td-border">Profile:</td>
     <td></td>
  </tr>
</table>
<table  class="tab">
  <tr class="tr-border">
     <td class="td-border">ID</td>
     <td>2</td>
  </tr>
  <tr class="tr-border">
     <td class="td-border">Username:</td>
     <td>admin</td>
  </tr>
  <tr class="tr-border">
     <td class="td-border">Password:</td>
     <td> $2a$10$5nUz94KR4Tt5DcE.7IkAuObfGB//HcP/x61vQBBwaJslEj8sE.LFK</td>
  </tr>
  <tr class="tr-border">
    <td class="td-border">Email:</td>
    <td> webmaster@example.com</td>
  </tr>
  <tr class="tr-border">
     <td class="td-border">Profile:</td>
     <td></td>
  </tr>
</table>
</div>
