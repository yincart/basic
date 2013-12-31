$(document).ready(function () {

    $('#add_goods').click(function () {
        showPopup($(this).data('url'));
    });

    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('order-grid', {
            data: $(this).serialize()
        });
        return false;
    });
});
function showPopup(url) {
    var $popup = $('#overlay-popup');
    if ($popup.length) { // if popup has existed, use it
        $popup.show();
    } else { // if popup has not been created, create it
        $popup = $('<div id="overlay-popup"><div class="overlay-popup"></div><div class="popup-container"><b class="close">X</b><iframe class="popup-iframe" src="' + url + '"></iframe></div></div>').appendTo('body')
            .on('click', '.close', function () {
                $(this).parent().parent().hide();
            });
    }
}