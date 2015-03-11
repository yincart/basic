<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class='row-fluid' id='content-wrapper'>
        <div class='span12'>
            <div class='page-header page-header-with-buttons'>
                <h1 class='pull-left'>
                    <i class='icon-dashboard'></i>
                    <span><?php echo $this->content_title ?></span>
                </h1>
                <div class='pull-right'>
                    <div class='btn-group'>
                        <a class="btn btn-white hidden-phone" href="#">Last month</a>
                        <a class="btn btn-white" href="#">Last week</a>
                        <a class="btn btn-white " href="#">Today</a>
                        <a class="btn btn-white" id="daterange" href="#"><i class='icon-calendar'></i>
                            <span class='hidden-phone'>Custom</span>
                            <b class='caret'></b>
                        </a>
                    </div>
                </div>
            </div>
            <?php echo $content ?>
        </div>
    </div>
<?php $this->endContent(); ?>