<?php
$this->breadcrumbs = array(
    UserModule::t('Profile Fields') => array('admin'),
    UserModule::t($model->title),
);
$this->menu = array(
    array('label' => UserModule::t('Create Profile Field'), 'icon' => 'plus', 'url' => array('create')),
    array('label' => UserModule::t('Update Profile Field'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' => UserModule::t('Delete Profile Field'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => UserModule::t('Are you sure to delete this item?'))),
    array('label' => UserModule::t('Manage Profile Field'), 'icon' => 'cog', 'url' => array('admin')),
    array('label' => UserModule::t('Manage Users'), 'icon' => 'cog', 'url' => array('/user/admin')),
);
?>
<h1><?php echo UserModule::t('View Profile Field #') . $model->varname; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
	'id',
	'varname',
	'title',
	'field_type',
	'field_size',
	'field_size_min',
	'required',
	'match',
	'range',
	'error_message',
	'other_validator',
	'widget',
	'widgetparams',
	'default',
	'position',
	'visible',
    ),
));
?>
