<?php


class TinyMceElFinder extends TinyMceFileManager
{
    public $settings = array();
    public $connectorRoute = false;
    private $assetsDir;

    private $_id;
    private static $_counter = 0;

    public function init()
    {
        $dir = dirname(__FILE__) . '/assets';
        $this->assetsDir = Yii::app()->assetManager->publish($dir);
        $cs = Yii::app()->getClientScript();

        if(Yii::app()->getRequest()->enableCsrfValidation){
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

    public function getId()
    {
        if ($this->_id !== null)
            return $this->_id;
        else
            return $this->_id = 'elfd' . self::$_counter++;
    }

    public function getFileBrowserCallback()
    {
        $connectorUrl = $this->settings['url'];
        $id = $this->getId();
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
                        aWin.document.forms[0].elements[aFieldName].value = url;
                        if (type == "image" && aFieldName=="src" && aWin.ImageDialog.showPreviewImage)
                            aWin.ImageDialog.showPreviewImage(url);
                    }';
        $settings['closeOnEditorCallback'] = true;

        $settings = CJavaScript::encode($settings);
        $script=<<<JS
        function(field_name, url, type, win) {
            var aFieldName = field_name, aWin = win;
            var el = $("#$id");
            if(el.length == 0) {
                el = $("<div/>").attr("id", "$id");
                $("body").append(el);
                el.elfinder($settings);
            }
            else {
                el.elfinder("open","$connectorUrl");
            }
        }
JS;
        return 'js:' . $script;
    }
}
