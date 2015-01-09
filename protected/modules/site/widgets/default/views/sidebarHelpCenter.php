<div class="TreeList">
    <?php foreach($this->getHelp() as $h){?>
    <div class="cat1"><?php echo $h->name ?></div> 
    <?php 
    $cri = new CDbCriteria(array(
                    'condition' => 'category_id = '.$h->id,
                ));
    $helpChilds = Page::model()->findAll($cri);
    foreach($helpChilds as $hc){
    ?>
    <div class="cat2"><?php echo CHtml::link($hc->title, array('/page/index', 'key'=>$hc->key)) ?></div> 
    <?php }?>
    <?php }?>
</div>