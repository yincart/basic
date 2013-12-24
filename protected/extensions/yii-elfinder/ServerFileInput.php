<?php

class ServerFileInput extends CInputWidget
{
    public $settings = array();
    public $connectorRoute = false;
    private $assetsDir;

    public function init()
    {
        $dir = dirname(__FILE__) . '/assets';
        $this->assetsDir = Yii::app()->assetManager->publish($dir);
        $cs = Yii::app()->getClientScript();

        if (Yii::app()->getRequest()->enableCsrfValidation) {
            $csrfTokenName = Yii::app()->request->csrfTokenName;
            $csrfToken = Yii::app()->request->csrfToken;
            Yii::app()->clientScript->registerMetaTag($csrfToken, 'csrf-token');
            Yii::app()->clientScript->registerMetaTag($csrfTokenName, 'csrf-param');
        }

        // jQuery and jQuery UI
        $cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
//        $cs->registerCssFile($this->assetsDir . '/smoothness/jquery-ui-1.8.21.custom.css');
//        $cs->registerCssFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/smoothness/jquery-ui.css');
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('jquery.ui');
//        $cs->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js');

        // elFinder CSS
        $cs->registerCssFile($this->assetsDir . '/css/elfinder.css');

        // elFinder JS
        if (YII_DEBUG) {
            $cs->registerScriptFile($this->assetsDir . '/js/elfinder.full.js');
        } else {
            $cs->registerScriptFile($this->assetsDir . '/js/elfinder.min.js');
        }
        // elFinder translation
        $langs = array('bg', 'jp', 'sk', 'cs', 'ko', 'th', 'de', 'lv', 'tr', 'el', 'nl', 'uk',
            'es', 'no', 'vi', 'fr', 'pl', 'zh_CN', 'hr', 'pt_BR', 'zh_TW', 'hu', 'ro', 'it', 'ru');
        $lang = Yii::app()->language;
        if (!in_array($lang, $langs)) {
            if (strpos($lang, '_')) {
                $lang = substr($lang, 0, strpos($lang, '_'));
                if (!in_array($lang, $langs)) $lang = false;
            } else {
                $lang = false;
            }
        }
        if ($lang !== false)
            $cs->registerScriptFile($this->assetsDir . '/js/i18n/elfinder.' . $lang . '.js');

        // set required options
        if (empty($this->connectorRoute))
            throw new CException('$connectorRoute must be set!');
        $this->settings['url'] = Yii::app()->createUrl($this->connectorRoute);
        $this->settings['lang'] = Yii::app()->language;
    }

    public function run()
    {
        list($name, $id) = $this->resolveNameID();
        if (isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;
        if (isset($this->htmlOptions['name']))
            $name = $this->htmlOptions['name'];
        else
            $this->htmlOptions['name'] = $name;

        $contHtmlOptions = $this->htmlOptions;
        $contHtmlOptions['id'] = $id . 'container';
        echo CHtml::openTag('div', $contHtmlOptions);
        $inputOptions = array('id' => $id, 'style' => 'float:left;' /*, 'readonly' => 'readonly'*/);
        if ($this->hasModel()) {
//            echo CHtml::activeTextField($this->model, $this->attribute, $inputOptions);
            echo CHtml::activeHiddenField($this->model, $this->attribute, $inputOptions);
            echo CHtml::image($this->model->{$this->attribute}, 'pic', array('id' => $id . '_img', 'style' => 'height:60px'));
        } else {
//            echo CHtml::textField($name, $this->value, $inputOptions);
            echo CHtml::hiddenField($name, $this->value, $inputOptions);
        }

        echo CHtml::button('Browse', array('id' => $id . 'browse', 'class' => 'btn'));
        echo CHtml::closeTag('div');

        $settings = array_merge(array(
                'places' => "",
                'rememberLastDir' => false,),
            $this->settings
        );

        $settings['dialog'] = array(
            'zIndex' => 400001,
            'width' => 900,
            'modal' => true,
            'title' => "Files",
        );
        $settings['editorCallback'] = 'js:function(url) {
        $(\'#\'+aFieldId).attr(\'value\',url);
        }';
        $settings['closeOnEditorCallback'] = true;
        $connectorUrl = CJavaScript::encode($this->settings['url']);
        $settings = CJavaScript::encode($settings);
        $script = <<<EOD
        window.elfinderBrowse = function(field_id, connector) {
            var aFieldId = field_id, aWin = this;
            if($("#elFinderBrowser").length == 0) {
                $("body").append($("<div/>").attr("id", "elFinderBrowser"));
                var settings = $settings;
                settings["url"] = connector;
                $("#elFinderBrowser").elfinder(settings);
            }
            else {
                $("#elFinderBrowser").elfinder("open", connector);
            }
        }
EOD;
        $cs = Yii::app()->getClientScript();
        $cs->registerScript('ServerFileInput#global', $script);

        $js = //'$("#'.$id.'").focus(function(){window.elfinderBrowse("'.$name.'")});'.
            '$("#' . $id . 'browse").click(function(){window.elfinderBrowse("' . $id . '", ' . $connectorUrl . ')});';


        $cs->registerScript('ServerFileInput#' . $id, $js);
    }

}
