<?php

/**
 * This is the model class for table "newsletter_subscriber".
 *
 * The followings are the available columns in table 'newsletter_subscriber':
 * @property integer $subscriber_id
 * @property string $customer_id
 * @property string $email
 * @property integer $status
 * @property string $confirm_code
 * @property string $change_status_at
 */
class NewsletterSubscriber extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'newsletter_subscriber';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('email', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('customer_id', 'length', 'max'=>10),
			array('email', 'length', 'max'=>150),
                        array('email', 'unique'),
                        array('email', 'email'),
			array('confirm_code', 'length', 'max'=>32),
			array('change_status_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('subscriber_id, customer_id, email, status, confirm_code, change_status_at', 'safe', 'on'=>'search'),
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
			'subscriber_id' => 'ID',
			'customer_id' => '客户',
			'email' => 'Email',
			'status' => '状态',
			'confirm_code' => '确认码',
			'change_status_at' => '改变状态时间',
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

		$criteria->compare('subscriber_id',$this->subscriber_id);
		$criteria->compare('customer_id',$this->customer_id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('confirm_code',$this->confirm_code,true);
		$criteria->compare('change_status_at',$this->change_status_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NewsletterSubscriber the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
