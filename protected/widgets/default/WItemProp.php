<?php
/**
 * show attribute list at detail page
 * User: Lujie.Zhou(gao_lujie@live.cn, qq:821293064)
 * DateTime: 13-12-13 上午11:35
 */

class WItemProp extends CWidget
{
    public $item;

    public $showSku = true;

    public function run()
    {
        $props = CJSON::decode($this->item->props);
        empty($props) && $props = array();
        $prop_data = array();
        foreach ($props as $k => $v) {
            $item_prop = ItemProp::model()->findByPk($k);
            if (!$item_prop) continue;
            switch ($item_prop->type) {
                case 'input':
                    $prop_value_name = $v;
                    break;
                case 'optional':
                    $prop_value = PropValue::model()->findByPk($v);
                    if (!$prop_value) continue;
                    $prop_value_name = $prop_value->value_name;
                    break;
                case 'multiCheck':
                    if (!is_array($v)) continue;
                    $cri = new CDbCriteria();
                    $cri->addInCondition('value_id', $v);
                    $cri->select = 'value_name';
                    $prop_values = PropValue::model()->findAll($cri);
                    $prop_value_name = '';
                    foreach ($prop_values as $prop_value) {
                        $prop_value_name .= ' ' . $prop_value->value_name;
                    }
                    $prop_value_name = substr($prop_value_name, 1);
                    break;
            }
            $prop_data[$item_prop->prop_name] = $prop_value_name;
        }

        if ($this->showSku) {
            $skus = CJSON::decode($this->item->skus);
            if (!empty($skus['checkbox'])) {
                foreach ($skus['checkbox'] as $k => $v) {
                    if (!is_array($v)) continue;
                    $item_prop = ItemProp::model()->findByPk($k);
                    if (!$item_prop) continue;
                    $vids = array();
                    foreach ($v as $kk => $vv) {
                        $ids = explode(':', $vv);
                        if (!empty($ids[1])) {
                            $vids[$kk] = $ids[1];
                        }
                    }
                    if (empty($vids)) continue;
                    $cri = new CDbCriteria();
                    $cri->addInCondition('value_id', $vids);
                    $cri->select = 'value_id, value_name';
                    $prop_values = PropValue::model()->findAll($cri);
                    $prop_value_names = array();
                    $vids = array_flip($vids);
                    foreach ($prop_values as $prop_value) {
                        $prop_value_names[$vids[$prop_value->value_id]] = $prop_value->value_name;
                    }
                    $prop_data[$item_prop->prop_name] = implode(' ', $prop_value_names);
                }
            }
        }

        $this->render('itemProp', array('prop_data' => $prop_data));
    }
}