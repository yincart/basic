/**
 * Created by ps on 1/6/14.
 */
$(document).ready(function(){
   $('.personal-center a').mouseover(function(){
        $('.personal-list a').show();
   })
    $('.personal-center a').mouseout(function(){
        $('.personal-list a').hide();
    })
    $('.personal-list a').mouseover(function(){
        $('.personal-list a').show();
    })
    $('.personal-list a').mouseout(function(){
        $('.personal-list a').hide();
    })

})