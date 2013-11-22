<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0047)http://ultimo.infortis-themes.com/demo/default/ -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php Yii::app()->controller->widget('comext.seo.widgets.SeoHead',array(
    'httpEquivs'=>array(
        'Content-Type'=>'text/html; charset=utf-8',
        'Content-Language'=>'en-US'
    ),
    'defaultTitle'=>F::sg('seo', 'mainTitle'),
    'defaultDescription'=>F::sg('seo', 'mainDescr'),
    'defaultKeywords'=>F::sg('seo', 'mainKwrds'),
)); ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="robots" content="INDEX,FOLLOW">
<link rel="icon" href="http://ultimo.infortis-themes.com/demo/skin/frontend/ultimo/default/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://ultimo.infortis-themes.com/demo/skin/frontend/ultimo/default/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="http://ultimo.infortis-themes.com/demo/skin/frontend/ultimo/default/apple-touch-icon.png" type="image/png">
<link rel="apple-touch-icon" sizes="72x72" href="http://ultimo.infortis-themes.com/demo/skin/frontend/ultimo/default/apple-touch-icon-72x72.png" type="image/png">
<link rel="apple-touch-icon" sizes="114x114" href="http://ultimo.infortis-themes.com/demo/skin/frontend/ultimo/default/apple-touch-icon-114x114.png" type="image/png">
<!--[if lt IE 7]>
<script type="text/javascript">
//<![CDATA[
var BLANK_URL = 'http://ultimo.infortis-themes.com/demo/js/blank.html';
var BLANK_IMG = 'http://ultimo.infortis-themes.com/demo/js/spacer.gif';
//]]>
</script>
<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo F::themeUrl() ?>/media/main.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo F::themeUrl() ?>/media/other.css" media="print">
<link type="text/css" rel="stylesheet" href="<?php echo F::baseUrl() ?>/css/form.css"/>    
<script type="text/javascript" async="" src="<?php echo F::themeUrl() ?>/media/ga.js"></script>
<script type="text/javascript" src="<?php echo F::themeUrl() ?>/media/prototype.js"></script>
<link href="http://ultimo.infortis-themes.com/demo/default/rss/catalog/new/store_id/1/" title="New Products" rel="alternate" type="application/rss+xml">
<link href="http://ultimo.infortis-themes.com/demo/default/rss/catalog/special/store_id/1/cid/0/" title="Special Products" rel="alternate" type="application/rss+xml">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="http://ultimo.infortis-themes.com/demo/media/css/deec10fc8f3a1907ce7d885da3b68b7a.css" media="all" />
<![endif]-->
<!--[if lt IE 7]>
<script type="text/javascript" src="http://ultimo.infortis-themes.com/demo/media/js/59208060dbe803c9be64d3a034f0e437.js"></script>
<![endif]-->
<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="http://ultimo.infortis-themes.com/demo/media/css/e7d36061a4066a51927b9a44d6d8994c.css" media="all" />
<![endif]-->
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="http://ultimo.infortis-themes.com/demo/media/css/33bac43766cd927fc08d66c224415c2d.css" media="all" />
<![endif]-->

<script type="text/javascript">
//<![CDATA[

var infortisTheme = {};
infortisTheme.responsive = true;
infortisTheme.maxBreak = 1280;

//]]>
</script>
<script type="text/javascript">
//<![CDATA[
Mage.Cookies.path = '/demo';
Mage.Cookies.domain = '.ultimo.infortis-themes.com';
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
optionalZipCountries = ["HK", "IE", "MO", "PA"];
//]]>
</script>
<style type="text/css">
.footer-container
{
    background-image: url(<?php echo F::themeUrl() ?>/media/1.png);
}
</style><script type="text/javascript">//<![CDATA[
var Translator = new Translate([]);
//]]></script>
<link href="<?php echo F::themeUrl() ?>/media/css" rel="stylesheet" type="text/css"/>
</head>
<body class="<?php echo isset($this->breadcrumbs) ? ' cms-page-view cms-about-magento-demo-store ' : 'cms-index-index cms-home'?>  ">
<!-- BEGIN GOOGLE ANALYTICS CODEs -->

<!-- END GOOGLE ANALYTICS CODE -->
<div id="root-wrapper">
<div class="wrapper">
<noscript>
<div class="global-site-notice noscript">
<div class="notice-inner">
<p>
    <strong>JavaScript seems to be disabled in your browser.</strong><br />
    You must have JavaScript enabled in your browser to utilize the functionality of this website.                
</p>
</div>
</div>
</noscript>
<div class="page">
<div class="header-container" id="top">

<?php $this->widget('widgets.ultimo.WTopNav') ?>

<?php $this->widget('widgets.ultimo.WMainMenu') ?>

</div> <!-- end: header-container -->

<?php echo $content ?>

<div class="footer-container">

<?php $this->widget('widgets.ultimo.WFootMenu') ?>

</div> <!-- end: footer-container -->


