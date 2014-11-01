<?php
/* @var $this NewsletterSubscriberController */
/* @var $model NewsletterSubscriber */


$this->breadcrumbs = array(
    Yii::t('main', 'NewsletterSubscriber') => array('index'),
    Yii::t('main', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('main', 'List NewsletterSubscriber'), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('main', 'Create NewsletterSubscriber'), 'icon' => 'plus', 'url' => array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'newsletter-subscriber-grid',
    'dataProvider' => $model->search(),
//	'filter'=>$model,
    'columns' => array(
        'subscriber_id',
//		'customer_id',
        'email',
        array(
            'name' => 'status',
            'value' => '$data->getStatus()'
        ),
        'confirm_code',
        'change_status_at',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>