$(window).on("load",function(){
	var sw = $('#styleswitcher'),
		swB = sw.children('.open_sw'),
		layout = $('[class*="_layout"]'),
		sc = $('#select_color'),
		hSelect = $('[name="header_type"]'),
		fSelect = $('[name="footer_type"]'),
		bgSelect = $('select[name="bg_color"]'),
		color = $('.bg_select_color'),
		image = $('.bg_select_image'),
		bgImagebutton = $('.bg_image_button'),
		reset = sw.find('button[type="reset"]');

	var t = setTimeout(function(){
		sw.addClass('closed');	
		clearTimeout(t);
		sw.trigger('open/close');
	},700);

	sw.on('open/close',function(){
		var $this = $(this);
		swB.on('click',function(){
			$this.toggleClass('closed');
		});
	});

	sc.ColorPicker({
		color: '#232830',
		onShow: function (colpkr){
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb){
			$('body').css('background-image','none');
			$('#select_color,body').css('backgroundColor', '#' + hex);
		}
	});

	sw.find('[data-layout]').on('click',function(){
		var self = $(this),
		data = self.data('layout');
		self.addClass('active').siblings('[data-layout]').removeClass('active');
		if(!(self.hasClass('homepage'))){
			switch(data){
				case "wide" :
				 if(layout.hasClass('wide_layout')){
				 	break;
				 }else{
				 	layout.removeClass('boxed_layout').addClass('wide_layout');
				 	$('#go_to_top').addClass('type_2');
				 }
			 	break;
			 	case "boxed" :
			 		if(layout.hasClass('boxed_layout')){
				 		break;
					}else{
						layout.removeClass('wide_layout').addClass('boxed_layout');
						$('#go_to_top').removeClass('type_2');
					}
			 	break;
			}
		}else{
			switch(data){
				case "wide" :
				 	window.location.href = "index_layout_wide.html"
			 	break;
			 	case "boxed" :
			 		window.location.href = "index.html"
			 	break;
			}
		}
	});

	$('.select_list').each(function(){

		var t = $(this).prev('.select_title').text();
		$(this).find('li').each(function(){
			var self = $(this);
			if(self.text() == t){
				self.addClass('active');
			}
		});

	});

	hSelect.prev('.select_list').on('click','li:not(.active)',function(){
		var val = $(this).text(),
			h = $('[role="banner"]');

		$(this).addClass('active').siblings().removeClass('active');

		h.slideUp(function(){
			$(this).html("");
			switch(val){
				case "Header 1" : 
					h.load('inc/header_1.html',function(){
						$(this).removeClass('type_4 type_5').slideDown();
						window.sticky();
						$('#lang_button').css3Animate($('#lang_button').next('.dropdown_list'));
						$('#currency_button').css3Animate($('#currency_button').next('.dropdown_list'));
						window.rmenu();
					});
				break;
				case "Header 2" : 
					h.load('inc/header_2.html',function(){
						$(this).removeClass('type_4').addClass('type_5').slideDown();
						window.sticky();
						$('#lang_button').css3Animate($('#lang_button').next('.dropdown_list'));
						$('#currency_button').css3Animate($('#currency_button').next('.dropdown_list'));
						window.rmenu();
					});
				break;
				case "Header 3" : 
					h.load('inc/header_3.html',function(){
						$(this).removeClass('type_4 type_5').slideDown();
						window.sticky();
						$('#lang_button').css3Animate($('#lang_button').next('.dropdown_list'));
						$('#currency_button').css3Animate($('#currency_button').next('.dropdown_list'));
						window.rmenu();
					});
				break;
				case "Header 4" : 
					h.load('inc/header_4.html',function(){
						$(this).removeClass('type_5').addClass('type_4').slideDown();
						window.sticky();
						$('#lang_button').css3Animate($('#lang_button').next('.dropdown_list'));
						$('#currency_button').css3Animate($('#currency_button').next('.dropdown_list'));
						window.rmenu();
					});
				break;
			}
		});



	});

	fSelect.prev('.select_list').on('click','li:not(.active)',function(){
		var val = $(this).text(),
			h = $('.footer_top_part'),
			body = $('html,body');

		$(this).addClass('active').siblings().removeClass('active');

		h.slideUp(function(){
			$(this).html("");
			switch(val){
				case "Footer 1" : 
					h.load('inc/footer_1.html',function(){
						$(this).removeClass('p_vr_0').closest('#footer').removeClass('type_2');
						$(this).slideDown();
						body.animate({ scrollTop : $(document).height() });
					});
				break;
				case "Footer 2" : 
					h.load('inc/footer_2.html',function(){
						$(this).removeClass('p_vr_0').closest('#footer').addClass('type_2');
						$(this).slideDown();
						body.animate({ scrollTop : $(document).height() });
					});
				break;
				case "Footer 3" : 
					h.load('inc/footer_3.html',function(){
						$(this).addClass('p_vr_0').closest('#footer').removeClass('type_2');
						$(this).slideDown();
						body.animate({ scrollTop : $(document).height() });
					});
				break;
				case "Footer 4" : 
					h.load('inc/footer_4.html',function(){
						$(this).removeClass('p_vr_0').slideDown().closest('#footer').removeClass('type_2');
						body.animate({ scrollTop : $(document).height() });
					});
				break;
				case "Footer 5" : 
					h.load('inc/footer_5.html',function(){
						$(this).addClass('p_vr_0').slideDown().closest('#footer').addClass('type_2');
						body.animate({ scrollTop : $(document).height() });
					});
				break;
			}
		});

	});

	bgSelect.prev('.select_list').on('click','li',function(){
		var val = $(this).text();

		switch(val){

			case "Image" : 
				color.slideUp(function(){
					image.slideDown();
				});
			break;

			case "Color" : 
				image.slideUp(function(){
					color.slideDown();
				});
			break;

		}

	});
	bgImagebutton.each(function(){
		$(this).css('background-image','url('+$(this).data('image')+')');
	});

	bgImagebutton.on('click',function(){
		var bg = $(this).data('image');
		$('body').css('backgroundImage','url('+bg+')');
	});

	reset.on('click',function(){
		var h = $('[role="banner"]'),
			f = $('.footer_top_part');

		$('body,#select_color').css({
			'backgroundImage' : 'none',
			'backgroundColor' : '#232830'
		});

		if(!(sw.find('.homepage').length)){
			layout.removeClass('boxed_layout').addClass('wide_layout');
			sw.find('[data-layout]').removeClass('active').first().addClass('active');
		}

		image.slideUp(function(){
			color.slideDown();
		});

		bgSelect.prevAll(".select_title").text('Color');
		bgSelect.prev('.select_list').children('li').removeClass('active').first().addClass('active');

		
		if(hSelect.prevAll(".select_title").text() !== "Header 1"){
			hSelect.prevAll(".select_title").text('Header 1');
			hSelect.prev('.select_list').children('li').removeClass('active').first().addClass('active');
			h.slideUp(function(){
				$(this).html("");
				h.load('inc/header_1.html',function(){
					$(this).removeClass('type_4').slideDown();
					window.sticky();
					$('#lang_button').css3Animate($('#lang_button').next('.dropdown_list'));
					$('#currency_button').css3Animate($('#currency_button').next('.dropdown_list'));
					$('#shopping_button').css3Animate($('#shopping_button').next('.shopping_cart'));
					window.rmenu();
				});
			});
		}


		if(fSelect.prevAll(".select_title").text() !== "Footer 1"){
			fSelect.prevAll(".select_title").text('Footer 1');
			fSelect.prev('.select_list').children('li').removeClass('active').first().addClass('active');
			f.slideUp(function(){
				$(this).html("");
				f.load('inc/footer_1.html',function(){
					$(this).removeClass('p_vr_0').closest('#footer').removeClass('type_2');
					$(this).slideDown();
				});
			});
		}

	});

	
});