var jbar = (function($) {
	
	var timeout;
	var defaults = {
		background_color 	: '#FFFFFF',
		color 				: '#000',
		position		 	: 'top',
		removebutton     	: true,
		time			 	: 5000	
	};
	var pub = {
		open: function(options){
			var o = $.extend({}, defaults, options);
			if( !$('.jbar').length ){
				timeout = setTimeout('jbar.remove()', o.time);
				var _message_span = $('<span/>').addClass('jbar-content').html(o.message);
				_message_span.css({
					"color" : o.color
					});
				var _wrap_bar;
				(o.position == 'bottom') ? 
				_wrap_bar = $('<div/>').addClass('jbar jbar-bottom'):
				_wrap_bar = $('<div/>').addClass('jbar jbar-top') ;

				_wrap_bar.css({
					"background-color"  : o.background_color
					});
				if(o.removebutton){
					var _remove_cross = $('<a/>').addClass('jbar-cross');
					_remove_cross.click(function(){
						jbar.remove();
					});
					_wrap_bar.append(_remove_cross);
				}
				else{				
					_wrap_bar.css({
						"cursor" : "pointer"
					});
					_wrap_bar.click(function(){
						jbar.remove();
					})
				}	
				_wrap_bar.append(_message_span).hide().appendTo($('body')).fadeIn('fast'); 
			}
		},
		remove: function(){
			if($('.jbar').length){
				clearTimeout(timeout);
				$('.jbar').fadeOut('fast',function(){
					$(this).remove();
				});
			}
		}
		
	}
	return pub;
	
})(jQuery);