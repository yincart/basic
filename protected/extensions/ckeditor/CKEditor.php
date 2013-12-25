<?php
/**
 * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
 */

Class CKEditor extends CInputWidget
{
    const COLS = 40;
    const ROWS = 10;

    public $language = 'en';
    public $contentCSS = '';
    public $width = '100%';
    public $height = '400px';
    public $options = array();
    public $plugins = array();
    public $toolbar = array();
    public $skin = 'moono';
    public $editorTemplate = 'full';

    private $allowedEditorTemplates = array('full', 'basic', 'advanced');

    private $allowedLanguages = array(
        'af', 'ar', 'bg', 'bn', 'bs', 'ca', 'cs', 'da', 'de', 'el', 'en', 'en-au', 'en-ca',
        'en-uk', 'eo', 'es', 'et', 'eu', 'fa', 'fi', 'fo', 'fr', 'fr-ca', 'gl', 'gu', 'he',
        'hi', 'hr', 'hu', 'is', 'it', 'ja', 'km', 'ko', 'lt', 'lv', 'mn', 'ms', 'nb', 'nl',
        'no', 'pl', 'pt', 'pt-br', 'ro', 'ru', 'sk', 'sl', 'sr', 'sr-latn', 'sv', 'th', 'tr',
        'uk', 'vi', 'zh', 'zh-cn'
    );

    private $fontFamilies = array(
        'Arial' => 'Arial, Helvetica, sans-serif',
        'Comic Sans MS' => 'Comic Sans MS, cursive',
        'Courier New' => 'Courier New, Courier, monospace',
        'Georgia' => 'Georgia, serif',
        'Lucida Sans Unicode' => 'Lucida Sans Unicode, Lucida Grande, sans-serif',
        'Tahoma' => 'Tahoma, Geneva, sans-serif',
        'Times New Roman' => 'Times New Roman, Times, serif',
        'Trebuchet MS' => 'Trebuchet MS, Helvetica, sans-serif',
        'Verdana' => 'Verdana, Geneva, sans-serif',
    );

    private $fontSizes = array(
        '8' => '8px', '9' => '9px', '10' => '10px', '11' => '11px',
        '12' => '12px', '14' => '14px', '16' => '16px', '18' => '18px',
        '20' => '20px', '22' => '22px', '24' => '24px', '26' => '26px',
        '28' => '28px', '36' => '36px', '48' => '48px', '72' => '72px'
    );

    public function  __construct($owner = null)
    {
        parent::__construct($owner);
        $this->language = empty(Yii::app()->language) ? $this->language : Yii::app()->language;
    }

    protected function makeOptions()
    {
        list($name, $id) = $this->resolveNameID();

        $options['language'] = $this->language;

        // to make the content look like if it were in your target page
        if ($this->contentCSS !== '') {
            $options['contentsCss'] = $this->contentCSS;
        }

        switch ($this->editorTemplate) {
            case 'full':
                $options['toolbar'] = 'Full';
                break;
            case 'basic':
                $options['toolbar'] = 'Basic';
                break;
            default:
                $options['toolbar'] = $this->toolbar;
        }

        $fontFamilies = '';
        foreach ($this->fontFamilies as $k => $v) {
            $fontFamilies .= $k . '/' . $v . ';';
        }
        $options['font_names'] = $fontFamilies;

        $fontSizes = '';
        foreach ($this->fontSizes as $k => $v) {
            $fontSizes .= $k . '/' . $v . ';';
        }
        $options['fontSize_sizes'] = $fontSizes;

        $options['extraPlugins'] = implode(',', $this->plugins);

        $options['skin'] = $this->skin;

        // here any option is overriden by user's options
        if (is_array($this->options)) {
            $options = array_merge($options, $this->options);
        }

        return CJavaScript::encode($options);
    }

    public function run()
    {
        parent::run();

        list($name, $id) = $this->resolveNameID();

        $baseDir = dirname(__FILE__);
        $assets = Yii::app()->getAssetManager()->publish($baseDir . DIRECTORY_SEPARATOR . 'assets');

        $cs = Yii::app()->getClientScript();

        $cs->registerScriptFile($assets . '/ckeditor.js');

        $this->htmlOptions['id'] = $id;
//        $this->htmlOptions['class'] = 'ckeditor';
        if (!array_key_exists('style', $this->htmlOptions)) {
            $this->htmlOptions['style'] = "width:{$this->width};height:{$this->height};";
        }
        if (!array_key_exists('cols', $this->htmlOptions)) {
            $this->htmlOptions['cols'] = self::COLS;
        }
        if (!array_key_exists('rows', $this->htmlOptions)) {
            $this->htmlOptions['rows'] = self::ROWS;
        }

        $options = $this->makeOptions();

        $js = <<<EOP
CKEDITOR.replace('{$name}',{$options});
EOP;
        $cs->registerScript('Yii.' . get_class($this) . '#' . $id, $js, CClientScript::POS_LOAD);

        if ($this->hasModel()) {
            $html = CHtml::activeTextArea($this->model, $this->attribute, $this->htmlOptions);
        } else {
            $html = CHtml::textArea($name, $this->value, $this->htmlOptions);
        }

        echo $html;

    }
}