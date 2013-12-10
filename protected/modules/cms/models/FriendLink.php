<?php

/**
 * This is the model class for table "friend_link".
 *
 * The followings are the available columns in table 'friend_link':
 * @property integer $link_id
 * @property integer $category_id
 * @property string $title
 * @property string $pic
 * @property string $url
 * @property string $memo
 * @property integer $sort_order
 * @property string $language
 * @property integer $create_time
 * @property integer $update_time
 */
class FriendLink extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'friend_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, pic, url, memo, language, create_time, update_time', 'required'),
			array('category_id, sort_order, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('pic', 'length', 'max'=>255),
			array('url', 'length', 'max'=>200),
			array('language', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('link_id, category_id, title, pic, url, memo, sort_order, language, create_time, update_time', 'safe', 'on'=>'search'),
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
			'link_id' => 'Link',
			'category_id' => 'Category',
			'title' => 'Title',
			'pic' => 'Pic',
			'url' => 'Url',
			'memo' => 'Memo',
			'sort_order' => 'Sort Order',
			'language' => 'Language',
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

		$criteria->compare('link_id',$this->link_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('memo',$this->memo,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FriendLink the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
