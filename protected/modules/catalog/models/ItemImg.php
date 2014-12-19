<?php

/**
 * This is the model class for table "item_img".
 *
 * The followings are the available columns in table 'item_img':
 * @property string $item_img_id
 * @property string $item_id
 * @property string $pic
 * @property integer $position
 * @property string $create_time
 *
 * The followings are the available model relations:
 * @property Item $item
 */
class ItemImg extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'item_img';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that 
        // will receive user inputs. 
        return array(
            array('item_id, pic, position', 'required'),
            array('position', 'numerical', 'integerOnly'=>true),
            array('item_id, create_time', 'length', 'max'=>10),
            array('pic', 'length', 'max'=>255),
            array('create_time', 'safe'),
            // The following rule is used by search(). 
            // @todo Please remove those attributes that should not be searched. 
            array('item_img_id, item_id, pic, position, create_time', 'safe', 'on'=>'search'),
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
            'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'item_img_id' => 'Item Img',
            'item_id' => 'Item',
            'pic' => 'Pic',
            'position' => 'Position',
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

        $criteria->compare('item_img_id',$this->item_img_id,true);
        $criteria->compare('item_id',$this->item_id,true);
        $criteria->compare('pic',$this->pic,true);
        $criteria->compare('position',$this->position);
        $criteria->compare('create_time',$this->create_time,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ItemImg the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function beforeSave()
    {
        $this->create_time = time();
        return parent::beforeSave();
    }

    public function defaultScope()
    {
        return array('order' => 'position');
    }
} 