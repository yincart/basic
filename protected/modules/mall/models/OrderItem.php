<?php

/**
 * This is the model class for table "order_item".
 *
 * The followings are the available columns in table 'order_item':
 * @property string $order_item_id
 * @property string $order_id
 * @property string $item_id
 * @property string $title
 * @property string $desc
 * @property string $pic
 * @property string $props_name
 * @property string $price
 * @property string $quantity
 * @property string $total_price
 *
 * The followings are the available model relations:
 * @property Item $item
 * @property Order $order
 */
class OrderItem extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'order_item';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('order_id, item_id, title, desc, props_name, price, quantity, total_price', 'required'),
            array('order_id', 'length', 'max'=>20),
            array('pic','safe'),
            array('item_id, price, quantity, total_price', 'length', 'max'=>10),
            array('title, pic', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('order_item_id, order_id, item_id, title, desc, pic, props_name, price, quantity, total_price', 'safe', 'on'=>'search'),
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
            'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'order_item_id' => 'Order Item',
            'order_id' => 'Order',
            'item_id' => 'Item',
            'title' => 'Title',
            'desc' => 'Desc',
            'pic' => 'Pic',
            'props_name' => 'Props Name',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'total_price' => 'Total Price',
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

        $criteria->compare('order_item_id',$this->order_item_id,true);
        $criteria->compare('order_id',$this->order_id,true);
        $criteria->compare('item_id',$this->item_id,true);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('desc',$this->desc,true);
        $criteria->compare('pic',$this->pic,true);
        $criteria->compare('props_name',$this->props_name,true);
        $criteria->compare('price',$this->price,true);
        $criteria->compare('quantity',$this->quantity,true);
        $criteria->compare('total_price',$this->total_price,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OrderItem the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function afterSave(){

            $num=OrderItem::model()->count(array(
                'condition'=> 'item_id=:item_id ',
                'params'=> array(':item_id' =>$this->item_id),
            ));
            $model=Item::model()->findByPk($this->item_id);
            $model->deal_count=$num;
            $model->save();
            return parent::afterSave();
    }

    public function saveOrderItem($OrderItem,$order_id,$item,$props_name,$quantity)
    {
        $OrderItem->order_id = $order_id;
        $OrderItem->item_id = $item->item_id;
        $OrderItem->title = $item->title;
        $OrderItem->desc = $item->desc;
        $OrderItem->pic = $item->getMainPic();
        $OrderItem->props_name = $props_name;
        $OrderItem->price = $item->price;
        $OrderItem->quantity = $quantity;
        $OrderItem->total_price = $OrderItem->quantity * $OrderItem->price;
        if (!$OrderItem->save()) {
//            throw new Exception('save order item fail');
            throw new Exception($OrderItem->getError());
            return false;
        }
        else
        {
            return true;
        }
    }
}