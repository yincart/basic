<ul>
    <?php
    if (isset(Yii::app()->request->cookies['history'])) {
        $ids = Yii::app()->request->cookies['history']->value;
        $item_ids = explode(',', $ids);
        foreach ($item_ids as $item_id) {

            $item = Item::model()->findByPk($item_id);
            ?>
            <li><div class="i-img"><?php echo $item->getMainPic() ?></div><div class="i-name"><?php echo $item->getTitle()  ?></div></li>
                    <?php
                }
            } else {
                echo '<div style="padding:20px">没有商品浏览记录!</div>';
            }
            ?>    

</ul>
