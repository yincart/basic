<?php
$this->breadcrumbs=array(
    'Themes'=>array('index'),
    $model->name=>array('set','id'=>$model->theme),
    'Set',
);

$this->menu=array(
    array('label'=>'List Theme','icon'=>'list','url'=>array('index')),
    array('label'=>'Create Theme','icon'=>'plus','url'=>array('create')),
    array('label'=>'View Theme','icon'=>'eye-open','url'=>array('view','id'=>$model->theme)),
    array('label'=>'Manage Theme','icon'=>'cog','url'=>array('admin')),
    array('label'=>'Set Theme','icon'=>'cog','url'=>array('set','id'=>$model->theme)),
);
?>

<h1>Set Theme: <?php echo $model->theme; ?></h1>
<?php
$theme=Theme::model()->find('theme=?',array($model->theme));

if($theme)
{
    $_theme=Sys_theme::model()->find('name=?',array($theme->primaryKey));
    if($_theme)
    {
        ?>

        <?php $form=$this->beginWidget('CActiveForm',array(
        'enableAjaxValidation'=>false,
    ));?>
        <li>

            <iframe  height="700px" width="80%" src="http://localhost/basic"></iframe>
        </li>
        <br/>
        <div class="form-actions">
            <?php echo CHtml::submitButton('Set This Theme For User',array(
                'name'=>'Sbt',
                'type'=>'primary',
            ));?>
        </div>
        <?php $this->endWidget(); ?>
    <?php
    }else
    {
        ?>
        <br />
        <br />
        <p> <span style="color: #ff0000">This theme is unable to use at present!</span></p>
    <?php
    }
}
?>
<style>

    .form-actions{
        width: 700px;
    }
</style>
