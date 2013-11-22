 _____                    ____                                                   ___  
/\___ \  /'\_/`\         /\  _ `\                                               /\_ \     
\/__/\ \/\      \  __  __\ \ \/\_\     __     _ __   ___   __  __    ____     __\//\ \    
   _\ \ \ \ \__\ \/\ \/\ \\ \ \/_/_  /'__`\  /\`'__\/ __`\/\ \/\ \  /',__\  /'__`\\ \ \   
  /\ \_\ \ \ \_/\ \ \ \_\ \\ \ \L\ \/\ \L\.\_\ \ \//\ \L\ \ \ \_\ \/\__, `\/\  __/ \_\ \_ 
  \ \____/\ \_\\ \_\/`____ \\ \____/\ \__/.\_\\ \_\\ \____/\ \____/\/\____/\ \____\/\____\
   \/___/  \/_/ \/_/`/___/  \\/___/  \/__/\/_/ \/_/ \/___/  \/___/  \/___/  \/____/\/____/   
                       /\___/                                              
                       \/__/                                      

http://www.enova-tech.net/lab/jMyCarousel         

JMyCarousel V-0.1

JMyCarousel is an image carousel written in Javascript and based on the Jquery framework. To make it work you must have a copy of jquery in your website directories. 


### How do I install JMyCarousel ?

Installing JMyCarousel is very easy. Starting from the fact that you already know html and css, you just have to integrate to your web page the JMyCarousel script, and to give it some custom parameters to make it work the way you want it (its size, position, behaviour, etc..). Using JMyCarousel is very simple even though it is highly customizable. JMyCarousel will take care of transforming your html photo presentation into a real dynamic carousel.

Your html code should look like the one below :

   1. <div class="JMyCarousel">  
   2.     <ul>  
   3.         <li><img src="/path_to_the_pictures/1.jpg" width="200" height="150"></li>  
   4.         <li><img src="/path_to_the_pictures/2.jpg" width="200" height="150"></li>  
   5.         <li><img src="/path_to_the_pictures/3.jpg" width="200" height="150"></li>  
   6.         <li><img src="/path_to_the_pictures/4.jpg" width="200" height="150"></li>  
   7.         <li><img src="/path_to_the_pictures/5.jpg" width="200" height="150"></li>  
   8.         <li><img src="/path_to_the_pictures/6.jpg" width="200" height="150"></li>  
   9.   </ul>  
  10. </div>  


You would have noticed that the size of the image must be given. This is to avoid display bugs.

Once you have a proper html code showing your images, you are just two step away.

First, it is necessary to link the page with JQuery, this is the library requested by JMyCarousel. After what we integrate the JMyCarousel script and its css presentation file :

   1. <link rel="stylesheet" type="text/css" href="JMyCarousel.css" />  
   2. <script type="text/javascript" src="jquery.js"></script>  
   3. <script type="text/javascript" src="JMyCarousel.js"></script>  

In this state, the carousel is ready to work. The only missing step is to pass the custom parameters that you wish for your custom carousel. In the example below, we set a carousel with a 100% width and scrolling image by image :

   1. $(function() {  
   2.     $(".JMyCarousel").jMyCarousel({  
   3.         visible: '100%',  
   4.         eltByElt: true  
   5.     });  
   6. });  

If you don't know which parameters are available, you can refer to the documentation.

### What are the available configuration parameters ?

jMyCarousel has a lot of different configuration options :

   btnPrev    : previous button. Can be set outside ot the carousel with $('#layerId') for example.
   btnNext    : next button. Can be set as above
   mouseWheel : mouseWheel activation or not. true or false.
   auto       : whether the carousel must scroll automatically, without arrows. true or false.
   speed      : speed of the animation. value in ms.
   easing     : animation effect. relative to jquery framework.
   vertical   : whether the carousel is displayed horizontally or vertically. true or false.
   circular   : whether the animation must scroll in a cicular way, without stopping. true or false.
   visible    : size of the carousel. 
		'4' would indicate to display 4 elements
		'100px' would indicate to display 100 pixels only
		'100%' would indicate to display the carousel with a 100% width.
   start      : which position in pixels the carousel will start at.
   step       : the step of the animation. value in pixels
   eltByElt   : shall the carousel move element by element, or in a linear way ? true or false.
   evtStart   : event customization : start event. 'mouseover', 'click', etc..
   evtStop    : event customization : stop event. 'mouseout', 'mouseup', etc...

You can have fun playing around with the different options.


### Is it possible to put something else that images in the carousel ?

Not for the moment. The carousel is in its first version, this evolution will come soon, as soon as someone from the enova's team will decide to take time to implement it ;-)
   
   

