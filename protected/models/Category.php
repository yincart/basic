<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 * @property string $name
 * @property string $url
 * @property string $pic
 * @property string $position
 * @property integer $if_show
 * @property string $memo
 */
class Category extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('label, level, if_show', 'numerical', 'integerOnly' => true),
            array('root, lft, rgt', 'length', 'max' => 10),
            array('name', 'length', 'max' => 100),
            array('url', 'length', 'max' => 255),
            array('pic', 'file',
                'types' => 'jpg, gif, png',
                'maxSize' => 1024 * 1024 * 2, // 2MB
                'tooLarge' => '文件超过 2MB. 请上传小一点儿的文件.',
                'allowEmpty' => true,
                'on' => 'create'
            ),
            array('pic', 'file',
                'types' => 'jpg, gif, png',
                'maxSize' => 1024 * 1024 * 2, // 2MB
                'tooLarge' => '文件超过 2MB. 请上传小一点儿的文件.',
                'allowEmpty' => true,
                'on' => 'update'
            ),
            array('position', 'length', 'max' => 45),
            array('memo', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, root, lft, rgt, level, name, url, pic, position, if_show, memo', 'safe', 'on' => 'search'),
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
            'id' => 'ID',
            'root' => 'Root',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'level' => 'Level',
            'name' => '名称',
            'label' => '标签',
            'url' => 'Url',
            'pic' => '图片',
            'position' => '位置',
            'if_show' => '是否显示',
            'memo' => '备注',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('root', $this->root, true);
        $criteria->compare('lft', $this->lft, true);
        $criteria->compare('rgt', $this->rgt, true);
        $criteria->compare('level', $this->level);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('position', $this->position, true);
        $criteria->compare('if_show', $this->if_show);
        $criteria->compare('memo', $this->memo, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array(
            'NestedSetBehavior' => array(
                'class' => 'ext.nested-set-behavior.NestedSetBehavior',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'levelAttribute' => 'level',
                'hasManyRoots' => true,
        ));
    }
    
    public function getThumb() {
        $img_url = '/../../upload/category/' . $this->pic;
        $trueimage = Yii::app()->request->hostInfo.Yii::app()->baseUrl.$img_url;
        if (F::isfile($trueimage)) {
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(750, 368, $img_url, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->name);
        return CHtml::link($img_thumb_now, $this->url, array('title' => $this->name));
        }else{
            return '没有图片';
        }
    }
    
    public function getLabel() {
        if($this->label == '1'){
            echo '<span class="label label-info" style="margin-right:5px">New</span>';
        }elseif($this->label == '2') {
            echo '<span class="label label-important" style="margin-right:5px">Hot!</span>';
        }
    }
    
    public function getChildCount() {
        $category = Category::model()->findByPk($this->id);
        $descendants = $category->children()->findAll();
        return count($descendants);
    }
    
    public function getDescendantsId() {
        $category = Category::model()->findByPk($this->id);
        $descendants = $category->descendants()->findAll();
        foreach($descendants as $descendant){
            $ids[] = $descendant->id;
        }
        $cid = $ids ?  implode(',', $ids) : NULL;
        return $cid;
    }

}