<?php
$this->breadcrumbs = array(
    UserModule::t('Profile Fields') => array('admin'),
    $model->title => array('view', 'id' => $model->id),
    UserModule::t('Update'),
);
$this->menu = array(
    array('label' => UserModule::t('Create Profile Field'), 'icon' => 'plus', 'url' => array('create')),
    array('label' => UserModule::t('View Profile Field'), 'icon' => 'eye-open', 'url' => array('view', 'id' => $model->id)),
    array('label' => UserModule::t('Manage Profile Field'), 'icon' => 'cog', 'url' => array('admin')),
    array('label' => UserModule::t('Manage Users'), 'icon' => 'cog', 'url' => array('/user/admin')),
);
?>

<h1><?php echo UserModule::t('Update Profile Field ') . $model->id; ?></h1>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>