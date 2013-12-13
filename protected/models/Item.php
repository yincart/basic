<?php

/**
 * This is the model class for table "{{item}}".
 *
 * The followings are the available columns in table '{{item}}':
 * @property string $item_id
 * @property string $category_id
 * @property string $title
 * @property string $sn
 * @property string $unit
 * @property integer $stock
 * @property string $min_number
 * @property string $market_price
 * @property string $shop_price
 * @property string $currency
 * @property string $skus
 * @property string $skus_data
 * @property string $props
 * @property string $props_data
 * @property string $props_name
 * @property string $item_imgs
 * @property string $prop_imgs
 * @property string $pic_url
 * @property string $desc
 * @property string $location
 * @property string $post_fee
 * @property string $express_fee
 * @property string $ems_fee
 * @property integer $is_show
 * @property integer $is_promote
 * @property integer $is_new
 * @property integer $is_hot
 * @property integer $is_best
 * @property integer $is_discount
 * @property string $click_count
 * @property integer $sort_order
 * @property string $create_time
 * @property string $update_time
 * @property string $language
 */
class Item extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Item the static model class
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
        return '{{item}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, min_number, desc, language, category_id', 'required'),
            array('type_id, stock, is_show, is_promote, is_new, is_hot, is_best, is_discount, sort_order', 'numerical', 'integerOnly' => true),
            array('category_id, market_price, shop_price, post_fee, express_fee, ems_fee', 'length', 'max' => 10),
            array('title, pic_url', 'length', 'max' => 255),
            array('sn', 'length', 'max' => 60),
            array('unit, currency', 'length', 'max' => 20),
            array('min_number', 'length', 'max' => 100),
            array('location, language', 'length', 'max' => 45),
            array('item_id, click_count, create_time, update_time', 'length', 'max' => 11),
            array('item_id, skus, skus_data, props, props_data, props_name, item_imgs, prop_imgs, desc', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('item_id, category_id, title, sn, unit, stock, min_number, market_price, shop_price, currency, skus,skus_data, props, props_data,props_name, item_imgs, prop_imgs, pic_url, desc, location, post_fee, express_fee, ems_fee, is_show, is_promote, is_new, is_hot, is_best, is_discount, click_count, sort_order, create_time, update_time, language', 'safe', 'on' => 'search'),
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
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
            'image' => array(self::HAS_MANY, 'ItemImg', 'item_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'item_id' => 'ID',
            'category_id' => '分类',
            'category.name' => '分类',
            'type_id' => '类型',
            'title' => '标题',
            'sn' => '货号',
            'unit' => '计量单位',
            'stock' => '库存',
            'min_number' => '最少订货量',
            'market_price' => '建议零售价',
            'shop_price' => '分销价',
            'currency' => '货币',
            'skus' => '库存量单位',
            'props' => '商品属性',
            'props_name' => '商品属性名称',
            'item_imgs' => '图片集',
            'prop_imgs' => '属性图片集',
            'pic_url' => '主图',
            'desc' => '商品描述',
            'location' => '商品所在地',
            'post_fee' => '平邮费用',
            'express_fee' => '快递费用',
            'ems_fee' => 'Ems 费用',
            'is_show' => '上架',
            'is_promote' => '促销',
            'is_new' => '新品',
            'is_hot' => '热卖',
            'is_best' => '精品',
            'is_discount' => '会员打折',
            'click_count' => '浏览次数',
            'sort_order' => '排序',
            'create_time' => '上架时间',
            'update_time' => '更新时间',
            'language' => '语言',
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
        $criteria->order = 'item_id desc, sort_order asc';

        $criteria->compare('item_id', $this->item_id, true);
        $criteria->compare('category_id', $this->category_id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('sn', $this->sn, true);
        $criteria->compare('unit', $this->unit, true);
        $criteria->compare('stock', $this->stock);
        $criteria->compare('min_number', $this->min_number, true);
        $criteria->compare('market_price', $this->market_price, true);
        $criteria->compare('shop_price', $this->shop_price, true);
        $criteria->compare('currency', $this->currency, true);
        $criteria->compare('skus', $this->skus, true);
        $criteria->compare('skus_data', $this->skus_data, true);
        $criteria->compare('props', $this->props, true);
        $criteria->compare('props_data', $this->props_data, true);
        $criteria->compare('props_name', $this->props_name, true);
        $criteria->compare('item_imgs', $this->item_imgs, true);
        $criteria->compare('prop_imgs', $this->prop_imgs, true);
        $criteria->compare('pic_url', $this->pic_url, true);
        $criteria->compare('desc', $this->desc, true);
        $criteria->compare('location', $this->location, true);
        $criteria->compare('post_fee', $this->post_fee, true);
        $criteria->compare('express_fee', $this->express_fee, true);
        $criteria->compare('ems_fee', $this->ems_fee, true);
        $criteria->compare('is_show', $this->is_show);
        $criteria->compare('is_promote', $this->is_promote);
        $criteria->compare('is_new', $this->is_new);
        $criteria->compare('is_hot', $this->is_hot);
        $criteria->compare('is_best', $this->is_best);
        $criteria->compare('is_discount', $this->is_discount);
        $criteria->compare('click_count', $this->click_count, true);
        $criteria->compare('sort_order', $this->sort_order);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('language', $this->language, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function ownerSearch()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        //$criteria->condition = 'user_id =' . Yii::app()->user->id;
        $criteria->order = 'item_id desc, sort_order asc';

        $criteria->compare('item_id', $this->item_id, true);
        $criteria->compare('category_id', $this->category_id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('sn', $this->sn, true);
        $criteria->compare('unit', $this->unit, true);
        $criteria->compare('stock', $this->stock);
        $criteria->compare('min_number', $this->min_number, true);
        $criteria->compare('market_price', $this->market_price, true);
        $criteria->compare('shop_price', $this->shop_price, true);
        $criteria->compare('currency', $this->currency, true);
        $criteria->compare('skus', $this->skus, true);
        $criteria->compare('props', $this->props, true);
        $criteria->compare('props_name', $this->props_name, true);
        $criteria->compare('item_imgs', $this->item_imgs, true);
        $criteria->compare('prop_imgs', $this->prop_imgs, true);
        $criteria->compare('pic_url', $this->pic_url, true);
        $criteria->compare('desc', $this->desc, true);
        $criteria->compare('location', $this->location, true);
        $criteria->compare('post_fee', $this->post_fee, true);
        $criteria->compare('express_fee', $this->express_fee, true);
        $criteria->compare('ems_fee', $this->ems_fee, true);
        $criteria->compare('is_show', $this->is_show);
        $criteria->compare('is_promote', $this->is_promote);
        $criteria->compare('is_new', $this->is_new);
        $criteria->compare('is_hot', $this->is_hot);
        $criteria->compare('is_best', $this->is_best);
        $criteria->compare('is_discount', $this->is_discount);
        $criteria->compare('click_count', $this->click_count, true);
        $criteria->compare('sort_order', $this->sort_order);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('language', $this->language, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getShow()
    {
        echo $this->is_show == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getPromote()
    {
        echo $this->is_promote == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getNew()
    {
        echo $this->is_new == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getHot()
    {
        echo $this->is_hot == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getBest()
    {
        echo $this->is_best == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getDiscount()
    {
        echo $this->is_discount == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_time = $this->update_time = time();
                //$this->user_id = Yii::app()->user->id;
            } else
                $this->update_time = time();
            return true;
        } else
            return false;
    }

    /**
     * get item title
     * @return string
     */
    public function getTitle()
    {
        return CHtml::link(F::msubstr($this->title, '0', '15', 'utf-8'), array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
    }

    /**
     * 得到商品URL地址
     * @return string the URL that shows the detail of the item
     */
    public function getUrl()
    {
        if (F::utf8_str($this->title) == '1') {
            $title = str_replace('/', '-', $this->title);
        } else {
            $pinyin = new Pinyin($this->title);
            $title = $pinyin->full2();
            $title = str_replace('/', '-', $title);
        }
        return Yii::app()->createUrl('item/view', array(
            'id' => $this->item_id,
            'title' => $title,
        ));
    }

    /**
     * @return string
     */
    public function getBtnList()
    {
        return CHtml::textField('qty', $this->min_number, array('style' => 'width:20px', 'size' => '2', 'maxlength' => '5', 'id' => 'qty_' . $this->item_id)) . '&nbsp;'
        . CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/btn_buy.gif'), '#', array('id' => 'btn-buy-' . $this->item_id, 'onclick' => 'fastBuy(this, ' . $this->item_id . ', $("#qty_' . $this->item_id . '").val())'
        ))
        . '&nbsp;' . CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/btn_addwish.gif'), '#', array('id' => 'btn-addwish-' . $this->item_id, 'onclick' => 'addWish(this, ' . $this->item_id . ')'
        ));
    }

    /**
     * get main picture path
     * @return string
     * @author milkyway(yhxxlm@gmail.com)
     */
    public function getMainPicPath()
    {
        $images = ItemImg::model()->findAllByAttributes(array('item_id' => $this->item_id));
        foreach ($images as $k => $v) {
            if ($v['position'] == 0) {
                return '/upload/item/image/' . $v['url'];
            }
        }
    }

    /**
     * get main picture original path
     * @return string
     * @author milkyway(yhxxlm@gmail.com)
     */
    public function getMainPicOriginalPath()
    {
        $images = ItemImg::model()->findAllByAttributes(array('item_id' => $this->item_id));
        foreach ($images as $k => $v) {
            if ($v['position'] == 0) {
                return dirname(F::basePath()) . '/upload/item/image/' . $v['url'];
            }
        }
    }

    /**
     * get main picture url
     * @return string
     * @author milkyway(yhxxlm@gmail.com)
     */
    public function getMainPicUrl()
    {
        return F::baseUrl() . $this->getMainPicPath();
    }

    /**
     * get holder js
     * @param string $width
     * @param string $height
     * @param string $text
     * @return string
     * @author milkyway(yhxxlm@gmail.com)
     */
    public function getHolderJs($width = '150', $height = '150', $text = 'No Pic')
    {
        return 'holder.js/' . $width . 'x' . $height . '/text:' . $text;
    }

    /**
     * get item main picture
     * @param string $width
     * @param string $height
     * @return mixed
     * @author milkyway(yhxxlm@gmail.com)
     */
    public function getMainPic($width = '310', $height = '310')
    {
        $img = $this->getMainPicPath();
        if (file_exists($this->getMainPicOriginalPath())) {
            $img_thumb = F::baseUrl() . ImageHelper::thumb($width, $height, $img, array('method' => 'resize'));
            $img_thumb = str_replace('/upload', 'http://' . F::sg('site', 'imageDomain'), $img_thumb);
            $img_thumb_now = CHtml::image($img_thumb, $this->title);
            return CHtml::link($img_thumb_now, $this->getUrl(), array('title' => $this->title));
        } else {
            return CHtml::link(CHtml::image($this->getHolderJs($width, $height)), $this->getUrl(), array('title' => $this->title));
        }
    }

    /**
     * get item image gallery
     * @return array
     * @author milkyway(yhxxlm@gmail.com)
     */
    public function getItemGallery()
    {
        $images = ItemImg::model()->findAllByAttributes(array('item_id' => $this->item_id));
        foreach ($images as $k => $v) {
            $imageList[] = 'http://' . F::sg('site', 'imageDomain') . '/store/' . $v->store_id . '/item/image/' . $v['url'];
        }
        return $imageList;
    }

    /**
     * 分类属性
     *
     * @param int $id 分类ID
     * @param boolean $returnAttr false则返回分类列表，true则返回该对象的分类值
     * @param string $index 结合$returnAttr使用。如果$returnAttr为true，
     *              若指定$index，则返回指定$index对应的值，否则返回当前对象对应的分类值
     * @param int $level 层级
     * @return mixed
     * @author 鸟人(qq:170915870 DavidHHuan@126.com)
     */
    public function attrCategory($id, $returnAttr = false, $index = null, $level = 1)
    {
        $data = array();
        $category = Category::model()->findByPk($id);
        $descendants = $category->descendants()->findAll();
        $data = Category::model()->getSelectOptions($descendants);
        if ($returnAttr && $index && isset($data[$index]))
            $data = $data[$index];
        return $data;
    }

    public function afterSave()
    {
        parent::afterSave();
        $this->addImages();
//        $this->update_props_data();
    }

    /**
     * update props data
     * @author Lonely(qq:81106404)
     */
    public function update_props_data()
    {
        $rawData = CJSON::decode($this->props, true);
        $opids = array();
        $opnames = array();

//        print_r($rawData);

        foreach ($rawData as $k => $v) {
            if (is_array($v)) {

                foreach ($v as $sk => $sv) {
                    $tmpArr = explode(":", $sv);
                    if (count($tmpArr) > 1) {
                        $opids[] = $sv;
                        $opnames[] = self::get_props_values_combine($sv);
                    }
                }


            } else {
                $tmpArr = explode(":", $v);

                if (count($tmpArr) > 1) {
                    $opids[] = $sv;
                    $opnames[] = self::get_props_values_combine($v);
                }
            }

        }

        $props_data = implode(";", $opids);
        $props_name = implode(";", $opnames);

        $sql = 'UPDATE {{item}} SET `props_data`="' . $props_data . '",`props_name`="' . $props_name . '" WHERE item_id=' . $this->item_id;

        Yii::app()->db->createCommand($sql)->execute();


    }

    /**
     * get props values combine
     * @param $arr
     * @return string
     * @author Lonely(qq:81106404)
     */
    public static function get_props_values_combine($arr)
    {
        $op = ItemProp::model()->findByPk($arr[0]);
        $opv = PropValue::model()->findByPk($arr[1]);
        $data = $arr[0] . ":" . $arr[1] . ":" . F::strip_prop_strto_csv($op->prop_name) . ":" . F::strip_prop_strto_csv($opv->value_name);

        return $data;
    }

    /**
     * add images
     * @throws Exception
     * @author milkyway(yhxxlm@gmail.com)
     */
    public function addImages()
    {
        //If we have pending images
        if (Yii::app()->user->hasState('images_' . $_POST['token'])) {
            $userImages = Yii::app()->user->getState('images_' . $_POST['token']);
            //Resolve the final path for our images
//	    $path = Yii::app()->getBasePath() . "/../images/uploads/";
//	    $path = realpath(Yii::app()->getBasePath() . "/../upload/item/image") . "/";
//	    //Create the folder and give permissions if it doesnt exists
//	    if (!is_dir($path)) {
//		mkdir($path);
//		chmod($path, 0777);
//	    }
            //Now lets create the corresponding models and move the files
            foreach ($userImages as $k => $image) {
                if (is_file($image["path"])) {
//		    if (rename($image["path"], $path . $image["url"])) {
//			chmod($path . $image["filename"], 0777);
                    $img = new ItemImg();
//			$img->size = $image["size"];
//			$img->mime = $image["mime"];
//			$img->name = $image["name"];
                    $img->url = $image["url"];
                    $img->item_id = $this->item_id;
                    $img->store_id = $_SESSION['store']['store_id'] ? $_SESSION['store']['store_id'] : 0;
                    $img->position = $k;
                    $img->create_time = time();
                    if (!$img->save()) {
                        //Its always good to log something
                        Yii::log("Could not save Image:\n" . CVarDumper::dumpAsString(
                                $img->getErrors()), CLogger::LEVEL_ERROR);
                        //this exception will rollback the transaction
                        throw new Exception('Could not save Image');
                    }
//		    }
                } else {
                    //You can also throw an execption here to rollback the transaction
                    Yii::log($image["path"] . " is not a file", CLogger::LEVEL_WARNING);
                }
            }
            //Clear the user's session
            Yii::app()->user->setState('images_' . $_POST['token'], null);
        }
    }

}