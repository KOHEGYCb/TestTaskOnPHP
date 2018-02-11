<?php

function loginForm($err = '&nbsp;', $login = '') {
    include_once './Strings.php';
    echo 
    '<div class="block_login">
        <h2>Log in</h2>
        <form id="loginForm" action="javascript:void(null);" method="POST" onsubmit="submitLoginForm()">
            <span>Login: </span>    <input id="login" type="text" name="',Strings::$FORM_NAME_LOGIN,'" value="', $login, '"/><br/><br/>
            <span>Password: </span> <input id="password" type="password" name="',Strings::$FORM_NAME_PASSWORD,'"/><br/><br/>
            <p>', $err, '</p>
            <input onclick="btn = 1" class="btn" type="submit" name="btnLogin" value="Log In"/><br>
            <input onclick="btn = 0" class="btn" type="submit" name="btnRegistration" value="Registration"/>
        </form>
    </div>';
}

function homePage() {
    include_once './Strings.php';
    session_start();
    if ($_SESSION[Strings::$FORM_NAME_LOGIN] == NULL) {
        loginForm();
        return;
    } else {    
        echo '  <div class = "block_login">
                    <h2>Hello ', Users::getUserByLogin($_SESSION[Strings::$FORM_NAME_LOGIN])->getName() ,'</h2>
                    <form id = "loginForm" action = "javascript:void(null);" method = "POST" onsubmit = "submitLoginForm()">
                        <input onclick = "btn = 2" class = "btn" type = "submit" name = "btnLogout" value = "Log Out"/><br>
                    </form>
                </div>';
    }
    return;
}

function  registrationForm($err = '&nbsp;') {
    include_once './Strings.php';
    echo '<div class="block_registration">
            <h2>Log in</h2>
            <form id="regForm" action="javascript:void(null);" method="POST" onsubmit="submitRegForm()">
                <span>Login: </span>            <input id="login" type="text" name="',Strings::$FORM_NAME_LOGIN,'"/><br/><br/>
                <span>E-mail: </span>           <input id="email" type="text" name="',Strings::$FORM_NAME_EMAIL,'"/><br/><br/>
                <span>Password: </span>         <input id="password" type="password" name="',Strings::$FORM_NAME_PASSWORD,'"/><br/><br/>
                <span>Confirm password: </span> <input id="confirmPassword" type="password" name="',Strings::$FORM_NAME_CONFIRM_PASSWORD,'"/><br/><br/>                
                <span>Name: </span>             <input id="name" type="text" name="',Strings::$FORM_NAME_NAME,'"/><br/><br/>
                <p>', $err, '</p>
                <input class="btn" type="submit" name="btnRegistration" value="Registration"/>
            </form>
        </div>';
}