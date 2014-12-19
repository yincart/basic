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
 * @property string $total_fee
 * @property string $ship_fee
 * @property string $pay_fee
 * @property string $pay_method
 * @property string $ship_method
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
 */
class Order extends CActiveRecord
{

    private $orderLog;
    public $id;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Order the static model class
     */

    public static function model($className = __CLASS__){
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName(){
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
            array('receiver_name,receiver_state,receiver_city,receiver_district,receiver_zip,receiver_address', 'required'),
            array('shipping_method_id,status, pay_status, ship_status, refund_status, comment_status', 'numerical', 'integerOnly' => true),
            array('user_id, total_fee, ship_fee, pay_fee, payment_method_id, shipping_method_id, pay_time, ship_time, create_time, update_time', 'length', 'max' => 10),
            array('receiver_name, receiver_country, receiver_state, receiver_city, receiver_district, receiver_zip, receiver_mobile, receiver_phone', 'length', 'max' => 45),
            array('receiver_address', 'length', 'max' => 255),
            array('memo', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('order_id, user_id, status, pay_status, ship_status, refund_status, comment_status, total_fee, ship_fee, pay_fee, payment_method_id, shipping_method_id, receiver_name, receiver_country, receiver_state, receiver_city, receiver_district, receiver_address, receiver_zip, receiver_mobile, receiver_phone, memo, pay_time, ship_time, create_time, update_time', 'safe', 'on' => 'search'),);
    }


    /**
     * @return array relational rules.
     */
    public function relations(){
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
            'users' => array(self::BELONGS_TO, 'Users', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels(){
        return array(
            'order_id' => '订单号',
            'user_id' => '会员',
            'status' => '订单状态',
            'pay_status' => '付款状态',
            'ship_status' => '配送状态',
            'refund_status' => '退款状态',
            'total_fee' => '商品总金额',
            'ship_fee' => '运费',
            'pay_fee' => '实付款',
            'pay_method' => '付款方式',
            'ship_method' => '配送方式',
            'receiver_name' => '收货人',
            'receiver_country' => '国家',
            'receiver_state' => '省',
            'receiver_city' => '市',
            'receiver_district' => '区',
            'receiver_address' => '详细地址',
            'receiver_zip' => '邮政编码',
            'receiver_mobile' => '手机',
            'receiver_phone' => '电话',
            'memo' => '备注',
            'pay_time' => '付款时间',
            'ship_time' => '发货时间',
            'create_time' => '下单时间',
            'update_time' => '更新时间',
            'comment_status' => '评论状态',
            'payment_method_id' => '付款方式',
            'shipping_method_id' => '配送方式',
            'detail_address' => '具体地址',
            'order_ship_id' => '快递单号',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search(){
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('order_id', $this->order_id, true);
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('pay_status', $this->pay_status);
        $criteria->compare('ship_status', $this->ship_status);
        $criteria->compare('refund_status', $this->refund_status);
        $criteria->compare('comment_status', $this->comment_status);
        $criteria->compare('total_fee', $this->total_fee, true);
        $criteria->compare('ship_fee', $this->ship_fee, true);
        $criteria->compare('pay_fee', $this->pay_fee, true);
        $criteria->compare('payment_method_id', $this->payment_method_id, true);
        $criteria->compare('shipping_method_id', $this->shipping_method_id);
        $criteria->compare('receiver_name', $this->receiver_name, true);
        $criteria->compare('receiver_country', $this->receiver_country, true);
        $criteria->compare('receiver_state', $this->receiver_state, true);
        $criteria->compare('receiver_city', $this->receiver_city, true);
        $criteria->compare('receiver_district', $this->receiver_district, true);
        $criteria->compare('receiver_address', $this->receiver_address, true);
        $criteria->compare('receiver_zip', $this->receiver_zip, true);
        $criteria->compare('receiver_mobile', $this->receiver_mobile, true);
        $criteria->compare('receiver_phone', $this->receiver_phone, true);
        $criteria->compare('memo', $this->memo, true);
        $criteria->compare('pay_time', $this->pay_time, true);
        $criteria->compare('ship_time', $this->ship_time, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);

        $criteria->with = 'users';
        $criteria->order='order_id desc';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function showDetailAddress($model){
        $data['receiver_country'] = $model->receiver_country;
        foreach (array( 'state', 'city', 'district') as $value) {
            $data['receiver_' . $value] = Area::model()->findByPk($model->{'receiver_' . $value})->name;
        }
        $data['receiver_address'] = $model->receiver_address;
        $detail_address = implode(' ', $data);
        return $detail_address;

    }

    protected function beforeSave() {
        $orderLog = new OrderLog();
        if ($this->isNewRecord) {
            $orderLog->op_name = 'create';
            $orderLog->log_text = serialize($this->attributes);
        } else {
            $orderLog->op_name = 'update';
            $orderLog->log_text = serialize($this->findByPk($this->order_id));
        }
        $orderLog->order_id = (int)$this->order_id;
        $this->orderLog = $orderLog;
        parent::beforeSave();
        return true;
    }

    protected function afterSave() {
        $this->orderLog->result = 'success';
        $this->orderLog->isNewRecord = true;
        if(!$this->orderLog->save()){
            return false;
        }
       parent::afterSave();
       return true;
    }

    protected function afterDelete()
    {
        $orderLog = new OrderLog();
        $orderLog->op_name = 'delete';
        $orderLog->log_text = serialize($this);
        $orderLog->order_id = $this->order_id;
        $orderLog->result = 'success';
        $orderLog->save();
    }

    public function MyOrderSearch(){
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('order_id', $this->order_id, true);
        $criteria->compare('user_id', Yii::app()->user->id, true);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('pay_status', $this->pay_status);
        $criteria->compare('ship_status', $this->ship_status);
        $criteria->compare('refund_status', $this->refund_status);
        $criteria->compare('comment_status', $this->comment_status);
        $criteria->compare('total_fee', $this->total_fee, true);
        $criteria->compare('ship_fee', $this->ship_fee, true);
        $criteria->compare('pay_fee', $this->pay_fee, true);
        $criteria->compare('payment_method_id', $this->payment_method_id, true);
        $criteria->compare('shipping_method_id', $this->shipping_method_id);
        $criteria->compare('receiver_name', $this->receiver_name, true);
        $criteria->compare('receiver_country', $this->receiver_country, true);
        $criteria->compare('receiver_state', $this->receiver_state, true);
        $criteria->compare('receiver_city', $this->receiver_city, true);
        $criteria->compare('receiver_district', $this->receiver_district, true);
        $criteria->compare('receiver_address', $this->receiver_address, true);
        $criteria->compare('receiver_zip', $this->receiver_zip, true);
        $criteria->compare('receiver_mobile', $this->receiver_mobile, true);
        $criteria->compare('receiver_phone', $this->receiver_phone, true);
        $criteria->compare('memo', $this->memo, true);
        $criteria->compare('pay_time', $this->pay_time, true);
        $criteria->compare('ship_time', $this->ship_time, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);

        $criteria->with = 'users';
        $criteria->order='order_id desc';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}