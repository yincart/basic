///**
// * Created by wucangzhou on 1/6/14.
// *email:1415373197@qq.com
// */
//$(document).ready(function(){
//    var personal_list= $('.personal-list a');
//    $('.personal-center a').mouseover(function(){
//        $(this).addClass('current');
//        personal_list.show();
//    }).mouseout(function(){
//        $(this).removeClass('current');
//        personal_list.hide();
//    });
//    $('.login-nav a').mouseover(function(){
//        $(this).addClass('current');
//    }).mouseout(function(){
//        $(this).removeClass('current');
//    });
//    personal_list.mouseover(function(){
//        $(this).addClass('current');
//        personal_list.show();
//    }).mouseout(function(){
//        $(this).removeClass('current');
//        personal_list.hide();
//    });
//    $('#daohang').hover( function() {
//        $(this).addClass('hover').find('.daohang_box').show();
//    },function() {
//        $(this).removeClass('hover').find('.daohang_box').hide();
//    });
//});

$(document).ready(function(){
    var personal_list= $('.personal-list a');
    $('.personal-center a').on({
        mouseover: function() {
            $(this).addClass('current');
            personal_list.show();
        },
        mouseout: function(){
        $(this).removeClass('current');
        personal_list.hide();
        }
    });

    $('.login-nav a').on({
        mouseover: function(){
        $(this).addClass('current');
        },
        mouseout: function(){
        $(this).removeClass('current');
        }
    });

    personal_list.on({
        mouseover: function(){
        $(this).addClass('current');
        personal_list.show();
        },
        mouseout: function(){
        $(this).removeClass('current');
        personal_list.hide();
        }
    });
    $('#daohang').on({
        mouseover: function(){
        $(this).addClass('hover').find('.daohang_box').show();
    },
        mouseout: function(){
        $(this).removeClass('hover').find('.daohang_box').hide();
    }
    });
});