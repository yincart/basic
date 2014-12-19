<?php

/**
 * This is the model class for table "payment".
 *
 * The followings are the available columns in table 'payment':
 * @property string $payment_id
 * @property string $order_id
 * @property string $payment_sn
 * @property string $money
 * @property string $currency
 * @property string $user_id
 * @property string $account
 * @property string $bank
 * @property string $pay_account
 * @property integer $status
 * @property string $create_time
 *
 * The followings are the available model relations:
 * @property Order $order
 */
class Payment extends CActiveRecord
{
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
            array('order_id, payment_sn, money, currency, user_id, account, bank, pay_account, status, create_time', 'required'),
            array('status', 'numerical', 'integerOnly'=>true),
            array('order_id, currency', 'length', 'max'=>20),
            array('payment_sn, account, bank, pay_account', 'length', 'max'=>45),
            array('money, user_id, create_time', 'length', 'max'=>10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('payment_id, order_id, payment_sn, money, currency, user_id, account, bank, pay_account, status, create_time', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'payment_id' => 'Payment',
            'order_id' => 'Order',
            'payment_sn' => 'Payment Sn',
            'money' => 'Money',
            'currency' => 'Currency',
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

        $criteria->compare('payment_id',$this->payment_id,true);
        $criteria->compare('order_id',$this->order_id,true);
        $criteria->compare('payment_sn',$this->payment_sn,true);
        $criteria->compare('money',$this->money,true);
        $criteria->compare('currency',$this->currency,true);
        $criteria->compare('user_id',$this->user_id,true);
        $criteria->compare('account',$this->account,true);
        $criteria->compare('bank',$this->bank,true);
        $criteria->compare('pay_account',$this->pay_account,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('create_time',$this->create_time,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Payment the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}