<?php
$this->pageTitle = Yii::app()->name . ' - 产品视频';
$this->breadcrumbs = array(
    '产品视频'
);
?>
<div class="box">
    <div class="box-title">皮雕产品相关视频：</div>
    <div class="box-content">
        <?php foreach ($models as $v): ?>
            <div class="span4" style="margin-bottom: 10px">
                <div>
                    <?php echo CHtml::link($v->title, array('/video/view', 'id'=>$v->id)) ?>
                </div>
                <div>
                    <object width="370" height="300"
                            type="video/x-ms-asf" url="<?php echo $v->url ?>" data="<?php echo $v->url ?>"
                            classid="CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6">
                        <param name="url" value="<?php echo $v->url ?>">
                        <param name="filename" value="<?php echo $v->url ?>">
                        <param name="autostart" value="1">
                        <param name="uiMode" value="full">
                        <param name="autosize" value="1">
                        <param name="playcount" value="1">
                        <embed type="application/x-mplayer2" src="<?php echo $v->url ?>" width="370" height="300"
                               autostart="false" showcontrols="true"
                               pluginspage="http://www.microsoft.com/Windows/MediaPlayer/"></embed>
                    </object>
                </div>
                <div>
                    作者：<?php echo $v->author ?> 发布时间：<?php echo F::date($v->create_time) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div style="text-align: center">
    <?php $this->widget('CLinkPager', array(
        'pages' => $pages,
    )) ?>
</div>

