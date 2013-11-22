  <div class="main-container col1-layout">
            <div class="main container show-bg">
                                <div class="preface grid-full in-col1"></div>
                <div class="col-main grid-full in-col1">
                                        <div class="account-create">
    <div class="page-title">
        <h1>Create an Account</h1>
    </div>
            <form action="http://ultimo.infortis-themes.com/demo/default/customer/account/createpost/" method="post" id="form-validate">
        <div class="fieldset">
            <input type="hidden" name="success_url" value="">
            <input type="hidden" name="error_url" value="">
            <h2 class="legend">Personal Information</h2>
            <ul class="form-list">
                <li class="fields">
                    <div class="customer-name">
    <div class="field name-firstname">
        <label for="firstname" class="required"><em>*</em>First Name</label>
        <div class="input-box">
            <input type="text" id="firstname" name="firstname" value="" title="First Name" maxlength="255" class="input-text required-entry">
        </div>
    </div>
    <div class="field name-lastname">
        <label for="lastname" class="required"><em>*</em>Last Name</label>
        <div class="input-box">
            <input type="text" id="lastname" name="lastname" value="" title="Last Name" maxlength="255" class="input-text required-entry">
        </div>
    </div>
</div>
                </li>
                <li>
                    <label for="email_address" class="required"><em>*</em>Email Address</label>
                    <div class="input-box">
                        <input type="text" name="email" id="email_address" value="" title="Email Address" class="input-text validate-email required-entry">
                    </div>
                </li>
                                <li class="control">
                    <div class="input-box">
                        <input type="checkbox" name="is_subscribed" title="Sign Up for Newsletter" value="1" id="is_subscribed" class="checkbox">
                    </div>
                    <label for="is_subscribed">Sign Up for Newsletter</label>
                </li>
                                                                                                    </ul>
        </div>
            <div class="fieldset">
            <h2 class="legend">Login Information</h2>
            <ul class="form-list">
                <li class="fields">
                    <div class="field">
                        <label for="password" class="required"><em>*</em>Password</label>
                        <div class="input-box">
                            <input type="password" name="password" id="password" title="Password" class="input-text required-entry validate-password">
                        </div>
                    </div>
                    <div class="field">
                        <label for="confirmation" class="required"><em>*</em>Confirm Password</label>
                        <div class="input-box">
                            <input type="password" name="confirmation" title="Confirm Password" id="confirmation" class="input-text required-entry validate-cpassword">
                        </div>
                    </div>
                </li>
                
<li id="captcha-input-box-user_create">
    <label for="captcha_user_create" class="required"><em>*</em>Please type the letters below</label>
    <div class="input-box captcha">
        <input name="captcha[user_create]" type="text" class="input-text required-entry" id="captcha_user_create">
    </div>
</li>
<li>
    <div class="captcha-image" id="captcha-image-box-user_create">
        <img id="captcha-reload" class="captcha-reload" src="./create_files/reload.png" alt="Reload captcha" onclick="$(&#39;user_create&#39;).captcha.refresh(this)">
        <img id="user_create" class="captcha-img" height="50" src="./create_files/e17a7e19b9b1c8c0efe16951c964374b.png">
            </div>
    <script type="text/javascript">//<![CDATA[
        $('user_create').captcha = new Captcha('http://ultimo.infortis-themes.com/demo/default/captcha/refresh/', 'user_create');
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
        </div>
        <div class="buttons-set">
            <p class="required">* Required Fields</p>
            <p class="back-link"><a href="http://ultimo.infortis-themes.com/demo/default/customer/account/login/" class="back-link"><small>« </small>Back</a></p>
            <button type="submit" title="Submit" class="button"><span><span>Submit</span></span></button>
        </div>
            </form>
    <script type="text/javascript">
    //<![CDATA[
        var dataForm = new VarienForm('form-validate', true);
            //]]>
    </script>
</div>
                </div>
                <div class="postscript grid-full in-col1"></div>
            </div>
        </div>
        