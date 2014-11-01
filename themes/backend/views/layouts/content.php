<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class='row-fluid' id='content-wrapper'>
    <div class='span12'>
        <div class='row-fluid'>
            <div class='span12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-table'></i>
                        <!--                    <span>--><?php //echo Yii::app()->params['content_title']?><!--</span>-->
                        <span><?php echo $this->content_title ?></span>
                    </h1>
                    <div class='pull-right'>

                        <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                        'links' => $this->breadcrumbs,
                        'homeLabel'=>"<i class='icon-bar-chart'></i>"
                        ));
                        ?>
                            <!-- breadcrumbs -->
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class='row-fluid'>
            <div class="span10">
                <?php echo $content; ?>
            </div>
            <div class="span2">
                <?php
                $this->widget('bootstrap.widgets.TbNav', array(
                'type' => TbHtml::NAV_TYPE_LIST,
                'items' => $this->menu,
                ));
                ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>