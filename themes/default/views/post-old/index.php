
<?php
$this->pageTitle = Yii::app()->name;
$this->breadcrumbs = array(
    '新闻列表' => array('/post/index'),
);
?>
<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>


<div class="box" >
    <div class="box-title" style="text-align: left"><a href="/basic/site/index">首页</a>>><a href="/basic/post/index">新闻列表</a></div>

    <div class="box-content" >
        <div class="pull-left" style="height:auto;width:75%;background:white;border-right:2px solid #ececec;">

           <?php if($posts !== null){
               foreach($posts as $post){?>
                <?php
                   $status = intval($post->status);
                   if(Yii::app()->user->isGuest)
                   {
                       if($status < 2 )
                       {
                           continue;
                       }
                   }
                   ?>
            <div class="news-outside">   <!--第一个新闻-->
                <div class="col-xs-3 news-img" >  <!--图片部分-->
                    <img width="150" height="150"  class="attachment-thumbnail wp-post-image" src=<?php echo $post->pic_url;?> >
                </div>
                <div class="col-xs-9 nes-list">
                    <div class="col-xs-12">   <!--新闻标题-->
                        <h4><a href="<?php echo Yii::app()->createUrl('post/view', array('id' => $post->id))?>" class="news-link"><?php echo $post->title;?></a>  </h4>
                    </div>
                    <div class="col-xs-12 news-summary">    <!--摘要-->
                        <p>摘要：<?php echo $post->summary;?><a href="<?php echo Yii::app()->createUrl('post/view', array('id' => $post->id))?>" class="news-link">阅读全文 >></a>
                        </p>
                        <p>发表于:<?php echo date('Y-m-d H:i:s',$post->update_time);?>, 标签：<?php echo $post->tags;?></p>
                    </div>
                </div>
                </div>
            <!--第一个新闻结束-->

            <?php }}?>

            <div class="page_p"><!--分页-->
                <?php if ($pager->pageCount > 1 ) {
                    if ($pager->currentPage == 0 ) {
                        echo '<span class="end"><a href="javascript:void(0)" class="page_p"><img alt="" src=""/>首页</a></a></span>';
                        echo '<span class="end"><a href="javascript:void(0)" class="page_p"><img alt="" src=""/>上一页</a></a></span>';
                    } else {
                        echo '<span><a href="' . Yii::app()->createUrl('post/index', array_merge($_GET, array('page' => 0))) . '" class="page_p"><img alt="" src=""/>首页</a></a></span>';
                        echo '<span><a href="' . Yii::app()->createUrl('post/index', array_merge($_GET, array('page' => $pager->currentPage))) . '" class="page_p"><img alt="" src=""/>上一页</a></a></span>';
                    }
                    for ($i = $pager->currentPage-5; $i < $pager->currentPage+6; $i++) {
                        if($i < 0)
                            continue;
                        if($i >= $pager->pageCount)
                            break;
                        $class = $i == $pager->currentPage ? 'current' : '';
                        echo '<span class="' . $class . '"><a href="' . Yii::app()->createUrl('post/index', array_merge($_GET, array('page' => $i+1))) . '">' . ($i+1) . '</a></span>';
                    }
                    if ($pager->currentPage == $pager->pageCount - 1 ) {
                        echo '<span class="end"><a href="javascript:void(0)" class="page_n"><img alt="" src=""/>下一页</a></a></span>';
                        echo '<span class="end"><a href="javascript:void(0)" class="page_n"><img alt="" src=""/>末页</a></a></span>';
                    } else {

                        echo '<span><a href="' . Yii::app()->createUrl('post/index', array_merge($_GET, array('page' => $pager->currentPage + 2))) . '" class="page_n"><img alt="" src=""/>下一页</a></a></span>';

                        echo '<span><a href="' . Yii::app()->createUrl('post/index', array_merge($_GET, array('page' => $pager->pageCount))) . '" class="page_n"><img alt="" src=""/>末页</a></a></span>';
                    }
                }
                ?>

            </div>

<!--            <div> <!--分页-->
<!--                <ul class="pagination pull-right" id="news-pag">-->
<!--                    <li><a href="#">&laquo;</a></li>-->
<!--                    <li><a href="#">1</a></li>-->
<!--                    <li><a href="#">2</a></li>-->
<!--                    <li><a href="#">3</a></li>-->
<!--                    <li><a href="#">4</a></li>-->
<!--                    <li><a href="#">5</a></li>-->
<!--                    <li><a href="#">&raquo;</a></li>-->
<!--                </ul>-->
<!---->
<!--            </div>-->
        </div>   <!--新闻列表-->



    <div  style="height:auto;padding:10px;width:24%;" class="pull-right">
        <div style="text-align:center"> <h4><b>热点追踪</b></h4>
        </div>
        <ul class=" pull-center" id="news-hot">
            <?php
            $num=0;
              foreach($posts as $post){
                  if($num==5){//限制显示热点新闻条数为5条
                      break;
                  }
               if($posts !== null)
               {
                   ?>
                   <?php
                   $status = intval($post->status);
                   if(Yii::app()->user->isGuest)
                   {
                       if($status < 2 )
                       {
                           continue;
                       }
                   }
                   ?>
            <li><a class="news-link "href="<?php echo Yii::app()->createUrl('post/view', array('id' => $post->id))?>"><?php echo $post->title;?></a></li>
            <?php $num++;}}?>
<!--            <li><a class="news-link" href="/basic/themes/leather/views/post/secondNews.html">如何用PhotoShop制作网站的favicon.ico </a></li>-->
<!--            <li><a class="news-link " href="/basic/themes/leather/views/post/thirdNews.html">	Web 开发者必备的 14 个 JavaScript 音频库</a></li>-->
<!--            <li><a class="news-link  "href="/basic/themes/leather/views/post/forthNews.html">	jquery ajax回调函数中调用$(this)的问题</a></li>-->
<!--            <li><a class="news-link  "href="">......</a></li>-->
<!--            <li><a  class="news-link " href="#">.....</a></li>-->
<!--            <li><a class="news-link " href="#">.....</a></li>-->
        </ul>
    </div>
     </div>