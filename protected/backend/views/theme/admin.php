<?php
$this->breadcrumbs=array(
	'Themes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Theme', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Theme', 'icon'=>'plus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('theme-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 style="text-align: center">Manage Themes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'theme-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'theme',
		'name',
		'author',
		'site',
		'update_url',
		'desc',
        array(
            'name' => 'config',
            'htmlOptions' => array('class' => 'url', 'style' => 'display: none'),
            'headerHtmlOptions' => array('style' => 'display: none'),
        ),
		array(
            'template'=>'{config}{view}{update}{delete}',
            'buttons'=>array(
                'config'=>array(
                    'icon'=>'cog',
                    'label'=>'设置',
                    'click'=>'js:function(){ window.location.href = "'.Yii::app()->createUrl('theme/set').'?id="+$(this).parent().parent().find("td:first-child").text(); }',
                    'option'=>array(

                    ),
                ),
            ),
			'class'=>'bootstrap.widgets.TbButtonColumn',

		),
	),
)); ?>
<script type="text/javascript">


</script>
<script type="text/javascript">
$(document).ready(function() {
    var $overlay, $overlayBlock, $img;
    $('.items.table tbody').on('click', 'td', function() {
        var divHtml = '<div class="overlay overlayBlock" style="position:fixed;width:100%;height:100%;background-color:#000;opacity:0;filter:alpha(opacity=0);z-index:2000;left:0;top:0"></div>' +
            '"<img class="overlayBlock" id="overlayImg" style="border:3px solid #fff;display:block;width:1024px;height:768px;position:fixed;left:50%;top:50%;margin-left:-512px;margin-top:-384px;z-index:2030;" />',
            srcUrl;
        if(this.className.indexOf('button-column') !== -1){
            return;
        }
        srcUrl = $(this).parent().find('.url').html();
        if($overlay && $overlay.length && srcUrl !== ""){ // if overlay exists, use it
            $img.attr('src', srcUrl);
            $overlayBlock.show();
        }else{ // if overlay doesnt exist, create it
            $overlay = $(divHtml).appendTo('body').on('click', function(){
                if(this.tagName.toUpperCase() !== 'IMG'){
                    $overlayBlock.hide();
                }
            });
            $overlayBlock = $('.overlayBlock');
            $img = $overlayBlock.filter('img').attr('src', srcUrl);

        }
    });
});
</script>