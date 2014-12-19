<?php

/**
 * This is the model class for table "themes".
 *
 * The followings are the available columns in table 'themes':
 * @property string $theme
 * @property string $name
 * @property string $author
 * @property string $site
 * @property string $update_url
 * @property string $desc
 * @property string $config
 * @property integer $create_time
 * @property integer $update_time
 */
class Theme extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'themes';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('theme, name', 'required'),
            array('create_time, update_time', 'numerical', 'integerOnly' => true),
            array('theme', 'length', 'max' => 50),
            array('name, author', 'length', 'max' => 45),
            array('site, update_url', 'length', 'max' => 100),
            array('desc, config', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('theme, name, author, site, update_url, desc, config, create_time, update_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'theme' => '主题',
            'name' => '名称',
            'author' => '作者',
            'site' => '站点',
            'update_url' => '更新地址',
            'desc' => '描述',
            'config' => '配置',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('theme', $this->theme, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('site', $this->site, true);
        $criteria->compare('update_url', $this->update_url, true);
        $criteria->compare('desc', $this->desc, true);
        $criteria->compare('config', $this->config, true);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Theme the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_time = $this->update_time = time();
            }
            else
                $this->update_time = time();
            return true;
        }
        else
            return false;
    }

}
