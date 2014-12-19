<?php

/**
 * This is the model class for table "location".
 *
 * The followings are the available columns in table 'location':
 * @property string $location_id
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $district
 * @property string $address
 * @property string $zip
 */
class Location extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'location';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that 
        // will receive user inputs. 
        return array(
            array('country, state, city, district, address, zip', 'required'),
            array('country, state, city, district, zip', 'length', 'max'=>45),
            array('address', 'length', 'max'=>255),
            // The following rule is used by search(). 
            // @todo Please remove those attributes that should not be searched. 
            array('location_id, country, state, city, district, address, zip', 'safe', 'on'=>'search'),
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
            'location_id' => 'Location',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'district' => 'District',
            'address' => 'Address',
            'zip' => 'Zip',
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

        $criteria->compare('location_id',$this->location_id,true);
        $criteria->compare('country',$this->country,true);
        $criteria->compare('state',$this->state,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('district',$this->district,true);
        $criteria->compare('address',$this->address,true);
        $criteria->compare('zip',$this->zip,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Location the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}