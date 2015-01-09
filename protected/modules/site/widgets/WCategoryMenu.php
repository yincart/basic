<?php
/**
 *
 * @author: Lujie.Zhou(gao_lujie@live.cn, qq:821293064)
 * DateTime: 13-12-12 下午4:41
 */

class WCategoryMenu extends CWidget
{
    /**
     * @var array the HTML attributes for the category menu.
     */
    public $htmlOptions = array();

    public function run()
    {
        $root = Category::model()->findByPk(3);
        $category_menus = $root->children()->findAll();
        $category_data = array();
        foreach ($category_menus as $v) {
            $category_data[] = array('title' => $v, 'list' => $v->children()->findAll());
        }
        //get class and style from htmlOptions
        $class = isset($this->htmlOptions['class']) ? $this->htmlOptions['class'] : '';
        $style = '';
        unset($this->htmlOptions['class']);
        foreach ($this->htmlOptions as $k => $v) {
            $style .= $k . ': ' . $v . ';';
        }
        $this->render('categoryMenu', array(
            'category_data' => $category_data,
            'class' => $class,
            'style' => $style,
        ));
    }

}