<?php

/**
 * WTranslate widget
 * 
 * Registers a javascript module that will handle specified translations. Links
 * are automatically handled by fancybox.
 * 
 * It also makes sure the plugins required to work with are also registered.
 * 
 * @author Antonio Ramirez 
 * @link http://www.ramirezcobos.com 
 * 
 * 
 * THIS SOFTWARE IS PROVIDED BY THE CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */
class WTranslate extends CWidget {

	/**
	 *
	 * @var string $title the title to be displayed on the widget
	 */
	public $title;

	/**
	 *
	 * @var array the translations array. Its format must be:
	 * <pre>
	 * $t = array(array('ref'=>'id_of_source','text'=>'message','url'=>'ajaxedcontentURL'));
	 * </pre>
	 */
	public $translations = array();

	/**
	 * Widget init method
	 */
	public function init()
	{
		if (null === $this->title)
			$this->title = 'Translations for \"' . Yii::app()->getLanguage() . '\"';
	}

	/**
	 * Widget run method
	 */
	public function run()
	{
		$this->registerScripts();
	}

	/**
	 * Registers the module
	 */
	public function registerScripts()
	{

		$translations = function_exists('json_encode') ? json_encode($this->translations) : CJSON::encode($this->translations);
		$js = <<<EOD
		var wtranslate = (function($){
			var open = false;
			var l = null;
			var t = {$translations};
			var pub = {
				msg: function(o){
					if(jbar) {jbar.open(o);}
				},
				add: function(col, obj){
					var li = $('<li/>').addClass('item');
					var div = $('<div/>').text(obj.text);
					var a = $('<a/>',{class: 'wtranslate fancybox.ajax', id:'wt-'+obj.ref, href: obj.url}).text('edit');
					
					var span = $('<span/>').append(a);
					div.append(span);
					li.append(div);
					
					$('ul',col).append(li);
					col.show();
				},
				update: function (f) 
				{
					var data = f.serialize();
					$.ajax({
						url: f.attr('action'),
						data: data,
						dataType: 'json',
						type: 'post',
						success: function(d){
							if(typeof d == 'object')
							{
								var a = $('#wt-'+d.id);
								if(a.length){
									a.closest('div').addClass('edited');
								}
								jbar.open(d);
							}
						}
					});
					$.fancybox.close();
				},
				buildLinks: function() {
					var cnt = 1;
					for(i=0; i<t.length; i++)
					{
						
						this.add($('.col'+cnt, l), t[i]);
						if(++cnt > 3) {cnt = 1;}
					}
				},
				buildSlider: function(){
					l = $('<div/>').attr('id','wtranslator-footerSlideContainer');
					var button = $('<div/>').attr('id','wtranslator-footerSlideButton');
					var content = $('<div/>').attr('id','wtranslator-footerSlideContent');
					var text = $('<div/>').attr('id','wtranslator-footerSlideText');
					text.html("\
					<h3>{$this->title}</h3>\
					<div id='one-true'>\
						<div class='col col1'><ul></ul></div>\
						<div class='col col2'><ul></ul></div>\
						<div class='col col3'><ul></ul></div>\
					</div>");
					content.append(text);
					l.append(button,content);
					$('body').append(l);
				},
				init: function(){
					//if( !t.length ) return; /* no missing translations? what do you wish to do?*/
					this.buildSlider();
					this.buildLinks();
					$(".wtranslate").fancybox({
						maxWidth	: 800,
						maxHeight	: 600,
						minWidth	: 800,
						fitToView	: false,
						width		: '70%',
						height		: '70%',
						autoSize	: false,
						closeClick	: false,
						openEffect	: 'none',
						closeEffect	: 'none',
						afterShow	: function(){
							$('.wtranslate-wysiwyg').wysiwyg({initialContent:''});
						}
					});
					$('#wtranslator-footerSlideButton').on('click',function(){
						var content = $('#wtranslator-footerSlideContent');
						var w = $('#wtranslator-footerSlideText').height() + 50;
						if(content.is(':animated'))
							return false;

						if(content.hasClass('footerSlideVisible')){
							content.animate({ height: '0px' }).removeClass('footerSlideVisible').addClass('footerSlideHidden');
							$(this).css('backgroundPosition', 'top left');
						}
						else {
							content.animate({ height: w+'px' }).removeClass('footerSlideHidden').addClass('footerSlideVisible');
							$(this).css('backgroundPosition', 'bottom left');
						}
						return false;
					});
					$(document).on('click', '.translate-buttons > a', function() {
						var action = $(this).attr('rel');
						if(action=='submit')
						{
							var frm = $('.translate-form > form');
							wtranslate.update(frm);
						}
						else if(action=='close')
						{
							$.fancybox.close();
						}
						return false;
					});
				}
			};
			
			return pub;
			
		})(jQuery);
EOD;
		$assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/assets');

		$cs = Yii::app()->clientScript;
		
		/* widget js files */
		$cs->registerCoreScript('jquery');
		$cs->registerScript(__CLASS__ . 'EndJS', $js, CClientScript::POS_END);

		/* fancybox files */
		$cs->registerCssFile($assets . '/fancybox/source/jquery.fancybox.css');
		$cs->registerScriptFile($assets . '/fancybox/source/jquery.fancybox.pack.js', CClientScript::POS_END);

		/* jwysiwyg files */
		$cs->registerCssFile($assets . '/jwysiwyg/jquery.wysiwyg.css');
		$cs->registerScriptFile($assets . '/jwysiwyg/jquery.wysiwyg.js', CClientScript::POS_END);
		$cs->registerScriptFile($assets . '/jwysiwyg/controls/wysiwyg.link.js', CClientScript::POS_END);
		$cs->registerScriptFile($assets . '/jwysiwyg/controls/wysiwyg.table.js', CClientScript::POS_END);

		/* modified jbar files */
		$cs->registerCssFile($assets . '/jbar/css/jbar.style.css');
		$cs->registerScriptFile($assets . '/jbar/jquery.bar.js', CClientScript::POS_END);


		/* widget style files */
		$cs->registerCssFile($assets . '/wtranslator.style.css');

		/* init the module on document ready */
		$cs->registerScript('WTranslateReadyJS', 'wtranslate.init();', CClientScript::POS_READY);
	}

}