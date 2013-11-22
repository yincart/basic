      <div class="main-container col1-layout">
            <div class="main container show-bg">
                                <div class="preface grid-full in-col1"></div>
                <div class="col-main grid-full in-col1">
                                        <div class="account-login clearer">
    <div class="page-title">
        <h1>Login or Create an Account</h1>
    </div>
        
    
    <form action="http://ultimo.infortis-themes.com/demo/default/customer/account/loginPost/" method="post" id="login-form">
        <div class="new-users grid12-6">
            <div class="content">
                <h2>New Customers</h2>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
            </div>
            <div class="buttons-set">
                <button type="button" title="Create an Account" class="button" onclick="window.location=<?php echo Yii::app()->createUrl('/user/registration')?>"><span><span>Create an Account</span></span></button>
            </div>
        </div>
        <div class="registered-users grid12-6">
            <div class="content">
                <h2>Registered Customers</h2>
                <p>If you have an account with us, please log in.</p>
                <ul class="form-list">
                    <li>
                        <label for="email" class="required"><em>*</em>Email Address</label>
                        <div class="input-box">
                            <input type="text" name="login[username]" value="" id="email" class="input-text required-entry validate-email" title="Email Address">
                        </div>
                    </li>
                    <li>
                        <label for="pass" class="required"><em>*</em>Password</label>
                        <div class="input-box">
                            <input type="password" name="login[password]" class="input-text required-entry validate-password" id="pass" title="Password">
                        </div>
                    </li>
                    
<li id="captcha-input-box-user_login">
    <label for="captcha_user_login" class="required"><em>*</em>Please type the letters below</label>
    <div class="input-box captcha">
        <input name="captcha[user_login]" type="text" class="input-text required-entry" id="captcha_user_login">
    </div>
</li>
<li>
    <div class="captcha-image" id="captcha-image-box-user_login">
        <img id="captcha-reload" class="captcha-reload" src="./login_files/reload.png" alt="Reload captcha" onclick="$(&#39;user_login&#39;).captcha.refresh(this)">
        <img id="user_login" class="captcha-img" height="50" src="./login_files/18c502716a18e12e14a767265cb33cbd.png">
            </div>
    <script type="text/javascript">//<![CDATA[
        $('user_login').captcha = new Captcha('http://ultimo.infortis-themes.com/demo/default/captcha/refresh/', 'user_login');
    //]]></script>
</li>

                                    </ul>
                

<script type="text/javascript">
//<![CDATA[
    function toggleRememberMepopup(event){
        if($('remember-me-popup')){
            var viewportHeight = document.viewport.getHeight(),
                docHeight      = $$('body')[0].getHeight(),
                height         = docHeight > viewportHeight ? docHeight : viewportHeight;
            $('remember-me-popup').toggle();
            $('window-overlay').setStyle({ height: height + 'px' }).toggle();
        }
        Event.stop(event);
    }

    document.observe("dom:loaded", function() {
        new Insertion.Bottom($$('body')[0], $('window-overlay'));
        new Insertion.Bottom($$('body')[0], $('remember-me-popup'));

        $$('.remember-me-popup-close').each(function(element){
            Event.observe(element, 'click', toggleRememberMepopup);
        })
        $$('#remember-me-box a').each(function(element) {
            Event.observe(element, 'click', toggleRememberMepopup);
        });
    });
//]]>
</script>
                <p class="required">* Required Fields</p>
            </div>
            <div class="buttons-set">
                <a href="http://ultimo.infortis-themes.com/demo/default/customer/account/forgotpassword/" class="f-left">Forgot Your Password?</a>
                <button type="submit" class="button" title="Login" name="send" id="send2"><span><span>Login</span></span></button>
            </div>
        </div>
            </form>
    <script type="text/javascript">
    //<![CDATA[
        var dataForm = new VarienForm('login-form', true);
    //]]>
    </script>
</div>
                </div>
                <div class="postscript grid-full in-col1"></div>
            </div>
        </div>