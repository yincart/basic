<?php echo CHtml::form(); ?>
    <div id="langdrop">
        <?php
//        echo CHtml::dropDownList('_lang', $currentLang, array(
//            'en_us' => 'English', 'zh_cn' => 'Chinese'), array('submit' => ''));
        ?>
    </div>
<?php
//unset($_SESSION);
//echo Yii::app()->language;
?>
<li class="container3d relative">
    <a role="button" href="#" class="color_dark" id="lang_button"><img class="d_inline_middle m_right_10" src="<?php echo F::themeUrl() ?>/images/flag_<?php echo Yii::app()->language ?>.jpg" alt=""><?php echo Yii::app()->language ?></a>
    <ul class="dropdown_list type_2 top_arrow color_light">
        <li>
            <?php echo CHtml::link(CHtml::image(F::themeUrl().'/images/flag_zh_cn.jpg', '', array('class'=>'d_inline_middle')).'Chinese', array('/site/default/index', 'lang'=>'zh_cn'), array('class'=>'tr_delay_hover color_light')) ?>
        </li>
        <li>
            <?php echo CHtml::link(CHtml::image(F::themeUrl().'/images/flag_en.jpg', '', array('class'=>'d_inline_middle')).'English', array('/site/default/index', 'lang'=>'en'), array('class'=>'tr_delay_hover color_light')) ?>
        </li>
        <li>
            <?php echo CHtml::link(CHtml::image(F::themeUrl().'/images/flag_de.jpg', '', array('class'=>'d_inline_middle')).'German', array('/site/default/index', 'lang'=>'de'), array('class'=>'tr_delay_hover color_light')) ?>
        </li>
    </ul>
</li>
<?php echo CHtml::endForm(); ?>