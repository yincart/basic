<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>true,
)); ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'author'); ?>
<!--		--><?php //echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128,'value'=>Yii::app()->user->name)); ?>
<!--		--><?php //echo $form->error($model,'author'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'email'); ?>
<!--		--><?php //echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'value'=>Yii::app()->user->email)); ?>
<!--		--><?php //echo $form->error($model,'email'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'url'); ?>
<!--		--><?php //echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
<!--		--><?php //echo $form->error($model,'url'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'content'); ?>
<!--		--><?php //echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
<!--		--><?php //echo $form->error($model,'content'); ?>
<!--	</div>-->

<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?>
<!--	</div>-->

    <div style="border-top:3px solid darkgray;height:auto; background:#ffffff;padding:0 20px;"> <!--留言板-->

        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">姓名：*</label>
                <div class="col-sm-10">
                    <?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128,'value'=>Yii::app()->user->name)); ?><?php echo $form->error($model,'author'); ?>
                </div>
            </div>
            <div class="form-group" style="margin-top: 15px">
                <label for="inputPassword3" class="col-sm-2 control-label">邮箱：*</label>
                <div class="col-sm-10">
                    <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?><?php echo $form->error($model,'email'); ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">评论内容：*</label>
                <div class=" col-sm-10">
                    <textarea style="height: 100px;" id="a123"<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?><?php echo $form->error($model,'content'); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-sm-10">
                    <button class="btn btn-danger col-sm-offset-3 " id="submit-comment" style="width:100px;height:30px; font-size:16px;padding:2px 20px;font-family:'楷体' "><?php echo ($model->isNewRecord ? '发表评论' : 'Save'); ?></button>
                </div>
            </div>
        </form>

        <div class="col-xs-12" style="margin-top:50px; border-top: 2px dotted darkgray;"><!--评论列表-->
<!--            <ul id="comments-list" >-->
<!--                <li class="clearfix" id="copy">-->
<!--                    <div style="border-bottom: 1px solid gray; height: 100px;">-->
<!--                        <div class="col-xs-2 pull-left" style="text-align:center;vertical-align: middle;">-->
<!--                            <img src="http://avatar.csdn.net/B/3/2/3_wuyuanjingni.jpg">-->
<!--                        </div>-->
<!--                        <div class="col-xs-10 pull-right">-->
<!--                            <h4 style="color: red" id="author">demo:</h4>-->
<!--                            <p id="author-comment">-->
<!--                                这篇文献不错 ，讲得很有理！！赞一个！-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </li>-->
<!---->
<!---->
<!--            </ul>-->
<!--            <ul class="pagination pull-right" id="news-pag-two">-->
<!--                <li><a href="#">&laquo;</a></li>-->
<!--                <li><a href="#">1</a></li>-->
<!--                <li><a href="#">2</a></li>-->
<!--                <li><a href="#">3</a></li>-->
<!---->
<!--                <li><a href="#">&raquo;</a></li>-->
<!--            </ul>-->
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
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->