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
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

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
			array('status, pay_status, ship_status, refund_status', 'numerical', 'integerOnly'=>true),
			array('order_id', 'length', 'max'=>20),
			array('user_id, total_fee, ship_fee, pay_fee, pay_time, ship_time, create_time, update_time', 'length', 'max'=>10),
			array('pay_method, ship_method, receiver_name, receiver_country, receiver_state, receiver_city, receiver_district, receiver_zip, receiver_mobile, receiver_phone', 'length', 'max'=>45),
			array('receiver_address', 'length', 'max'=>255),
			array('memo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_id, user_id, status, pay_status, ship_status, refund_status, total_fee, ship_fee, pay_fee, pay_method, ship_method, receiver_name, receiver_country, receiver_state, receiver_city, receiver_district, receiver_address, receiver_zip, receiver_mobile, receiver_phone, memo, pay_time, ship_time, create_time, update_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
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
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('pay_status',$this->pay_status);
		$criteria->compare('ship_status',$this->ship_status);
		$criteria->compare('refund_status',$this->refund_status);
		$criteria->compare('total_fee',$this->total_fee,true);
		$criteria->compare('ship_fee',$this->ship_fee,true);
		$criteria->compare('pay_fee',$this->pay_fee,true);
		$criteria->compare('pay_method',$this->pay_method,true);
		$criteria->compare('ship_method',$this->ship_method,true);
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
}