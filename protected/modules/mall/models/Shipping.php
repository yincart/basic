<?php

/**
 * This is the model class for table "shipping".
 *
 * The followings are the available columns in table 'shipping':
 * @property string $ship_id
 * @property string $order_id
 * @property string $ship_sn
 * @property string $type
 * @property string $ship_method
 * @property string $ship_fee
 * @property string $op_name
 * @property integer $status
 * @property string $receiver_name
 * @property string $receiver_phone
 * @property string $receiver_mobile
 * @property string $location
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property ShippingItem[] $shippingItems
 */
class Shipping extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'shipping';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('order_id', 'required'),
            array('status', 'numerical', 'integerOnly'=>true),
            array('order_id', 'length', 'max'=>20),
            array('ship_sn, ship_method, op_name, receiver_name, receiver_phone, receiver_mobile', 'length', 'max'=>45),
            array('type', 'length', 'max'=>8),
            array('ship_fee, create_time, update_time', 'length', 'max'=>10),
            array('location', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ship_id, order_id, ship_sn, type, ship_method, ship_fee, op_name, status, receiver_name, receiver_phone, receiver_mobile, location, create_time, update_time', 'safe', 'on'=>'search'),
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
            'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
            'shippingItems' => array(self::HAS_MANY, 'ShippingItem', 'ship_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ship_id' => 'Ship',
            'order_id' => 'Order',
            'ship_sn' => 'Ship Sn',
            'type' => 'Type',
            'ship_method' => 'Ship Method',
            'ship_fee' => 'Ship Fee',
            'op_name' => 'Op Name',
            'status' => 'Status',
            'receiver_name' => 'Receiver Name',
            'receiver_phone' => 'Receiver Phone',
            'receiver_mobile' => 'Receiver Mobile',
            'location' => 'Location',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
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

        $criteria->compare('ship_id',$this->ship_id,true);
        $criteria->compare('order_id',$this->order_id,true);
        $criteria->compare('ship_sn',$this->ship_sn,true);
        $criteria->compare('type',$this->type,true);
        $criteria->compare('ship_method',$this->ship_method,true);
        $criteria->compare('ship_fee',$this->ship_fee,true);
        $criteria->compare('op_name',$this->op_name,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('receiver_name',$this->receiver_name,true);
        $criteria->compare('receiver_phone',$this->receiver_phone,true);
        $criteria->compare('receiver_mobile',$this->receiver_mobile,true);
        $criteria->compare('location',$this->location,true);
        $criteria->compare('create_time',$this->create_time,true);
        $criteria->compare('update_time',$this->update_time,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Shipping the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}