    <?php foreach($this->getHelp() as $k=>$h){
        ?>
<div class="help<?php echo $k+1 ?>">
                    <div>
                        <h3><?php echo $h->name ?></h3>
                        <ul>
                            <?php 
    $cri = new CDbCriteria(array(
                    'condition' => 'category_id = '.$h->id,
                ));
    $helpChilds = Page::model()->findAll($cri);
    foreach($helpChilds as $hc){
    ?>
                            <li><?php echo CHtml::link($hc->title, array('/page/index', 'key'=>$hc->key)) ?></li>
                            <?php }?>
                        </ul>					
                    </div>
                </div>
    <?php }?>