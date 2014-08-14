<?php

/**
 * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
 */
class CartItem extends Item implements IECartPosition
{
    public $cartProps = '';

    public $sku;

    public function getId()
    {
        if (empty($this->skus)) {
            return 'Item' . $this->item_id;
        } else {
            $skus = array();
            foreach ($this->skus as $sku) {
                $skus[$sku->props] = $sku;
            }
            $pvids = explode(';', $this->cartProps);
            $props = array();
            foreach ($pvids as $pvid) {
                $ids = explode(':', $pvid);
                $props[$ids[0]] = $pvid;
            }
            $props = json_encode($props);
            if (isset($skus[$props])) {
                $this->sku = $skus[$props];
                return 'Sku' . $skus[$props]->sku_id;
            } else {
                return false;
            }
        }
    }

    public function getPrice()
    {
        return empty($this->sku) ? $this->price : $this->sku->price;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Item the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}