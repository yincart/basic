<?php

/**
 * This is the model class for table "{{friend_link}}".
 *
 * The followings are the available columns in table '{{friend_link}}':
 * @property integer $id
 * @property string $name
 * @property string $website
 * @property integer $sort_order
 */
class FriendLink extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FriendLink the static model class
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
		return '{{friend_link}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, website', 'required'),
			array('sort_order', 'numerical', 'integerOnly'=>true),
			array('name, en_name', 'length', 'max'=>100),
			array('website', 'length', 'max'=>200),
                        array('image', 'length', 'max'=>255),
                        array('image', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, website, sort_order', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'website' => 'Website',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
     public function getIndexThumb()
     {
        $host = Yii::app()->request->hostInfo; 
        $img = '/upload/link/'.$this->image;
        $trueimage = $host . $img;
        if (F::isfile($trueimage)) {
        $img_thumb =  Yii::app()->request->baseUrl.$img;
        $img_thumb_now = CHtml::image($img_thumb, $this->name);
        return CHtml::link($img_thumb_now, $this->website, array('target'=>'_blank'));
        }else{
        return CHtml::link($this->name, $this->website, array('target'=>'_blank'));    
        }
        
     }
}