<?php

/**
 * This is the model class for table "payment".
 *
 * The followings are the available columns in table 'payment':
 * @property string $pay_id
 * @property string $pay_sn
 * @property string $money
 * @property string $currency
 * @property string $order_id
 * @property string $pay_method
 * @property string $user_id
 * @property string $account
 * @property string $bank
 * @property string $pay_account
 * @property string $status
 * @property string $create_time
 */
class Payment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Payment the static model class
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
		return 'payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pay_sn, pay_method, account, bank, pay_account', 'length', 'max'=>45),
			array('money, currency, order_id', 'length', 'max'=>20),
			array('user_id, create_time', 'length', 'max'=>10),
			array('status', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pay_id, pay_sn, money, currency, order_id, pay_method, user_id, account, bank, pay_account, status, create_time', 'safe', 'on'=>'search'),
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
			'pay_id' => 'Pay',
			'pay_sn' => 'Pay Sn',
			'money' => 'Money',
			'currency' => 'Currency',
			'order_id' => 'Order',
			'pay_method' => 'Pay Method',
			'user_id' => 'User',
			'account' => 'Account',
			'bank' => 'Bank',
			'pay_account' => 'Pay Account',
			'status' => 'Status',
			'create_time' => 'Create Time',
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

		$criteria->compare('pay_id',$this->pay_id,true);
		$criteria->compare('pay_sn',$this->pay_sn,true);
		$criteria->compare('money',$this->money,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('pay_method',$this->pay_method,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('account',$this->account,true);
		$criteria->compare('bank',$this->bank,true);
		$criteria->compare('pay_account',$this->pay_account,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}