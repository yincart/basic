/**
 * Created by ps on 1/3/14.
 */
$(document).ready(function(){
    $('#RegistrationForm_password').keyup(function () {
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");

        if (false == enoughRegex.test($(this).val())) {
            $('.safe_d').show(); //密码小于六位的时候
            $('.safe_c').hide();
            $('.safe_h').hide();
        }
        else if (strongRegex.test($(this).val())) {
            $('.safe_d').hide(); //密码为八位及以上并且字母数字特殊字符三项都包括
            $('.safe_c').hide();
            $('.safe_h').show();
        }
        else if (mediumRegex.test($(this).val())) {
            $('.safe_d').hide(); //密码为七位及以上并且字母、数字、特殊字符三项中有两项，强度是中等
            $('.safe_c').show();
            $('.safe_h').hide();
        }
        else {
            $('.safe_d').show(); //如果密码为6为及以下，就算字母、数字、特殊字符三项都包括，强度也是弱的
            $('.safe_c').hide();
            $('.safe_h').hide();
        }
        return true;
    });

})
