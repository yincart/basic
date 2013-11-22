<?php

/**
 * This is the model class for table "order_log".
 *
 * The followings are the available columns in table 'order_log':
 * @property string $log_id
 * @property integer $order_id
 * @property integer $op_id
 * @property string $op_name
 * @property string $log_text
 * @property string $action_time
 * @property string $behavior
 * @property string $result
 */
class OrderLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderLog the static model class
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
		return 'order_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, op_id', 'numerical', 'integerOnly'=>true),
			array('op_name', 'length', 'max'=>45),
			array('action_time', 'length', 'max'=>10),
			array('behavior', 'length', 'max'=>20),
			array('result', 'length', 'max'=>7),
			array('log_text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('log_id, order_id, op_id, op_name, log_text, action_time, behavior, result', 'safe', 'on'=>'search'),
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
			'log_id' => 'Log',
			'order_id' => 'Order',
			'op_id' => 'Op',
			'op_name' => 'Op Name',
			'log_text' => 'Log Text',
			'action_time' => 'Action Time',
			'behavior' => 'Behavior',
			'result' => 'Result',
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

		$criteria->compare('log_id',$this->log_id,true);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('op_id',$this->op_id);
		$criteria->compare('op_name',$this->op_name,true);
		$criteria->compare('log_text',$this->log_text,true);
		$criteria->compare('action_time',$this->action_time,true);
		$criteria->compare('behavior',$this->behavior,true);
		$criteria->compare('result',$this->result,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}