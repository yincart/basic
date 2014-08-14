<div class="catalog_title">
    <?php echo $model->name ?>		
</div>
<div class="filter_menu box">
    <div class="filter_list"> 
        <!-- 分类 -->
        <dl class="clearfix">
            <dt> <span class="filter_list_tit">分类</span> </dt>
            <dd><?php echo CHtml::link('全部', array('/item/index', 'category_id' => $model->id), array('class' => 'a')) ?></dd>
            <?php
            $category=Category::model()->findByPk($model->id);
        $childs=$category->children()->findAll();
            foreach ($childs as $c) {
                ?>
                <dd><?php echo CHtml::link($c->name, array('/item/index', 'category_id' => $c->id)) ?></dd>
            <?php } ?>
        </dl>

        <?php
        $cri = new CDbCriteria(array(
                    'condition' => 'category_id =' . $model->id,
                    'order'=>'sort_order asc'
                ));
//        $props = ItemProp::model()->findAll($cri);

        foreach ($props as $p) {
            ?>
        <!-- <?php echo $p->prop_name ?> -->
            <dl class="clearfix">
                <dt> <span class="filter_list_tit"><?php echo $p->prop_name ?></span> </dt>
                <dd><a href="" class="a">全部</a></dd>
<?php
$cri = new CDbCriteria(array(
    'condition'=>'prop_id ='.$p->prop_id,
));
$values = PropValue::model()->findAll($cri);
foreach ($values as $v) {
?>
                <dd><?php echo CHtml::link($v->value_name, array('/item/index', 'category_id' => $v->category_id), array('title'=>$v->value_name))?></dd>
<?php
        }
        ?>
            </dl>                        
       <?php
        }
        ?>
        <div class="reset">
            <?php echo CHtml::link('重置所有筛选条件', Yii::app()->createUrl('/catalog/'.$model->url)) ?>
        </div>
    </div>
</div>