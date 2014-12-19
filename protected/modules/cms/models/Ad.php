<?php

/**
 * This is the model class for table "{{flash_ad}}".
 *
 * The followings are the available columns in table '{{flash_ad}}':
 * @property integer $id
 * @property string $title
 * @property string $pic
 * @property string $url
 * @property integer $sort_order
 */
class Ad extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @return FlashAd the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{ad}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, pic, theme, sort_order, pic', 'required'),
            array('sort_order', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 100),
            array('url', 'length', 'max' => 50),
            array('content', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id,theme, title, pic, url, sort_order', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => '标题',
            'pic' => '图片',
            'url' => 'Url地址',
            'theme' => '主题',
            'content' => '内容',
            'sort_order' => '排序',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('pic', $this->pic, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('theme', $this->theme);
        $criteria->compare('sort_order', $this->sort_order);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * 得到图片地址
     * @return type
     */
    public function getImagePath()
    {
        return '/upload/ad/' . $this->pic;
    }

    /**
     * 得到图片URL
     * @return type
     */
    public function getImageUrl()
    {
        return F::baseUrl() . $this->getImagePath();
    }

    /**
     * 得到HolderJs
     * @param type $width
     * @param type $height
     * @return type
     */
    public function getHolderJs($width = '150', $height = '150', $text = 'No Picture')
    {
        return 'holder.js/' . $width . 'x' . $height . '/text:' . $text;
    }

    /**
     * 得到图片图像
     * @return type
     */
    public function getImage()
    {
        $img = $this->getImagePath();

        if (file_exists(dirname(F::basePath()) . $img)) {
            $img_thumb = F::baseUrl() . ImageHelper::thumb(990, 486, $img, array('method' => 'resize'));
            $img_thumb_now = CHtml::image($img_thumb, $this->title);
            return CHtml::link($img_thumb_now, $this->url, array('title' => $this->title));
        } else {
            return CHtml::link(CHtml::image($this->getHolderJs('990', '486')), $this->url, array('title' => $this->title));
        }
    }

    public function defaultScope()
    {
        if(Yii::app()->theme->name != 'backend')
        {
            return array(
                'condition' => "t.theme = '" . Yii::app()->theme->name . "'",
                'order' => 't.sort_order',
            );
        }
        else
        {
            return array(
                'order' => 't.sort_order',
            );
        }
    }
}