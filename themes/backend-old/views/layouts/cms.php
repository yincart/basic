<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class='row-fluid' id='content-wrapper'>
    <div class='span12'>
    <div class='row-fluid'>
        <div class='span12'>
            <div class='page-header'>
                <h1 class='pull-left'>
                    <i class='icon-table'></i>
                    <span><?php echo Yii::t('main','Content Category');?></span>
                </h1>
                <div class='pull-right'>

                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                            'links' => $this->breadcrumbs,
                        ));
                        ?>
                        <!-- breadcrumbs -->
                    <?php endif ?>

                    <ul class='breadcrumb'>
                        <li>
                            <a href='index.html'>
                                <i class='icon-bar-chart'></i>
                            </a>
                        </li>
                        <li class='separator'>
                            <i class='icon-angle-right'></i>
                        </li>
                        <li class='active'><?php echo Yii::t('main','Content Category');?></li>
                    </ul>
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