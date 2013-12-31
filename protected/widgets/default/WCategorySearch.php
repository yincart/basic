<?php
/**
 * search item by category
 * User: Lujie.Zhou(gao_lujie@live.cn, qq:821293064)
 * DateTime: 13-12-14 上午10:19
 */

class WCategorySearch extends CWidget
{
    public $category;

    public function run()
    {
        $categories = $this->category->children()->findAll();
        $all_cat = $this->category->descendants()->findAll();
        $all_cat_ids = array();
        foreach ($all_cat as $cat) {
            $all_cat_ids[] = $cat->id;
        }
        $cri = new CDbCriteria();
        $cri->addInCondition('t.category_id', $all_cat_ids);
        $cri->addCondition("t.type != 'input'");
        $item_props = ItemProp::model()->with('propValues')->findAll($cri);
        $this->render('categorySearch', array(
            'categories' => $categories,
            'item_props' => $item_props,
        ));
    }
}