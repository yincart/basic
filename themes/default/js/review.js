/**
 * Created by cangzhou.
 * email:wucangzhou@gmail.com
 * Date: 12/17/13
 * Time: 2:47 PM
 */
$(document).ready(function(){
    /***hidden review***/
    $('.btns').on('click',".btn-reply",function(event){
          var data_id=$(event.target).attr('data-id');
          $("[reply-id="+data_id+"]").toggle();
    });
    /***paging ajax*/
    $('.linkPage').on('click',' .yiiPager a',function(){
        var url=$(this).attr('href');
        $('#review').load(url+' #review' );
        return false;
    });
    /****reply review *****/
    $('.reply-input').on('click','.btn-reply-customer',function(event){
        var replyId=$(event.target).attr('data-replyid');
        var text=$(" [replyId="+replyId+"]").val();
        var url=$(" [replyId="+replyId+"]").attr('url');
        $.post(url+'/review/default/replySave',{text:text,customerId:replyId},function(data,status){
            if(status=='success'){
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
                $('.item-reply:first').before(html);
                $(" [replyId="+replyId+"]").val(null);
            }
        });
    });
});