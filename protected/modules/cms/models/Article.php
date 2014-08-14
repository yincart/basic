<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $article_id
 * @property integer $category_id
 * @property integer $author_id
 * @property string $title
 * @property string $from
 * @property string $content
 * @property integer $views
 * @property integer $create_time
 * @property integer $update_time
 */
class Article extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Article the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{article}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_id, summary, title, content, language', 'required'),
            array('category_id, views', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 250),
            array('from', 'length', 'max' => 200),
            array('pic_url','length','max'=>150),
            array('url', 'url'),
            array('language', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('article_id, category_id, author_id, title, from, content, views, create_time, update_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'author' => array(self::BELONGS_TO, 'AdminUser', 'author_id'),
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
//            'comments' => array(self::HAS_MANY, 'Comment', 'article_id', 'condition' => 'comments.status=' . Comment::STATUS_APPROVED, 'order' => 'comments.create_time DESC'),
//            'commentCount' => array(self::STAT, 'Comment', 'article_id', 'condition' => 'status=' . Comment::STATUS_APPROVED),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'article_id' => 'Article',
            'category_id' => '分类',
            'author_id' => '作者',
            'title' => 'title',
            'language' => 'language',
            'from' => 'from',
            'pic_url'=>'封面图片',
            'summary' => 'summary',
            'content' => 'content',
            'views' => '热度',
            'create_time' => '发布时间',
            'update_time' => '更新时间',
            'category.name' => '分类',
            'author.username' => '作者',
            'url' => '链接'
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

        $criteria->order = 'article_id desc';
        $criteria->compare('article_id', $this->article_id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('author_id', $this->author_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('from', $this->from, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('views', $this->views);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_time = $this->update_time = time();
                $this->author_id = Yii::app()->user->id;
            }
            else
                $this->update_time = time();
            return true;
        }
        else
            return false;
    }

    public function behaviors() {
        return array(
            array(
                'class' => 'ext.seo.behaviors.SeoActiveRecordBehavior',
                'route' => 'article/view',
                'params' => array('id' => $this->article_id, 'title' => $this->title),
            ),
        );
    }

//        public function afterFind() {
//           $retVal = parent::afterSave();
//                $this->create_time=date('m/d/Y', $this->create_time); 
//                if(!is_null($this->update_time)) {
//                        $this->update_time=date('m/d/Y', $this->update_time); 
//                } //EndIf
////                $this->author_id = $this->author->username;
////                $this->category_id = $this->cate->name;
//                return $retVal;
//        }

    /**
     * Adds a new comment to this post.
     * This method will set status and post_id of the comment accordingly.
     * @param Comment the comment to be added
     * @return boolean whether the comment is saved successfully
     */
//    public function addComment($comment) {
//        if (Yii::app()->params['commentNeedApproval'])
//            $comment->status = Comment::STATUS_PENDING;
//        else
//            $comment->status = Comment::STATUS_APPROVED;
//        $comment->article_id = $this->id;
//        return $comment->save();
//    }

    public function getUrl() {
        if (F::utf8_str($this->title) == '1') {
            $title = str_replace('/', '-', $this->title);
        } else {
            $pinyin = new Pinyin($this->title);
            $title = $pinyin->full2();
            $title = str_replace('/', '-', $title);
        }

        return Yii::app()->createUrl('article/view', array(
                    'id' => $this->article_id,
                    'title' => $title,
        ));
    }

}