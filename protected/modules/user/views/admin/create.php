<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('admin'),
    UserModule::t('Create'),
);

$this->menu = array(
    array('label' => UserModule::t('Manage Users'), 'icon' => 'cog', 'url' => array('admin')),
    array('label' => UserModule::t('Manage Profile Field'), 'icon' => 'cog', 'url' => array('profileField/admin')),
    array('label' => UserModule::t('List User'), 'icon' => 'list', 'url' => array('/user')),
);
?>
<h1><?php echo UserModule::t("Create User"); ?></h1>

<?php
echo $this->renderPartial('_form', array('model' => $model, 'profile' => $profile));
?>