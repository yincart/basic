<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
$this->breadcrumbs = array(
    UserModule::t("Profile"),
);
$this->menu = array(
    ((UserModule::isAdmin()) ? array('label' => UserModule::t('Manage Users'), 'url' => array('/user/admin')) : array()),
    array('label' => UserModule::t('List User'), 'url' => array('/user')),
    array('label' => UserModule::t('Edit'), 'url' => array('edit')),
    array('label' => UserModule::t('Change password'), 'url' => array('changepassword')),
    array('label' => UserModule::t('Logout'), 'url' => array('/user/logout')),
);
?>
<h3><?php echo UserModule::t('Your profile'); ?></h3>

<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
    </div>
<?php endif; ?>
<dl class="dl-horizontal">

    <dt><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></dt>
    <dd><?php echo CHtml::encode($model->username); ?></dd>
</dl>

<dl class="dl-horizontal">
    <?php
    $profileFields = ProfileField::model()->forOwner()->sort()->findAll();
    if ($profileFields) {
        foreach ($profileFields as $field) {
            //echo "<pre>"; print_r($profile); die();
            ?>

            <dt><?php echo CHtml::encode(UserModule::t($field->title)); ?></dt>
            <dd><?php echo (($field->widgetView($profile)) ? $field->widgetView($profile) : CHtml::encode((($field->range) ? Profile::range($field->range, $profile->getAttribute($field->varname)) : $profile->getAttribute($field->varname)))); ?></dd>

            <?php
        }//$profile->getAttribute($field->varname)
    }
    ?>
</dl>
<dl class="dl-horizontal">
    <dt><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></dt>
    <dd><?php echo CHtml::encode($model->email); ?></dd>


    <dt><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></dt>
    <dd><?php echo $model->create_at; ?></dd>


    <dt><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></dt>
    <dd><?php echo $model->lastvisit_at; ?></dd>


    <dt><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></dt>
    <dd><?php echo CHtml::encode(User::itemAlias("UserStatus", $model->status)); ?></dd>

</dl>
