<?php

/**
 * This is the model class for table "{{spec_values}}".
 *
 * The followings are the available columns in table '{{spec_values}}':
 * @property integer $spec_value_id
 * @property integer $spec_id
 * @property string $spec_value
 * @property string $spec_image
 * @property integer $sort_order
 */
class SpecValue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpecValue the static model class
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
		return '{{spec_values}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('spec_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('spec_value', 'length', 'max'=>100),
			array('spec_image', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('spec_value_id, spec_id, spec_value, spec_image, sort_order', 'safe', 'on'=>'search'),
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
                    'spec' => array(self::BELONGS_TO, 'Specification', 'spec_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'spec_value_id' => 'Spec Value',
			'spec_id' => 'Spec',
			'spec_value' => 'Spec Value',
			'spec_image' => 'Spec Image',
			'sort_order' => 'Sort Order',
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

		$criteria->compare('spec_value_id',$this->spec_value_id);
		$criteria->compare('spec_id',$this->spec_id);
		$criteria->compare('spec_value',$this->spec_value,true);
		$criteria->compare('spec_image',$this->spec_image,true);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}