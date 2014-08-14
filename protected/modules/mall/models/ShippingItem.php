<?php

/**
 * This is the model class for table "shipping_item".
 *
 * The followings are the available columns in table 'shipping_item':
 * @property string $id
 * @property string $ship_id
 * @property string $item_id
 * @property string $item_sn
 * @property string $item_title
 * @property string $num
 */
class ShippingItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ShippingItem the static model class
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
		return 'shipping_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ship_id', 'required'),
			array('ship_id, item_id, num', 'length', 'max'=>10),
			array('item_sn', 'length', 'max'=>45),
			array('item_title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ship_id, item_id, item_sn, item_title, num', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'ship_id' => 'Ship',
			'item_id' => 'Item',
			'item_sn' => 'Item Sn',
			'item_title' => 'Item Title',
			'num' => 'Num',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('ship_id',$this->ship_id,true);
		$criteria->compare('item_id',$this->item_id,true);
		$criteria->compare('item_sn',$this->item_sn,true);
		$criteria->compare('item_title',$this->item_title,true);
		$criteria->compare('num',$this->num,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}