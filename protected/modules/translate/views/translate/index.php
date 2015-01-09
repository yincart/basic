<?php 
    $language=TranslateModule::translator();
    $languageKey=$language::ID; 
    
    $google=!empty(TranslateModule::translator()->googleApiKey) ? true : false;
?>
<h2><?php echo TranslateModule::t('Translate to {lang}',array('{lang}'=>$language->acceptedLanguages[$language->getLanguage()]));?></h2>
<?php
    if($google){
        echo CHtml::link(TranslateModule::t('Translate all with google translate'),"#",array('id'=>$languageKey."-google-translateall"));
        echo CHtml::script(
            "\$('#{$languageKey}-google-translateall').click(function(){
                var messages=[];\$('.{$languageKey}-google-message').each(function(count){
                    messages[count]=$(this).html();
                });".
                CHtml::ajax(array(
                    'url'=>$this->createUrl('translate/googletranslate'),
                    'type'=>'post',
                    'dataType'=>"json",
                    'data'=>array(
                        'language'=>Yii::app()->getLanguage(),
                        'sourceLanguage'=>Yii::app()->sourceLanguage,
                        'message'=>'js:messages'
                    ),
                    'success'=>"js:function(response){
                        \$('.{$languageKey}-google-translation').each(function(count){
                            $(this).val(response[count]);
                        });
                        \$('.{$languageKey}-google-button,#{$languageKey}-google-translateall').hide();
                    }",
                    'error'=>'js:function(xhr){alert(xhr.statusText);}',
                ))."
                return false;
            });
        ");
        if(Yii::app()->getRequest()->isAjaxRequest){
            echo CHtml::script("
                $('#".$languageKey.'-pager'." a').click(function(){
                    \$dialog=$('#".$languageKey.'-dialog'."').load($(this).attr('href'));
                    return false;
                });
            ");
        }
    }
?>
<div class="form">
    <?php echo CHtml::beginForm(); ?>
    <table>
        <thead>
            <th><?php echo MessageSource::model()->getAttributeLabel('category'); ?></th>
            <th><?php echo MessageSource::model()->getAttributeLabel('message'); ?></th>
            <th><?php echo Message::model()->getAttributeLabel('translation');?></th>
            <?php echo $google ? CHtml::tag('th') : null;?>
        </thead>
        <tbody>
        <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>new CArrayDataProvider($models),
                'pager'=>array(
                    'id'=>$languageKey.'-pager',
                    'class'=>'CLinkPager',
                ),
                'viewData'=>array(
                    'messages'=>$messages,
                    'google'=>$google,
                ),
                'itemView'=>'_form',
            ));
        ?>
        </tbody>
    </table>
    <?php echo CHtml::submitButton(TranslateModule::t('Translate'));?>
    <?php echo CHtml::endForm()?>
</div>