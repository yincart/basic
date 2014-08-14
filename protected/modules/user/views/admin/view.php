<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('admin'),
    $model->username,
);


$this->menu = array(
    array('label' => UserModule::t('Create User'), 'icon' => 'plus', 'url' => array('create')),
    array('label' => UserModule::t('Update User'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' => UserModule::t('Delete User'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => UserModule::t('Are you sure to delete this item?'))),
    array('label' => UserModule::t('Manage Users'), 'icon' => 'cog', 'url' => array('admin')),
    array('label' => UserModule::t('Manage Profile Field'), 'icon' => 'cog', 'url' => array('profileField/admin')),
    array('label' => UserModule::t('List User'), 'icon' => 'list', 'url' => array('/user')),
);
?>
<h3 align="center"><?php echo UserModule::t('View User') . ' "' . $model->username . '"'; ?></h3>

<!--<?php
  $attributes = array(
      'id',
      'username',
  );

  $profileFields = ProfileField::model()->forOwner()->sort()->findAll();
  if ($profileFields) {
      foreach ($profileFields as $field) {
  	array_push($attributes, array(
  	    'label' => UserModule::t($field->title),
  	    'name' => $field->varname,
  	    'type' => 'raw',
  	    'value' => (($field->widgetView($model->profile)) ? $field->widgetView($model->profile) : (($field->range) ? Profile::range($field->range, $model->profile->getAttribute($field->varname)) : $model->profile->getAttribute($field->varname))),
  	));
      }
  }

  array_push($attributes, 'password', 'email', 'activkey', 'create_at', 'lastvisit_at', array(
      'name' => 'superuser',
      'value' => User::itemAlias("AdminStatus", $model->superuser),
  	), array(
      'name' => 'status',
      'value' => User::itemAlias("UserStatus", $model->status),
  	)
  );

  ?>
 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>$attributes,
)); ?>
