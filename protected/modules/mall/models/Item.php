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
 * @property string $props
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
class Item extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Item the static model class
     */
    public static function model($className = __CLASS__) {
	return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
	return '{{item}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
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
	    array('click_count, create_time, update_time', 'length', 'max' => 11),
	    array('skus, props, props_name, item_imgs, prop_imgs, desc', 'safe'),
	    // The following rule is used by search().
	    // Please remove those attributes that should not be searched.
	    array('item_id, category_id, title, sn, unit, stock, min_number, market_price, shop_price, currency, skus, props, props_name, item_imgs, prop_imgs, pic_url, desc, location, post_fee, express_fee, ems_fee, is_show, is_promote, is_new, is_hot, is_best, is_discount, click_count, sort_order, create_time, update_time, language', 'safe', 'on' => 'search'),
	);
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
	// NOTE: you may need to adjust the relation name and the related
	// class name for the relations automatically generated below.
	return array(
	    'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
	    'image' => array(self::HAS_MANY, 'ItemImg', 'item_id'),
	    'type' => array(self::BELONGS_TO, 'ItemType', 'type_id'),
	);
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
	return array(
	    'item_id' => 'ID',
	    'category_id' => '分类',
	    'category.name' => '分类',
	    'type_id' => '商品类型',
	    'title' => '商品标题',
	    'sn' => '商品货号',
	    'unit' => '计量单位',
	    'stock' => '库存',
	    'min_number' => '最少订货量',
	    'market_price' => '零售价',
	    'shop_price' => '批发价',
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
    public function search() {
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

    public function getShow() {
	echo $this->is_show == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getPromote() {
	echo $this->is_promote == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getNew() {
	echo $this->is_new == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getHot() {
	echo $this->is_hot == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getBest() {
	echo $this->is_best == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getDiscount() {
	echo $this->is_discount == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
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

    /**
     * 得到商品标题
     * @return type
     */
    public function getTitle() {
	return CHtml::link(F::msubstr($this->title, '0', '40', 'utf-8'), array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
    }

    /**
     * 得到商品URL地址
     * @return string the URL that shows the detail of the item
     */
    public function getUrl() {
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
     * 得到购物收藏按钮
     * @return type
     */
    public function getBtnList() {
	return CHtml::textField('qty', $this->min_number, array('style' => 'width:20px', 'size' => '2', 'maxlength' => '5', 'id' => 'qty_' . $this->item_id)) . '&nbsp;'
		. CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/btn_buy.gif'), '#', array('id' => 'btn-buy-' . $this->item_id, 'onclick' => 'fastBuy(this, ' . $this->item_id . ', $("#qty_' . $this->item_id . '").val())'
		))
		. '&nbsp;' . CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/btn_addwish.gif'), '#', array('id' => 'btn-addwish-' . $this->item_id, 'onclick' => 'addWish(this, ' . $this->item_id . ')'
	));
    }

    /**
     * 得到商品主图路径
     * @return type
     */
    public function getMainPicPath() {
	$images = ItemImg::model()->findAllByAttributes(array('item_id' => $this->item_id));
	foreach ($images as $k => $v) {
	    if ($v['position'] == 0) {
		return '/upload/item/image/' . $v['url'];
	    }
	}
    }

    /**
     * 得到商品主图Url地址
     * @return type
     */
    public function getMainPicUrl() {
	$img = $this->getMainPicPath();
	if (file_exists(dirname(F::basePath()) . $img)) {
	    return F::baseUrl() . $this->getMainPicPath();
	} else {
	    return $this->getHolderJs('350', '350');
	}
    }

    /**
     * 得到HolderJs
     * @param type $width
     * @param type $height
     * @return type
     */
    public function getHolderJs($width = '150', $height = '150', $text = 'No Picture') {
	return 'holder.js/' . $width . 'x' . $height . '/text:' . $text;
    }

    /**
     * 得到商品主图
     * @return type
     */
    public function getMainPic() {
	$img = $this->getMainPicPath();
	if (file_exists(dirname(F::basePath()) . $img)) {
	    $img_thumb = F::baseUrl() . ImageHelper::thumb(310, 310, $img, array('method' => 'resize'));
	    $img_thumb_now = CHtml::image($img_thumb, $this->title);
	    return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
	} else {
	    return CHtml::link(CHtml::image($this->getHolderJs('310', '310')), $this->getUrl(), array('title' => $this->title));
	}
    }

    /**
     * 得到商品小图，显示于购物车中
     * @return type
     */
    public function getSmallThumb() {
	$img = $this->getMainPicPath();
	if (file_exists(dirname(F::basePath()) . $img)) {
	    $img_thumb = F::baseUrl() . ImageHelper::thumb(50, 50, $img, array('method' => 'resize'));
	    $img_thumb_now = CHtml::image($img_thumb, $this->title);
	    return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
	} else {
	    return CHtml::link(CHtml::image($this->getHolderJs('50', '50')), $this->getUrl(), array('title' => $this->title));
	}
    }

    /**
     * 得到商品推荐缩略图
     * @return type
     */
    public function getRecommendThumb() {
	$img = $this->getMainPicPath();
	if (file_exists(dirname(F::basePath()) . $img)) {
	    $img_thumb = F::baseUrl() . ImageHelper::thumb(80, 80, $img, array('method' => 'resize'));
	    $img_thumb_now = CHtml::image($img_thumb, $this->title);
	    return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
	} else {
	    return CHtml::link(CHtml::image($this->getHolderJs('80', '80')), $this->getUrl(), array('title' => $this->title));
	}
    }

    /**
     * 得到商品列表缩略图
     * @return type
     */
    public function getListThumb() {
	$img = $this->getMainPicPath();
	if (file_exists(dirname(F::basePath()) . $img)) {
	    $img_thumb = F::baseUrl() . ImageHelper::thumb(150, 150, $img, array('method' => 'resize'));
	    $img_thumb_now = CHtml::image($img_thumb, $this->title);
	    return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
	} else {
	    return CHtml::link(CHtml::image($this->getHolderJs('150', '150')), $this->getUrl(), array('title' => $this->title));
	}
    }

    /**
     * 得到最近商品缩略图
     * @return type
     */
    public function getRecentThumb() {
	$img = $this->getMainPicPath();
	if (file_exists(dirname(F::basePath()) . $img)) {
	    $img_thumb = F::baseUrl() . ImageHelper::thumb(210, 210, $img, array('method' => 'resize'));
	    $img_thumb_now = CHtml::image($img_thumb, $this->title);
	    return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
	} else {
	    return CHtml::link(CHtml::image($this->getHolderJs('210', '210')), $this->getUrl(), array('title' => $this->title));
	}
    }

}