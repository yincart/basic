<h1><?php echo TranslateModule::t('Missing Translations')." - ".TranslateModule::translator()->acceptedLanguages[Yii::app()->getLanguage()]?></h1>
<?php 
$source=MessageSource::model()->findAll();
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'message-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'message',
            'filter'=>CHtml::listData($source,'message','message'),
        ),
        array(
            'name'=>'category',
            'filter'=>CHtml::listData($source,'category','category'),
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{create}{delete}',
            'deleteButtonUrl'=>'Yii::app()->getController()->createUrl("missingdelete",array("id"=>$data->id))',
            'buttons'=>array(
                'create'=>array(
                    'label'=>TranslateModule::t('Create'),
                    'url'=>'Yii::app()->getController()->createUrl("create",array("id"=>$data->id,"language"=>Yii::app()->getLanguage()))'
                )
            ),
            'header'=>TranslateModule::translator()->dropdown(),
        )
	),
)); ?>