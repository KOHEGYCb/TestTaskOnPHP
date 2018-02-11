<?php

$params = $_POST;

include './User.php';
include './Users.php';
include './GenerateHTML.php';
include_once './Strings.php';

if ($params[Strings::$FORM_NAME_LOGIN] == '') {
    loginForm(Strings::$ERROR_EMPTY_LOGIN);
    return;
}
if ($params[Strings::$FORM_NAME_PASSWORD] == '') {
    loginForm(Strings::$ERROR_EMPTY_PASSWORD, $params[Strings::$FORM_NAME_LOGIN]);
    return;
}
if (Users::isUserFound($params[Strings::$FORM_NAME_LOGIN])) {
    if (Users::isPasswordValid($params)) {
        session_start();
        $_SESSION[Strings::$FORM_NAME_LOGIN] = $params[Strings::$FORM_NAME_LOGIN];
        homePage();
    } else {
        loginForm(Strings::$ERROR_INVALID_PASSWORD, $params[Strings::$FORM_NAME_LOGIN]);
        return;
    }
} else {
    loginForm(Strings::$ERROR_USER_NOT_FOUND);
    return;
}