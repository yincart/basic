<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Video','icon'=>'list','url'=>array('index')),
array('label'=>'Create Video','icon'=>'plus','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('video-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Videos</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'video-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'video_id',
		'title',
		'url',
		'author',
		'create_time',
		'update_time',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
<?php
//$video = Video::model()->findAll();
//
//foreach($video as $video){
//    $post = new Post;
//    $post->category_id = 161;
//    $post->title = $video->title;
//    $post->url = $video->url;
//    $post->content = $video->content;
//    $post->status = 2;
//    $post->views = $video->views;
//    $post->create_time = $video->create_time;
//    $post->update_time = $video->create_time;
//    $post->author = $video->author;
//    $post->author_id = 2;
//    if($post->save()){
//        echo 'success';
//    }else{
//        print_r($post->errors);
//    }
//}