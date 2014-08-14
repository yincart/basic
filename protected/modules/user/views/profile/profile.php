<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
$this->breadcrumbs = array(
    UserModule::t("Profile"),
);
$this->menu = array(
    ((UserModule::isAdmin()) ? array('label' => UserModule::t('Manage Users'), 'icon' => 'cog', 'url' => array('/user/admin')) : array()),
    array('label' => UserModule::t('List User'), 'icon' => 'list', 'url' => array('/user')),
    array('label' => UserModule::t('Edit'), 'icon' => 'pencil', 'url' => array('edit')),
    array('label' => UserModule::t('Change password'), 'icon' => 'pencil', 'url' => array('changepassword')),
    array('label' => UserModule::t('Logout'), 'icon' => 'off', 'url' => array('/user/logout')),
);
?>
<h3 style="margin-left:220px"><?php echo UserModule::t('Your profile'); ?></h3>

<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
    <div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
    </div>
<?php endif; ?>
<table class="table table-bordered personal-info" >
    <tr>
        <th class="col-xs-4"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
        <td class="col-xs-8"><?php echo CHtml::encode($model->username); ?></td>
    </tr>

    <?php
    $profileFields = ProfileField::model()->forOwner()->sort()->findAll();
    if ($profileFields) {
        foreach ($profileFields as $field) {
            //echo "<pre>"; print_r($profile); die();
            ?>

        <th class="col-xs-4"><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
        <td class="col-xs-8"><?php echo (($field->widgetView($profile)) ? $field->widgetView($profile) : CHtml::encode((($field->range) ? Profile::range($field->range, $profile->getAttribute($field->varname)) : $profile->getAttribute($field->varname)))); ?></dd>
        </td></tr>
        <?php
        }//$profile->getAttribute($field->varname)
    }
    ?>


    <tr>
        <th class="col-xs-4"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
        <td class="col-xs-8"><?php echo CHtml::encode($model->email); ?></td>
    </tr>
    <tr>
        <th class="col-xs-4"><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
        <td class="col-xs-8"><?php echo $model->create_at; ?></td>
    </tr>
    <tr>
        <th class="col-xs-4"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
        <td class="col-xs-8"><?php echo $model->lastvisit_at; ?></td>
    </tr>
    <tr>
        <th class="col-xs-4"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></th>
        <td class="col-xs-8"><?php echo CHtml::encode(User::itemAlias("UserStatus", $model->status)); ?></td>
    </tr>
    <tr>

        <td class="col-xs-12" colspan="2" style="text-align: center;border:1px solid white;"><?php echo CHtml::link('编辑个人信息', array('/user/profile/edit')) ?></td>
    </tr>

</table>