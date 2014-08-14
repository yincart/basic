/**
 * Created by cangzhou.
 * email:wucangzhou@gmail.com
 * Date: 12/17/13
 * Time: 2:47 PM
 */
$(document).ready(function(){
    /**
     * show and hide review content
     * @param options
     * @returns {boolean}
     * @constructor
     */
    $.fn.hideMore = function(options) {
        var defaults = {
            length: 200,
            showMore: "showMore",
            hideMore: "hideMore",
            replace: "..."
        };
        var options = $.extend(defaults, options);
        var objHtml = $(this).html();
        if (objHtml.length > options.length) {
            var preContent = objHtml.substring(0, options.length);
            var lastContent = "<div class='more'>" + objHtml.substring(options.length, objHtml.length) + "</div>";
            var moreLink = "<div class='moreLink'>" + options.showMore + "</div>";
            var newContent = preContent + lastContent + options.replace + moreLink;
            $(this).html(newContent);
            $(".more").css("display", "none");
            $(".moreLink").click(function() {
                if ($(".moreLink").html() == options.showMore) {
                    $(".more").show(1000);
                    $(".moreLink").html(options.hideMore);
                    return false;
                } else {
                    $(".more").hide(900);
                    $(".moreLink").html(options.showMore);
                    return false;
                }
            });
        }
        return false;
    };
    function hideReview(){
        for(var contentId=0;contentId<10;contentId++){
            if($('[content-id="'+String(contentId)+'"]').length){
                $('[content-id="'+String(contentId)+'"]').hideMore({});
            }
        }
    }

    hideReview();
    /***hidden review***/
    $('.tb-revbd').on('click',".btn-reply",function(event){
          var data_id=$(event.target).attr('data-id');
          if(data_id==undefined){
              data_id=$(event.target).parent().attr('data-id');
          }
          $("[reply-id="+data_id+"]").toggle();
    });

    /***paging ajax*/
    $('.tb-revbd').on('click',' .yiiPager a',function(){
        var url=$(this).attr('href');
        $('.tb-revbd').load(url+' .tb-revbd ul' );
        return false;
    });
    /****reply review *****/
    $('.reply-input').on('click','.btn-reply-customer',function(event){
        var replyId=$(event.target).attr('data-replyid');
        var replyListId=$(event.target).attr('reply_list_b_id');
        var text=$(" [replyId="+replyId+"]").val();
        if(text==''){
            alert('can not null');
            return false;
        }
        var url=$('#review').attr('url');
        $.post(url+'/review/default/replySave',{text:text,customerId:replyId},function(data,status){
            if(status=='success'){
                /** * insert user's input   */
                var num=$('[data-id='+replyId+'] em').text();
                num=parseInt(num)+1;
                $('[data-id='+replyId+'] em').text(num);
                var date=new Date();
                var year=date.getFullYear();
                var month=date.getMonth();
                var da=date.getDate();
                var time=date.toLocaleTimeString();
                var timeText=year+'-'+month+'-'+da+' :'+time;
                var html='<div class="item-reply" style="display: block;"><div class="reply-list">  <div class="reply-con"><span class="u-name"><a>您的回复</a>  : </span> <span class="u-con">'+text+'</span><div class="reply-meta"><span class="reply-left f1"> '+timeText+'</span> </div></div> </div></div>';
                $(" [reply_list_id="+replyListId+"]").after(html);
                $(" [replyId="+replyId+"]").val(null);
            }
        });
    });
    $('.reply-input').ajaxError(function(){
        alert('please login');
        return false;
    })


    /**list different kinds of review **/
    $('.tb-long').on('click',".r-c-title",function(event){
        var rating=$(event.target).attr('value');
        var url=$('#review').attr('url');
        var product_id=$('#review').attr('product_id');
        url=url+"/review/default/index?product_id="+product_id+"&&entity_id=1&&rating="+rating;
        $('.tb-revbd').load(url+' .tb-revbd ul','',function(){
            hideReview();
        });
        return false;
    })
});