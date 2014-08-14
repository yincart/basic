<?php

/**
 * This is the model class for table "review".
 *
 * The followings are the available columns in table 'review':
 * @property string $review_id
 * @property integer $create_at
 * @property string $content
 * @property integer $customer_id
 * @property integer $entity_id
 * @property integer $entity_pk_value
 * @property integer $rating
 *
 * The followings are the available model relations:
 * @property ReviewPicture[] $reviewPictures
 * @property ReviewTags[] $reviewTags
 */
class Review extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'review';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_at, customer_id, entity_id, entity_pk_value, rating', 'numerical', 'integerOnly'=>true),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('review_id, create_at, content, customer_id, entity_id, entity_pk_value, rating', 'safe', 'on'=>'search'),
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
			'reviewPhotos' => array(self::HAS_MANY, 'ReviewPhotos', 'review_id'),
			'reviewTags' => array(self::HAS_MANY, 'ReviewTags', 'review_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'review_id' => 'Review',
			'create_at' => 'Create At',
			'content' => 'Content',
			'customer_id' => 'Customer',
			'entity_id' => 'Entity',
			'entity_pk_value' => 'Entity Pk Value',
			'rating' => 'Rating',
            'photos_exit'=>'Photos_exit',
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

		$criteria->compare('review_id',$this->review_id,true);
		$criteria->compare('create_at',$this->create_at);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('entity_id',$this->entity_id);
		$criteria->compare('entity_pk_value',$this->entity_pk_value);
		$criteria->compare('rating',$this->rating);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Review the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    const ENTITY_PRODUCT=1;
    const ENTITY_REVIEW=2;

   /***
    * return review data
    * @param $productId
    * @param $entityId :the type of target.'1' :product .'2' :review
    * @param $rating '0':all review ; '1' : good review; '2' : middle review; '3': bad review '4':return review who has picture;
    * @return array
    */

    Public function reviewFind($productId,$entityId,$rating){
        $data=array();
        $criteria = new CDbCriteria;
        $criteria->select='review_id,create_at,content,customer_id,rating,photos_exit';
        $criteria->order='create_at DESC';
        if($rating==4){
            $criteria->condition = 'entity_pk_value=:entity_pk_value and entity_id=:entity_id and photos_exit=:photos_exit';
            $criteria->params = array(':entity_pk_value' =>$productId, ':entity_id' =>$entityId,':photos_exit'=>1);
        }
        else if($rating!=''&&$rating!=0&&$rating!=4){
            $criteria->condition = 'entity_pk_value=:entity_pk_value and entity_id=:entity_id and rating=:rating';
            $criteria->params = array(':entity_pk_value' =>$productId, ':entity_id' =>$entityId,':rating'=>$rating);
        }else{
            $criteria->condition = 'entity_pk_value=:entity_pk_value and entity_id=:entity_id';
            $criteria->params = array(':entity_pk_value' =>$productId, ':entity_id' =>$entityId);
        }
        $count=self::model()->count($criteria);
        $pages=new CPagination($count);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $review = self::model()->findall($criteria);
        $data[0]=$review;$data[1]=$pages;
        return $data;
    }

    /***
     * count different kinds of review
     * @param $productId
     * @param $entityId :the type of target.'1' :product .'2' :review
     * @param $flag  "1": count three kinds of review; '2' : count  picture ;'3':count tags ;'4':count  reply for review
     * @return CDbDataReader|mixed|string
     */
    Public function reviewSummary($productId,$entityId,$flag){
        if($flag==1){
            for($i=1;$i<4;$i++){
                $num=self::model()->count(array(
                    'condition'=>'entity_pk_value=:entity_pk_value and entity_id=:entity_id and rating=:rating',
                    'params'=> array(':entity_pk_value' =>$productId, ':entity_id' =>$entityId,':rating'=>$i),
                ));
                $reviewNum[$i]=$num;
            }
            return $reviewNum;
        }
        if($flag==2){
            $num=self::model()->count(array(
                'condition'=>'entity_pk_value=:entity_pk_value and entity_id=:entity_id and photos_exit=:photos_exit',
                'params'=> array(':entity_pk_value' =>$productId, ':entity_id' =>$entityId,':photos_exit'=>'1'),
            ));
            return $num;
        }
       if($flag==4){
            $num=self::model()->count(array(
                'condition'=>'entity_pk_value=:entity_pk_value and entity_id=:entity_id ',
                'params'=> array(':entity_pk_value' =>$productId, ':entity_id' =>$entityId),
            ));
           return $num;
        }
    }


    public function afterSave(){
        if($this->entity_id==1){
            $num=self::model()->count(array(
                'condition'=>'entity_pk_value=:entity_pk_value and entity_id=:entity_id ',
                'params'=> array(':entity_pk_value' =>$this->entity_pk_value, ':entity_id' =>1),
            ));
            $model=Item::model()->findByPk($this->entity_pk_value);
            $model->review_count=$num;
            $model->save();
            return parent::afterSave();
        }
    }
}
