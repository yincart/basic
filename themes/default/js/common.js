/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function isLogin(){
    if(UserId==null || UserId==''){
        return false;
    }
    return true;
}

//Yii技术互助平台(80196965)何去飞(6413994)友情提示
//http://stackoverflow.com/questions/370359/passing-parameters-to-a-jquery-function
//立刻购买
function fastBuy(obj, item_id, qty){
    $.ajax({
        type:"POST",
        dataType:"html",
        url:SITE_URL+"/cart/addCart",
        data:"item_id="+item_id+"&qty="+qty,
        complete:function(){
            location.href = SITE_URL+"/cart"
        }
    })
}
//加入收藏
function addWish(obj, item_id){
    if(!isLogin()){
        showLoginDialog();
        return;
    }
    $.ajax({
        type:"POST",
        dataType:"html",
        url:SITE_URL+"/member/wishlist/addWish",
        data:"item_id="+item_id,
        success: function(){
            alert("收藏成功！");
        },
        error: function(){
            alert("已经收藏！");
        }
    })
}
function showLoginDialog(){
    var html='<div class="dialog"><div class="dialog_title_bar"><div class="dialog_t_1">登录会员中心：</div><div class="dialog_t_2"><img src="'+SITE_URL+'/images/x.png" onclick="closeLoginDialog()" align="absmiddle"/></div></div><div class="dialog_body"><table width="100%" border="0" style="float:left;"><tr><td width="8%" height="23" align="right">用 户 名：</td><td width="8%" ><input type="text" name="username" id="username"><a href="/user/registration.html"> 注册新会员</a></td></tr><tr><td align="right">登录密码：</td><td><input type="password" id="password" name="password">&nbsp;<a href="/user/recovery/recovery.html">忘记密码？</a></td></tr><tr><td colspan="2" align="center"><img  src="'+SITE_URL+'/images/loginBtn.gif" onclick="miniLogin()" id="dialog_sub_btn" style="cursor:pointer"></td></tr></table></div></div>';
	
    var width=350;
    var height=200;
    $.blockUI({
        message:html,
        css:{
            padding:0,
            margin:0,
            top:($(window).height()-width)/2+'px',
            left:($(window).width()-height)/2+'px',
            width:width+'px',
            height:height+'px',
            cursor:'normal',
            textAlign:'left',
            color:'#000'
        },
        overlayCSS:{
            backgroundColor:'#000',
            opacity:0.6
        }
    });
    $('#password').bind('keyup',function(event){
        if(event.keyCode==13){
            miniLogin()
        }
    });
}
function closeLoginDialog(){
    $.unblockUI();
}
function miniLogin(){
    var username = $("#username").val();
    var password = $("#password").val();
	
    var validCode = '';
	
    var msg = '';

    if (username.length == 0)
    {
        msg += '用户名不能为空。\n';
        $('#username').focus();
    }

    if (password.length == 0)
    {
        msg +=   '密码不能为空。\n';
        $('#password').focus();
    }
  
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        $('.userLogin').block({ 
            message: "&nbsp;&nbsp;<img src='"+SITE_URL+"/images/loading.gif' align='absmiddle'/>", 
            css: {
                backgroundColor:'',
                border: '0px solid #a00'
            } , 
            overlayCSS:  {
                backgroundColor: '#333',
                opacity:         '0.4'
            }
        });
        //登录
        //	Ajax.call('/user/login', 'username=' + username + '&password=' + encodeURIComponent(password) + '&captcha=' + validCode, signinResponsei, "POST", "JSON");
        $.ajax({
            type:"POST",
            dataType:"html",
            url:SITE_URL+"/user/login",
            data:"UserLogin[username]="+username+"&UserLogin[password]="+password,
            success:function(result){
                $.unblockUI();
                $.growlUI('登录提示：', '<img src="'+SITE_URL+'/images/yes.png" align="absmiddle">&nbsp;登录成功!'); 
                location.href = RETURN_URL;
            }
        })
        return false;
    }
}
function signinResponsei(result){
    if(result.error>0){
        alert(result.message);
    }
    else{
        $.unblockUI();
        $.growlUI('登录提示：', '<img src="'+SITE_URL+'/images/yes.png" align="absmiddle">&nbsp;登录成功!'); 
    }
	
}
function chooseThisSize(obj, name, store, indexId){
    $("#attributes li").each(function (index, domEle) {
        if(domEle.className!='nocm'){
            domEle.className='cm';
        }
	     
    });
    $('#IndexId').val(indexId);
    obj.className = 'cm2';
    $('#selectedSize').html(name);
}