<script type="text/javascript">
                                //<![CDATA[

                                function setGridItemsEqualHeight($)
                                {
                                    var SPACING = 20;
                                    if ($(window).width() >= 480)
                                    {
                                        $('.category-products-grid').removeClass("auto-height");

                                        var gridItemMaxHeight = 0;
                                        $('.category-products-grid > .item').each(function() {
                                            $(this).css("height", "auto");

                                            ////////////////////////////////////////////////////////////////
                                            var actionsHeight = $(this).find('.actions').height();
                                            $(this).css("padding-bottom", (actionsHeight + SPACING) + "px"); //Set new padding
                                            ////////////////////////////////////////////////////////////////

                                            gridItemMaxHeight = Math.max(gridItemMaxHeight, $(this).height());
                                        });

                                        //Apply max height
                                        $('.category-products-grid > .item').css("height", gridItemMaxHeight + "px");
                                    }
                                    else
                                    {
                                        $('.category-products-grid').addClass("auto-height");
                                        $('.category-products-grid > .item').css("height", "auto");
                                        $('.category-products-grid > .item').css("padding-bottom", "20px");
                                    }
                                }



                                jQuery(function($) {

                                    $('.collapsible').each(function(index) {
                                        $(this).prepend('<span class="opener">&nbsp;</span>');
                                        if ($(this).hasClass('active'))
                                        {
                                            $(this).children('.block-content').css('display', 'block');
                                        }
                                        else
                                        {
                                            $(this).children('.block-content').css('display', 'none');
                                        }
                                    });
                                    $('.collapsible .opener').click(function() {

                                        var parent = $(this).parent();
                                        if (parent.hasClass('active'))
                                        {
                                            $(this).siblings('.block-content').stop(true).slideUp(300, "easeOutCubic");
                                            parent.removeClass('active');
                                        }
                                        else
                                        {
                                            $(this).siblings('.block-content').stop(true).slideDown(300, "easeOutCubic");
                                            parent.addClass('active');
                                        }

                                    });


                                    var ddOpenTimeout;
                                    var dMenuPosTimeout;
                                    $(".clickable-dropdown > .dropdown-toggle").click(function() {
                                        $(this).parent().addClass('open');
                                        $(this).parent().trigger('mouseenter');
                                    });
                                    $(".dropdown").hover(function() {

                                        var DELAY = 300;
                                        var ddToggle = $(this).children('.dropdown-toggle');
                                        var ddMenu = $(this).children('.dropdown-menu');
                                        var ddWrapper = ddMenu.parent();
                                        ddMenu.css("left", "");
                                        ddMenu.css("right", "");

                                        if ($(this).hasClass('clickable-dropdown'))
                                        {
                                            if ($(this).hasClass('open'))
                                            {
                                                $(this).children('.dropdown-menu').stop(true, true).delay(DELAY).fadeIn(300, "easeOutCubic");
                                            }
                                        }
                                        else
                                        {
                                            clearTimeout(ddOpenTimeout);
                                            ddOpenTimeout = setTimeout(function() {

                                                ddWrapper.addClass('open');

                                            }, DELAY);

                                            //$(this).addClass('open');
                                            $(this).children('.dropdown-menu').stop(true, true).delay(DELAY).fadeIn(300, "easeOutCubic");
                                        }

                                        clearTimeout(dMenuPosTimeout);
                                        dMenuPosTimeout = setTimeout(function() {

                                            if (ddMenu.offset().left < 0)
                                            {
                                                var space = ddWrapper.offset().left;
                                                ddMenu.css("left", (-1) * space);
                                                ddMenu.css("right", "auto");
                                            }

                                        }, DELAY);

                                    }, function() {
                                        var ddMenu = $(this).children('.dropdown-menu');
                                        clearTimeout(ddOpenTimeout);
                                        ddMenu.stop(true, true).delay(150).fadeOut(300, "easeInCubic");
                                        if (ddMenu.is(":hidden"))
                                        {
                                            ddMenu.hide();
                                        }
                                        $(this).removeClass('open');
                                    });



                                    $(".main").addClass("show-bg");



                                    var windowScroll_t;
                                    $(window).scroll(function() {

                                        clearTimeout(windowScroll_t);
                                        windowScroll_t = setTimeout(function() {

                                            if ($(this).scrollTop() > 100)
                                            {
                                                $('#scroll-to-top').fadeIn();
                                            }
                                            else
                                            {
                                                $('#scroll-to-top').fadeOut();
                                            }

                                        }, 500);

                                    });

                                    $('#scroll-to-top').click(function() {
                                        $("html, body").animate({scrollTop: 0}, 600, "easeOutCubic");
                                        return false;
                                    });




                                    var startHeight;
                                    var bpad;
                                    $('.category-products-grid > .item').hover(function() {

                                        startHeight = $(this).height();
                                        $(this).css("height", "auto"); //Release height
                                        $(this).find(".display-onhover").fadeIn(400, "easeInCubic"); //Show elements visible on hover
                                        var h2 = $(this).height();

                                        ////////////////////////////////////////////////////////////////
                                        var addtocartHeight = 0;
                                        var addtolinksHeight = 0;


                                        var addtolinksEl = $(this).find('.add-to-links');
                                        if (addtolinksEl.hasClass("addto-onimage") == false)
                                            addtolinksHeight = addtolinksEl.height();

                                        var h3 = h2 + addtocartHeight + addtolinksHeight;
                                        var diff = 0;
                                        if (h3 < startHeight)
                                        {
                                            $(this).height(startHeight);
                                        }
                                        else
                                        {
                                            $(this).height(h3);
                                            diff = h3 - startHeight;
                                        }
                                        ////////////////////////////////////////////////////////////////

                                        $(this).css("margin-bottom", "-" + diff + "px");
                                    }, function() {

                                        //Clean up
                                        $(this).find(".display-onhover").hide();
                                        $(this).css("margin-bottom", "");

                                        $(this).height(startHeight);

                                    });




                                    //Window size variables
                                    var winWidth = $(window).width();
                                    var winHeight = $(window).height();
                                    var windowResize_t;
                                    $(window).resize(function() {

                                        var winNewWidth = $(window).width();
                                        var winNewHeight = $(window).height();
                                        if (winWidth != winNewWidth || winHeight != winNewHeight)
                                        {

                                            clearTimeout(windowResize_t);
                                            windowResize_t = setTimeout(function() {

                                                $(document).trigger("themeResize");

                                                setGridItemsEqualHeight($);

                                                $('.itemslider').each(function(index) {
                                                    var flex = $(this).data('flexslider');
                                                    if (flex != null)
                                                    {
                                                        flex.flexAnimate(0);
                                                        flex.resize();
                                                    }
                                                });

                                                var slideshow = $('.the-slideshow').data('flexslider');
                                                if (slideshow != null)
                                                {
                                                    slideshow.resize();
                                                }

                                            }, 200); //TODO: choose default value

                                        } //end: if
                                        //Update window size variables
                                        winWidth = winNewWidth;
                                        winHeight = winNewHeight;

                                    }); //end: on resize



                                }); /* end: jQuery(){...} */



                                jQuery(window).load(function() {

                                    setGridItemsEqualHeight(jQuery);

                                }); /* end: jQuery(window).load(){...} */

                                //]]>
