<?php $this->beginContent('/layouts/main'); ?>
    <div class="col-lg-12">
        <?php if (isset($this->breadcrumbs)): ?>
            <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            ));
            ?><!-- breadcrumbs -->
        <?php endif ?>
    </div>
    <div class="clear"></div>
    <div class="col-lg-8">
        <div id="content">
            <?php echo $content; ?>
        </div>
        <!-- content -->
    </div>
    <div class="col-lg-4">
        <div class="box">
            <div class="box-title">用户菜单</div>
            <div class="box-content">
                <?php if (!Yii::app()->user->isGuest) $this->widget('widgets.default.WUserMenu'); ?>
            </div>
        </div>
        <div class="box">
            <div class="box-title">标签云</div>
            <div class="box-content">
                <?php $this->widget('widgets.default.WTagCloud', array(
                    'maxTags' => Yii::app()->params['tagCloudCount'],
                )); ?>
            </div>
        </div>
        <div class="box">
            <div class="box-title">最新评论</div>
            <div class="box-content">
                <?php $this->widget('widgets.default.WRecentComments', array(
                    'maxComments' => Yii::app()->params['recentCommentCount'],
                )); ?>
            </div>
        </div>
        <!-- sidebar -->
    </div>

<?php $this->endContent(); ?>