<?php

/**
 * This is the model class for table "{{wishlist}}".
 *
 * The followings are the available columns in table '{{wishlist}}':
 * @property string $wishlist_id
 * @property string $user_id
 * @property string $item_id
 * @property string $desc
 * @property string $create_time
 */
class Wishlist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Wishlist the static model class
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
		return '{{wishlist}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, item_id, create_time', 'length', 'max'=>10),
			array('desc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('wishlist_id, user_id, item_id, desc, create_time', 'safe', 'on'=>'search'),
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
                    'item' => array(self::BELONGS_TO, 'Item', 'item_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'wishlist_id' => 'ID',
			'user_id' => '会员',
			'item_id' => '商品ID',
			'desc' => '备注',
			'create_time' => '收藏时间',
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

		$criteria->compare('wishlist_id',$this->wishlist_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('item_id',$this->item_id,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('create_time',$this->create_time,true);

        $criteria->order='wishlist_id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function MyCollectSearch()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('wishlist_id',$this->wishlist_id,true);
        $criteria->compare('user_id',Yii::app()->user->id,true);
        $criteria->compare('item_id',$this->item_id,true);
        $criteria->compare('desc',$this->desc,true);
        $criteria->compare('create_time',$this->create_time,true);

        $criteria->order='wishlist_id desc';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}