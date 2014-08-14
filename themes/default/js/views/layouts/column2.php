<?php $this->beginContent('/layouts/main'); ?>
    <div class="container" style="overflow: hidden">
        <div class="grid_18 alpha">
            <div id="content">
                <?php echo $content; ?>
            </div>
            <!-- content -->
        </div>
        <div class="grid_6 omega">
            <div class="box" style="padding: 20px">
                <?php if (!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>

                <?php $this->widget('TagCloud', array(
                    'maxTags' => Yii::app()->params['tagCloudCount'],
                    'htmlOptions' => array('class' => 'box-title')
                )); ?>

            </div>
            <div class="box">
                <?php $this->widget('RecentComments', array(
                    'maxComments' => Yii::app()->params['recentCommentCount'],
                    'htmlOptions' => array('class' => 'box-title')
                )); ?>
            </div>
            <!-- sidebar -->
        </div>
    </div>
<?php $this->endContent(); ?>