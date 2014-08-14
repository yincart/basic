<?php

/**
 * This is the model class for table "area".
 *
 * The followings are the available columns in table 'area':
 * @property string $area_id
 * @property string $parent_id
 * @property string $path
 * @property string $grade
 * @property string $name
 * @property string $language
 *
 * The followings are the available model relations:
 * @property Item[] $items
 * @property Item[] $items1
 * @property Item[] $items2
 */
class Area extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'area';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that 
        // will receive user inputs. 
        return array(
            array('path, name, language', 'required'),
            array('parent_id, grade', 'length', 'max'=>10),
            array('path', 'length', 'max'=>255),
            array('name', 'length', 'max'=>45),
            array('language', 'length', 'max'=>20),
            // The following rule is used by search(). 
            // @todo Please remove those attributes that should not be searched. 
            array('area_id, parent_id, path, grade, name, language', 'safe', 'on'=>'search'),
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
            'countryItems' => array(self::HAS_MANY, 'Item', 'country'),
            'stateItems' => array(self::HAS_MANY, 'Item', 'state'),
            'cityItems' => array(self::HAS_MANY, 'Item', 'city'),
            'parentArea' => array(self::BELONGS_TO, 'Area', 'parent_id'),
            'childArea' => array(self::HAS_MANY, 'Area', 'parent_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'area_id' => 'Area',
            'parent_id' => 'Parent',
            'path' => 'Path',
            'grade' => 'Grade',
            'name' => 'Name',
            'language' => 'Language',
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

        $criteria->compare('area_id',$this->area_id,true);
        $criteria->compare('parent_id',$this->parent_id,true);
        $criteria->compare('path',$this->path,true);
        $criteria->compare('grade',$this->grade,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('language',$this->language,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Area the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
} 