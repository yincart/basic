<?php

/**
 * This is the model class for table "sku".
 *
 * The followings are the available columns in table 'sku':
 * @property string $sku_id
 * @property string $item_id
 * @property string $tag
 * @property string $props
 * @property string $props_name
 * @property string $quantity
 * @property string $price
 * @property string $outer_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Item $item
 * @property ItemImg[] $skuImgs
 */
class Sku extends YActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'sku';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('outer_id', 'default', 'value' => ''),
            array('item_id, tag, props, props_name, quantity, price, status', 'required'),
            array('status', 'numerical', 'integerOnly'=>true),
            array('item_id, quantity, price', 'length', 'max'=>10),
            array('tag, outer_id', 'length', 'max'=>45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('sku_id, item_id, props, tag, props_name, quantity, price, outer_id, status', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
            'skuImgs' => array(self::HAS_MANY, 'ItemImg', 'sku_id'),
            'skuPrice' => array(self::HAS_MANY, 'SkuPrice', 'sku_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'sku_id' => 'Sku ID',
            'item_id' => 'Item ID',
            'props' => 'Props',
            'tag' => '标签',
            'props_name' => '属性名称',
            'quantity' => '数量',
            'price' => '价格',
            'outer_id' => '商品编码',
            'status' => 'Status',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;
        $criteria->order = 'sku_id desc';

        $criteria->compare('sku_id',$this->sku_id,true);
        $criteria->compare('item_id',$this->item_id,true);
        $criteria->compare('props',$this->props,true);
        $criteria->compare('tag',$this->tag,true);
        $criteria->compare('props_name',$this->props_name,true);
        $criteria->compare('quantity',$this->quantity,true);
        $criteria->compare('price',$this->price,true);
        $criteria->compare('outer_id',$this->outer_id,true);
        $criteria->compare('status',$this->status);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Sku the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getPropNames($onlyValue = false, $separator = ' ')
    {
        $propNames = json_decode($this->props_name, true);
        if ($onlyValue) {
            $propNames = array_map(function($name) {
                $names = explode(':', $name);
                return $names[1];
            }, $propNames);
        }
        return implode($separator, $propNames);
    }

    public function init()
    {
        parent::init();
        $this->price = $this->quantity = 0;
        $this->outer_id = time();
    }
}
