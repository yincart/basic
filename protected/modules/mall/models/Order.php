
<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property string $order_id
 * @property string $user_id
 * @property integer $status
 * @property integer $pay_status
 * @property integer $ship_status
 * @property integer $refund_status
 * @property integer $comment_status
 * @property string $total_fee
 * @property string $ship_fee
 * @property string $pay_fee
 * @property string $payment_method_id
 * @property integer $shipping_method_id
 * @property string $receiver_name
 * @property string $receiver_country
 * @property string $receiver_state
 * @property string $receiver_city
 * @property string $receiver_district
 * @property string $receiver_address
 * @property string $receiver_zip
 * @property string $receiver_mobile
 * @property string $receiver_phone
 * @property string $memo
 * @property string $pay_time
 * @property string $ship_time
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property PaymentMethod $paymentMethod
 * @property ShippingMethod $shippingMethod
 * @property OrderItem[] $orderItems
 * @property OrderLog[] $orderLogs
 * @property Payment[] $payments
 * @property Refund[] $refunds
 * @property Shipping[] $shippings
 */
class Order extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, total_fee, ship_fee, pay_fee, payment_method_id, shipping_method_id, receiver_name, receiver_country, receiver_state, receiver_city, receiver_district, receiver_address, receiver_zip, receiver_mobile, receiver_phone, memo, create_time, update_time', 'required'),
            array('status, pay_status, ship_status, refund_status, comment_status, shipping_method_id', 'numerical', 'integerOnly'=>true),
            array('user_id, total_fee, ship_fee, pay_fee, payment_method_id, pay_time, ship_time, create_time, update_time', 'length', 'max'=>10),
            array('receiver_name, receiver_country, receiver_state, receiver_city, receiver_district, receiver_zip, receiver_mobile, receiver_phone', 'length', 'max'=>45),
            array('receiver_address', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('order_id, user_id, status, pay_status, ship_status, refund_status, comment_status, total_fee, ship_fee, pay_fee, payment_method_id, shipping_method_id, receiver_name, receiver_country, receiver_state, receiver_city, receiver_district, receiver_address, receiver_zip, receiver_mobile, receiver_phone, memo, pay_time, ship_time, create_time, update_time', 'safe', 'on'=>'search'),
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
            'paymentMethod' => array(self::BELONGS_TO, 'PaymentMethod', 'payment_method_id'),
            'shippingMethod' => array(self::BELONGS_TO, 'ShippingMethod', 'shipping_method_id'),
            'orderItems' => array(self::HAS_MANY, 'OrderItem', 'order_id'),
            'orderLogs' => array(self::HAS_MANY, 'OrderLog', 'order_id'),
            'payments' => array(self::HAS_MANY, 'Payment', 'order_id'),
            'refunds' => array(self::HAS_MANY, 'Refund', 'order_id'),
            'shippings' => array(self::HAS_MANY, 'Shipping', 'order_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'order_id' => 'Order',
            'user_id' => 'User',
            'status' => 'Status',
            'pay_status' => 'Pay Status',
            'ship_status' => 'Ship Status',
            'refund_status' => 'Refund Status',
            'comment_status' => 'Comment Status',
            'total_fee' => 'Total Fee',
            'ship_fee' => 'Ship Fee',
            'pay_fee' => 'Pay Fee',
            'payment_method_id' => 'Payment Method',
            'shipping_method_id' => 'Shipping Method',
            'receiver_name' => 'Receiver Name',
            'receiver_country' => 'Receiver Country',
            'receiver_state' => 'Receiver State',
            'receiver_city' => 'Receiver City',
            'receiver_district' => 'Receiver District',
            'receiver_address' => 'Receiver Address',
            'receiver_zip' => 'Receiver Zip',
            'receiver_mobile' => 'Receiver Mobile',
            'receiver_phone' => 'Receiver Phone',
            'memo' => 'Memo',
            'pay_time' => 'Pay Time',
            'ship_time' => 'Ship Time',
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

        $criteria->compare('order_id',$this->order_id,true);
        $criteria->compare('user_id',$this->user_id,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('pay_status',$this->pay_status);
        $criteria->compare('ship_status',$this->ship_status);
        $criteria->compare('refund_status',$this->refund_status);
        $criteria->compare('comment_status',$this->comment_status);
        $criteria->compare('total_fee',$this->total_fee,true);
        $criteria->compare('ship_fee',$this->ship_fee,true);
        $criteria->compare('pay_fee',$this->pay_fee,true);
        $criteria->compare('payment_method_id',$this->payment_method_id,true);
        $criteria->compare('shipping_method_id',$this->shipping_method_id);
        $criteria->compare('receiver_name',$this->receiver_name,true);
        $criteria->compare('receiver_country',$this->receiver_country,true);
        $criteria->compare('receiver_state',$this->receiver_state,true);
        $criteria->compare('receiver_city',$this->receiver_city,true);
        $criteria->compare('receiver_district',$this->receiver_district,true);
        $criteria->compare('receiver_address',$this->receiver_address,true);
        $criteria->compare('receiver_zip',$this->receiver_zip,true);
        $criteria->compare('receiver_mobile',$this->receiver_mobile,true);
        $criteria->compare('receiver_phone',$this->receiver_phone,true);
        $criteria->compare('memo',$this->memo,true);
        $criteria->compare('pay_time',$this->pay_time,true);
        $criteria->compare('ship_time',$this->ship_time,true);
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
     * @return Order the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}