</script>
<script type="text/javascript">
    //<![CDATA[

    jQuery(function($) {

        var islider = {config: {elements: ".itemslider-responsive", columnCount: 5, maxBreakpoint: 960, breakpoints: [[1680, 3], [1440, 2], [1360, 1], [1280, 1], [960, 0], [768, -1], [640, -2], [480, -3], [320, -5]]}, init: function(a) {
                $.extend(islider.config, a)
            }, onResize_recalculateAllSliders: function() {
                return islider.recalculateAllSliders(), !1
            }, recalculateAllSliders: function() {
                $(islider.config.elements).each(function() {
                    null != $(this).data("flexslider") && islider.recalcElement($(this))
                })
            }, recalcElement: function(a) {
                var b, c = a.data("breakpoints");
                if (c)
                    b = islider.getMaxItems_CustomBreakpoints(c);
                else {
                    var d = a.data("showItems");
                    void 0 === d && (d = islider.config.columnCount), b = islider.getMaxItems(d)
                }
                a.data("flexslider").setOpts({minItems: b, maxItems: b})
            }, getMaxItems_CustomBreakpoints: function(a) {
                if (infortisTheme.viewportW)
                    var b = infortisTheme.viewportW;
                else
                    var b = $(window).width();
                var c = islider.config.maxBreakpoint;
                "undefined" != typeof infortisTheme && infortisTheme.maxBreak && (c = infortisTheme.maxBreak);
                for (var d, e = 0; a.length > e; e++) {
                    var f = parseInt(a[e][0], 10), g = parseInt(a[e][1], 10);
                    if (d = g, c >= f && b >= f)
                        return d
                }
                return d
            }, getMaxItems: function(a) {
                var b = islider.config.breakpoints;
                if (infortisTheme.viewportW)
                    var c = infortisTheme.viewportW;
                else
                    var c = $(window).width();
                var d = islider.config.maxBreakpoint;
                "undefined" != typeof infortisTheme && infortisTheme.maxBreak && (d = infortisTheme.maxBreak);
                for (var e, f = 0; b.length > f; f++) {
                    var g = parseInt(b[f][0], 10), h = parseInt(b[f][1], 10);
                    if (e = a + h, 0 >= e && (e = 1), d >= g && c >= g)
                        return e
                }
                return e
            }};

        if (typeof infortisTheme !== 'undefined' && infortisTheme.responsive)
        {
            islider.init({elements: '.itemslider-responsive'});
            islider.recalculateAllSliders();
            $(document).on("themeResize", islider.onResize_recalculateAllSliders);
        }

    });

    //]]>
</script>  
</div>
</div>
</div> <!-- end: root-wrapper -->

<?php echo Yii::app()->translate->renderMissingTranslationsEditor(); ?>
</body>
</html>