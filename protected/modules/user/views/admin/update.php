<?php
$this->breadcrumbs = array(
    (UserModule::t('Users')) => array('admin'),
    $model->username => array('view', 'id' => $model->id),
    (UserModule::t('Update')),
);
$this->menu = array(
    array('label' => UserModule::t('Create User'), 'icon' => 'plus', 'url' => array('create')),
    array('label' => UserModule::t('View User'), 'icon' => 'eye-open', 'url' => array('view', 'id' => $model->id)),
    array('label' => UserModule::t('Manage Users'), 'icon' => 'cog', 'url' => array('admin')),
    array('label' => UserModule::t('Manage Profile Field'), 'icon' => 'cog', 'url' => array('profileField/admin')),
    array('label' => UserModule::t('List User'), 'icon' => 'list', 'url' => array('/user')),
);
?>

<h1><?php echo UserModule::t('Update User') . " " . $model->id; ?></h1>

<?php
echo $this->renderPartial('_form', array('model' => $model, 'profile' => $profile));
?>