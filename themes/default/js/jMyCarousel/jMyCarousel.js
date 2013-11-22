/* 
 * 
 * Copyright (c) 2007 e-nova technologies pvt. ltd. (kevin.muller@enova-tech.net || http://www.enova-tech.net)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *            __             ___      ___    __  __     __     
 *          /'__`\    __   /' _ `\   / __`\ /\ \/\ \  /'__`\   
 *         /\  __/  /\__\  /\ \/\ \ /\ \_\ \\ \ \_/ |/\ \_\.\_ 
 *  (o_    \ \____\ \/__/  \ \_\ \_\\ \____/ \ \___/ \ \__/.\_\    _o)
 *  (/)_    \/____/         \/_/\/_/ \/___/   \/__/   \/__/\/_/   _(\)
 *       
 *           Prevents Headaches !  
 * 
 * JMyCarousel is inspired and based on JCarouselLite, an original concept by Ganeshji Marwaha
 *  
 *
 * $LastChangedDate: 2007-06-22 20:08:34 -0500 (Thu, 22 Nov 2007) $
 * $Rev: 15 $
 *
 * Version: 0.1
 */

(function ( $ ) {                  // Compliant with jquery.noConflict()
$.fn.jMyCarousel = function(o) {   
    o = $.extend({
        btnPrev: null,			// previous button customization
        btnNext: null,			// next button customization
        mouseWheel: true,		// shall the carousel handle the mousewheel event to animate ?
        auto: false,			// shall the carousel start automatically

        speed: 500,				// speed in ms of the animation.
        easing: 'linear',		// linear animation.

        vertical: false,		// set the carousel in a vertical mode
        circular: true,			// run in circular mode. Means : images never reach the end.
        visible: '4',			// size of the carousel on the screen. Can be in percent '100%', in pixels '100px', or in images '3' (for 3 images)
        start: 0,				// position in pixels that the carousel shall start at
        scroll: 1,
        
        step: 50,				// value in pixels, or "default"
        eltByElt: false,		// if activated, the carousel will move image by image, not more, not less.
        evtStart : 'mouseover',	// start event that we want for the animation (click, mouseover, mousedown, etc..)
		evtStop : 'mouseout',	// stop event that we want for the animation (blur, mouseout, mouseup, etc..)
        beforeStart: null,		// Not used yet
        afterEnd: null			// Not used yet
    }, o || {});

    return this.each(function() {                           // Returns the element collection. Chainable.   
        var running = false, animCss=o.vertical?"top":"left", sizeCss=o.vertical?"height":"width";
        var div = $(this), ul = $("ul", div), tLi = $("li", ul), tl = tLi.size(), v = o.visible;
        var mousewheelN = 0; // will help for the mousewheel effect (to count how many steps we have to walk ahead)
		var defaultBtn = (o.btnNext === null && o.btnPrev === null) ? true : false;
		var cssU = (v.toString().indexOf("%") != -1 ? '%' : (v.toString().indexOf("px") != -1) ? 'px' : 'el');
		var direction = null; // used to keep in memory in which direction the animation is moving
        
        // circular mode management
        // we add at the end and at the beginning some fake images to make the circular effect more linear, so it never breaks
        // It is still possible to improve the memory management by adding exactly the number of images requested.
        if(o.circular) {
			var imgSet = tLi.clone();
            ul.prepend(imgSet).append(imgSet.clone());
        }
                   
		var li = $("li", ul);								// list       
        div.css("visibility", "visible");
        li.css("overflow", "hidden")                        // If the list item size is bigger than required
            .css("float", o.vertical ? "none" : "left")     // Horizontal list
            .children().css("overflow", "hidden");          // If the item within li overflows its size, hide'em
        if(!o.vertical){ li.css("display", "inline"); }		// IE double margin bug - rooo..
        if(li.children().get(0).tagName.toLowerCase() == 'a' && !o.vertical){
        	li.children().css('float','left');
        }
        if(o.vertical && jQuery.browser.msie){				// Hack IE (again..) / purpose is to cancel the white space below the image when the carousel is in vertical mode
        													// The issue comes up when li is not in float:left. so we put it in float:left and adjust the size
        	li.css('line-height', '4px').children().css('margin-bottom', '-4px');
        }
        

        ul.css("margin", "0")                               // Browsers apply default margin 
            .css("padding", "0")                            // and padding. It is reset here.
            .css("position", "relative")                    // IE BUG - width as min-width
            .css("list-style-type", "none")                 // We dont need any icons representing each list item.
            .css("z-index", "1");                           // IE doesnt respect width. So z-index smaller than div

        div.css("overflow", "hidden")                       // Overflows - works in FF
            .css("position", "relative")                    // position relative and z-index for IE
            .css("z-index", "2")                            // more than ul so that div displays on top of ul
            .css("left", "0px");                            // after creating carousel show it on screen
        
        var liSize = o.vertical ? height(li) : width(li);   // Full li size(incl margin)-Used for animation
        var liSizeV = o.vertical ? elHeight(li) : height(li);	// size of the main layer, in its side          
        var curr = o.start;   								// Current position in pixels  
        var nbAllElts = li.size();							// Total number of items  
        var ulSize = liSize * nbAllElts;                   	// size of full ul(total length, not just for the visible items)
        var nbElts = tl;									// number of elements (only visible items)
        var eltsSize = nbElts * liSize;						// size of the visible elements only
        var allEltsSize = nbAllElts * liSize;				// Total size of the elements
        //var jmcSize = jmcSize();							// Size of the carousel
        var step = o.step == 'default' ? liSize : o.step;	// step size
        
        //debug("liSize=" + liSize + "; liSizeV=" + liSizeV + "; curr=" + curr + "; visible : " + liSize * v); // debug
  		o.btnPrev = defaultBtn ? $('<input type="button" class="' + (o.vertical ? 'up' : 'prev') + '" />') : $(o.btnPrev);
  		o.btnNext = defaultBtn ? $('<input type="button" class="' + (o.vertical ? 'down' : 'next') + '" />') : $(o.btnNext);
        var prev = o.btnPrev;
        var next = o.btnNext;
        
        /******* Buttons **********/
        if(defaultBtn && o.auto !== true){ 					//Add buttons when necessary (In default mode and not auto)
	        prev.css({'opacity':'0.6'});
	        next.css({'opacity' :'0.6'});
	        div.prepend(prev);
	        div.prepend(next);
	        o.btnPrev = prev;
	        o.btnNext = next;
        }
        
        // Element by element management (eltBYElt = true)
        if(o.eltByElt){ 
        	step = liSize;									// the step size is necessarily the size of the element
        	if(o.start % liSize !== 0){						// If a start position was given and was not exactly positionned between 2 images
        		var imgStart = parseInt(o.start / liSize);	// we adjust it
        		curr = o.start = (imgStart * liSize);		// we set the starting position at a fixed point, between 2 images.
        	}
        }
        
        // Adjust the start position in case of circular mode
        if(o.circular){
        	o.start += (liSize * tl);  						// The start position is one carousel length ahead due to the optical effect
        	curr += (liSize * tl);							// used for the animation
        }
        
        // Calculates the size of the main div according to the given size (can be in percent, in value or in pixels)
        var divSize, cssSize, cssUnity;
        if(cssU == '%'){									// in percent 
        	divSize = 0;									// We don't have the value in pixels unless we set the percent value first. So 0, and will catch it later
        	cssSize = parseInt(v);  
       		cssUnity = "%";
        }
        else if(cssU == 'px'){									// in pixels
        	divSize = parseInt(v);
        	cssSize = parseInt(v);
        	cssUnity = "px";
        }
        else{													// in elements (number of elements to display)
        	divSize = liSize * parseInt(v); 
        	cssSize = liSize * parseInt(v);
        	cssUnity = "px";
        }                      								  

		// Adjust the carousel size with the correct values
        //li.css("width", imgSize(li, 'width'))              	// inner li width. this is the box model width
          //.css("height", imgSize(li), 'height');           	// inner li height. this is the box model height
        ul.css(sizeCss, ulSize + "px")                       	// Width of the UL is the full length for all the images
            .css(animCss, -(o.start));                  	 	// Set the starting item
        div.css(sizeCss, cssSize + cssUnity);                	// Width of the DIV. length of visible images
        if(o.vertical && cssUnity == '%'){						// Bugfix - % in vertical mode are badly handled by the browsers
        	var pxsize = ((liSize * nbElts) * (parseInt(v) / 100));
        	div.css(sizeCss,  pxsize + 'px');					// The height of the carousel is based on the visible elements size
        }
        
		if(divSize === 0){										// We didn't have the size in pixels in case of % size. Catch up !
			divSize = div.width();								// The size is simply the calculated size in pixels
		}
		
		// Adjust the height of the carousel (width in vertical mode)
		if(o.vertical){											// vertical mode
		    div.css("width" , liSizeV + 'px');
		    ul.css("width", liSizeV + 'px');
		    li.css('margin-bottom', (parseInt(li.css('margin-bottom')) * 2) + 'px');	// bypass the "margin collapsing" effect by multiplying the margin-bottom by 2 
		    li.eq(li.size() - 1).css('margin-bottom', li.css('margin-top'));			// Last element has to be the right margin since no margin collapse there
		}else{													// horizontal mode
			div.css('height', liSizeV + 'px');
			ul.css('height', liSizeV + 'px');	
		}
								
		// Calculate the number of visible elements inside (in case of size in percent)							
		if(cssU == '%'){
			v = divSize / li.width();						
			if(v % 1 !== 0){ v +=1; }
			v = parseInt(v);
		}
		
		var divVSize = div.height();													// div height
		
		////////////////////////
		// Buttons management //
		////////////////////////
		if(defaultBtn){
			next.css({'z-index':200, 'position':'absolute'});
	        prev.css({'z-index':200, 'position':'absolute'});
			//Positionate the arrows and adjust the arrow images
			if(o.vertical){
	        	prev.css({'width': prev.width(), 'height' : prev.height(), 'top' : '0px', 'left': parseInt(liSizeV / 2) - parseInt(prev.width() / 2) + 'px'});
	        	next.css({'width': prev.width(), 'height' : prev.height(), 'top' : (divVSize - prev.height()) + 'px', 'left' : parseInt(liSizeV / 2) - parseInt(prev.width() / 2) + 'px'});
	        	
	        }
	        else{
	        	prev.css({'left':'0px', 'top': parseInt(liSizeV / 2) - parseInt(prev.height() / 2) + 'px'});
	        	next.css({'right':'0px', 'top': parseInt(liSizeV / 2) - parseInt(prev.height() / 2) + 'px'});
	        }
		}

		// Bind the events with the "previous" button
        if(o.btnPrev){            
            $(o.btnPrev).bind(o.evtStart, function() {
                if(defaultBtn){ o.btnPrev.css('opacity',0.9); }
                running = true;
                direction = 'backward';
                return backward(); 
            });
            
            $(o.btnPrev).bind(o.evtStop, function() {
            	if(defaultBtn){ o.btnPrev.css('opacity',0.6); }
            	running = false; 
            	direction = null;
                return stop(); 
            });
        }
        
        
        // Bind the events with the "next" button
        if(o.btnNext){
			$(o.btnNext).bind(o.evtStart, function() {
				if(defaultBtn){ o.btnNext.css('opacity',0.9); }
				running = true;
				 direction = 'forward';
                return forward(); 
            });
			$(o.btnNext).bind(o.evtStop,function() {
				if(defaultBtn){ o.btnNext.css('opacity',0.6); }
				running = false;
				direction = null;
                return stop(); 
            });
        }
        
       // auto scroll management (auto = true). => launch the animation
	   if(o.auto === true){
	   	 running = true;	
	   	 forward();	
	   }		

		// Mousewheel management	
        if(o.mouseWheel && div.mousewheel){
            div.mousewheel(function(e, d) { 
                if(!o.circular && (d > 0 ? (curr + divSize < ulSize) : (curr > 0)) || o.circular){ //prevents the mouse events to occur in case of circular mode
	                mousewheelN += 1; 				//one more step to do, store it.
	                if(running === false){
	                	if(d > 0){ forward(step, true); }
	                	else { backward(step, true); }
	                	running = true;
	                }
                }
            });
        }
		
		/**
		 * Animate the track by moving it forward according to the step size and the speed
		 * @param stepsize, the size of the step (optional)
		 * @param once, shall the animation continue endlessly until we set running to false ? (optional)
		 */
        function forward(stepsize, once){
    		var s = (stepsize ? stepsize : step);

			if(running === true && direction === "backward"){ return; }
			
    		//If not circular, no need to animate endlessly
    		if(!o.circular){
    			//will the next step overtake the last  image ?
    			if(curr + s + (o.vertical ? divVSize : divSize) > eltsSize){
    				s = eltsSize - (curr + (o.vertical ? divVSize : divSize));
    			}
    		}
    		
    		ul.animate(
                animCss == "left" ? { left: -(curr + s) } : { top: -(curr + s) } , o.speed, o.easing,
                function() {
                	curr += s; //Add step size
                	//Calculate whether we cross the limit,
                	//if so, put the carousel one time backward
                	if(o.circular){
	                	if(curr + (o.vertical ? divVSize : divSize) + liSize >= allEltsSize){
	                    	ul.css(o.vertical ? 'top' : 'left', -curr + eltsSize);
	                    	curr -= eltsSize;
	                    }
                	}
    				
                    if(!once && running){
                    	 forward();
                    }
                    else if(once){
                    	if(--mousewheelN > 0){
                    		this.forward(step, true);
                    	}
                    	else{
                    		 running = false;
                    		 direction = null;
                    	}
                    }
                }
            );
        }
        
        /**
         * Animate the track by moving it backward according to the step size and the speed
         * @param stepsize, the size of the step (optional)
		 * @param once, shall the animation continue endlessly until we set running to false ? (optional)
         */
        function backward(stepsize, once){
    		var s = (stepsize ? stepsize : step);
    		
    		if(running === true && direction === "forward"){ return; } 
    		
    		//If not circular, no need to animate endlessly
    		if(!o.circular){
    			//will the next step overtake the first image ?
    			if(curr - s  < 0){
    				 s = curr - 0;
    			}
    		}
    		
    		ul.animate(
                animCss == "left" ? { left: -(curr - s) } : { top: -(curr - s) } , o.speed, o.easing,
                function() {
                	curr -= s;
                	//Calculate if we cross the limit,
                	//if so, put the carousel one time backward
                    if(o.circular){
	                	if(curr <= liSize){
	                    	ul.css(o.vertical ? 'top' : 'left', -(curr + eltsSize));
	                    	curr += eltsSize;
	                    }
                    }
                    
					if(!once  && running){
						backward();
					}
					else if(once){
	                	if(--mousewheelN > 0){
	                		backward(step, true);
	                	}
	                	else{
	                		 running = false;
	                		 direction = null;
	                	}
                	}
                }
            );
        }
         /**
          * Stops the animation
          * Basically, tells the animation not to continue
          */
        function stop(){
        	if(!o.eltByElt){ 	//If we don't move elements by elements, then we can stop immediately
        		ul.stop(); 		// stop the animation straight
        		curr = 0 - parseInt(ul.css(animCss));	// We stopped suddenly, so the curr variable is not refreshed. We refresh it with the true value
        	}
        	running = false; 	// default value and in case we proceed element by element (eltByElt = true)
        	direction = null;
        }
        
        /**
         * Return the size of the carousel, everything included (height or length depending on o.vertical)
         */
        /*function jmcSize(){
        	var img = $('ul li img', div);
        	var sizeLi = (o.vertical ? img.width() : img.height());
        	var elt = img;
        	while(elt.parent().get(0).tagName.toLowerCase() != 'div'){
        		sizeLi += (o.vertical ? (parseInt(elt.css('marginLeft')) + parseInt(elt.css('marginRight')) + parseInt(elt.css('paddingRight')) + parseInt(elt.css('paddingLeft'))) : (parseInt(elt.css('marginTop')) + parseInt(elt.css('marginBottom')) + parseInt(elt.css('paddingTop')) + parseInt(elt.css('paddingBottom'))));
        		elt = elt.parent();
        	} 
        	return sizeLi;
        }*/
        
        /**
         * Calculate and return the size of the image in the element
         * @param el, the element
         * @param dimension, 'width' or 'height'.
         * @return the requested size in pixels.
         */
        function imgSize(el, dimension){
			if(dimension == 'width'){
				return el.find('img').width();
			}
			else {
				return el.find('img').height();
			}
		}
		
		/**
		 * Size of an element li with its margin calculated from scratch (without any call to width except for the image size)
		 * usefull in case of vertical carousel, when the size of each element is 100%.
		 * @param el, the element
		 * @return the size of the element in pixels
		 */
		function elHeight(el){
			var elImg = el.find('img');
			if(o.vertical){
		    	return parseInt(el.css('margin-left')) + parseInt(el.css('margin-right')) + parseInt(elImg.width()) + parseInt(el.css('border-left-width')) + parseInt(el.css('border-right-width')) + parseInt(el.css('padding-right')) + parseInt(el.css('padding-left'));
			}	
			else{
				return parseInt(el.css('margin-top')) + parseInt(el.css('margin-bottom')) + parseInt(elImg.width()) + parseInt(el.css('border-top-height')) + parseInt(el.css('border-bottom-height')) + parseInt(el.css('padding-top')) + parseInt(el.css('padding-bottom'));
			}
		}
        
        function debug(html){
        	$('#debug').html($('#debug').html() + html + "<br/>");
        } 
        
    });
};

function css(el, prop) {
    return parseInt($.css(el[0], prop)) || 0;
}

function width(el) {
    	return el[0].offsetWidth + css(el, 'marginLeft') + css(el, 'marginRight');
}

function height(el) {
    return el[0].offsetHeight + css(el, 'marginTop') + css(el, 'marginBottom');
}

})(jQuery);