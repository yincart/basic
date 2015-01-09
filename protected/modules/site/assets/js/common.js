function showPopup(message) {
    var $popup = $('#overlay-popup');

        var html = '<div class="message">' + '<div class="error-message">' + message + '</div>' + '<button id="close" class="btn btn-warning" style="float: right;">确定</button><div style="clear: both"></div>' + '</div>';
        $popup = $('<div id="overlay-popup"><div class="overlay-popup"></div><div class="popup-container">' + html + '<b class="close">X</b></div></div>').appendTo('body')
            .on('click', '.close', function () {
                $(this).parent().parent().hide();
            }).on('click','#close',function(){
                $(this).parent().parent().parent().hide();
            });
}