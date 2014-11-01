<?php
$this->breadcrumbs = array(
    'Videos' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Video', 'icon' => 'list', 'url' => array('index')),
    array('label' => 'Create Video', 'icon' => 'plus', 'url' => array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'video-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'video_id',
        'title',
        'url',
        'author',
        'create_time',
        'update_time',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
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