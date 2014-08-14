<?php
/**
 * Created by JetBrains PhpStorm.
 * User: z_bodya
 * Date: 6/20/12
 * Time: 7:41 PM
 * To change this template use File | Settings | File Templates.
 */
class ElFinderWidget extends CWidget
{
    /**
     * Client settings.
     * More about this: https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
     * @var array
     */
    public $settings = array();

    public $connectorRoute = false;
    private $assetsDir;


    public function init()
    {
        $dir = dirname(__FILE__) . '/assets';
        $this->assetsDir = Yii::app()->assetManager->publish($dir);
        $cs = Yii::app()->getClientScript();

        // jQuery and jQuery UI
//        $cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
        $cs->registerCssFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css');
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('jquery.ui');

        // elFinder CSS
        $cs->registerCssFile($this->assetsDir . '/css/elfinder.min.css');
        $cs->registerCssFile($this->assetsDir . '/css/theme.css');

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
        $this->settings['onlyMimes']='image';
        if (Yii::app()->getRequest()->enableCsrfValidation) {
            $this->settings['customData'] = array(Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken);
        }
    }

    public function run()
    {

        $id = $this->getId();
        $settings = CJavaScript::encode($this->settings);
        $customData = isset($this->settings['customData']) ? CJavaScript::encode($this->settings['customData']) : '';
        $cs = Yii::app()->getClientScript();
        $js = <<<EOD
    function getUrlParam(paramName) {
        var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i');
        var match = window.location.search.match(reParam);

        return (match && match.length > 1) ? match[1] : '';
    }

    var funcNum = getUrlParam('CKEditorFuncNum');
    if (funcNum.length) {
        var elf = $('#$id').elfinder({
            url: '{$this->settings['url']}',
            customData: $customData,
            getFileCallback: function (file) {
                window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
                window.close();
            },
            height: "750",
            resizable: false,
        });
    } else {
        var funcNum = getUrlParam('browse');
        if (funcNum.length) {
            var elf = $('#$id').elfinder({
                url: '{$this->settings['url']}',
                customData: $customData,
                getFileCallback: function (file) {
                    window.parent.browse.callFunction(funcNum, file.url)
                    $(window.parent.document.getElementsByClassName('close')).click();
                },
                height: "700",
                resizable: false,
            });
        }
        else {
            var elf = $('#$id').elfinder($settings);
        }
    }
EOD;

        $cs->registerScript("elFinder#$id", $js);
        echo "<div id=\"$id\"></div>";
    }
}
