<?php

/**
 * This is the model class for table "{{specification}}".
 *
 * The followings are the available columns in table '{{specification}}':
 * @property integer $spec_id
 * @property string $spec_name
 * @property string $spec_show_type
 * @property string $spec_type
 * @property string $spec_memo
 * @property integer $sort_order
 * @property string $disabled
 */
class Specification extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Specification the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{specification}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('spec_name', 'required'),
            array('sort_order', 'numerical', 'integerOnly' => true),
            array('spec_name, spec_memo', 'length', 'max' => 50),
            array('spec_show_type', 'length', 'max' => 6),
            array('spec_type, disabled', 'length', 'max' => 5),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('spec_id, spec_name, spec_show_type, spec_type, spec_memo, sort_order, disabled', 'safe', 'on' => 'search'),
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
            'spec_id' => 'ID',
            'spec_name' => '规格名称',
            'spec_show_type' => '显示方式',
            'spec_type' => '类型',
            'spec_memo' => '规格备注',
            'spec.spec_value' => '规格值',
            'sort_order' => '排序',
            'disabled' => '禁用',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('spec_id', $this->spec_id);
        $criteria->compare('spec_name', $this->spec_name, true);
        $criteria->compare('spec_show_type', $this->spec_show_type, true);
        $criteria->compare('spec_type', $this->spec_type, true);
        $criteria->compare('spec_memo', $this->spec_memo, true);
        $criteria->compare('sort_order', $this->sort_order);
        $criteria->compare('disabled', $this->disabled, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getShowType() {
        if ($this->spec_show_type == 'select') {
            echo '下拉';
        } elseif ($this->spec_show_type == 'flat') {
            echo '平铺';
        }
    }

    public function getType() {
        if ($this->spec_type == 'text') {
            echo '文字';
        } elseif ($this->spec_type == 'image') {
            echo '图片';
        }
    }

    public function getDisabled() {
        if ($this->disabled == 'false') {
            echo '否';
        } elseif ($this->disabled == 'true') {
            echo '是';
        }
    }

    /*
     * 循环遍历SpecValue[spec_value][]插入数据库
     * 群Zend Framework(95700611) zwp(279795206)友情提示
     */

    public function setSpecValues($SpecValues) {
        $db = Yii::app()->db;
        $db->createCommand()->delete('{{spec_values}}', 'spec_id = :spec_id', array(
            ':spec_id' => $this->spec_id));

        if ($SpecValues['spec_value'] != '') {
            for ($i = 0; $i < count($SpecValues['spec_value']); $i++) {
                $db->createCommand()->insert('{{spec_values}}', array(
                    'spec_id' => $this->spec_id,
                    'spec_value' => $SpecValues['spec_value'][$i],
                    'spec_image' => $SpecValues['spec_image'][$i],
                    'sort_order' => $SpecValues['sort_order'][$i],
                ));
            }
        }
    }

    public function getSpecValues() {
        $cri = new CDbCriteria(array(
                    'condition' => 'spec_id =' . $this->spec_id,
                    'order' => 'sort_order asc, spec_value_id asc'
                ));
        $SpecValues = SpecValue::model()->findAll($cri);

        foreach ($SpecValues as $sv) {
            echo $sv->spec_value.',';
        }
    }

}