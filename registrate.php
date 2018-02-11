<?php

$params = $_POST;

include_once './User.php';
include_once './Users.php';
include_once './GenerateHTML.php';
include_once './Strings.php';

if ($params[Strings::$FORM_NAME_LOGIN] == '') {
    registrationForm(Strings::$ERROR_EMPTY_LOGIN);
    return;
}
if ($params[Strings::$FORM_NAME_EMAIL] == '') {
    registrationForm(Strings::$ERROR_EMPTY_EMAIL);
    return;
}
if ($params[Strings::$FORM_NAME_PASSWORD] == '') {
    registrationForm(Strings::$ERROR_EMPTY_PASSWORD);
    return;
}
if (strcmp($params[Strings::$FORM_NAME_CONFIRM_PASSWORD], $params[Strings::$FORM_NAME_PASSWORD])) {
    registrationForm(Strings::$ERROR_DIFFERENT_PASSWORDS);
    return;
}
if ($params[Strings::$FORM_NAME_NAME] == '') {
    registrationForm(Strings::$ERROR_EMPTY_NAME);
    return;
}
if (Users::getUserByLogin($params[Strings::$FORM_NAME_LOGIN]) != NULL) {
    registrationForm(Strings::$ERROR_LOGIN_IS_USED);
    return;
}

$pattern_email = '/[a-zA-Z0-9\-\_]{1,50}[@]{1}[a-zA-Z0-9]{2,20}[\.]{1}[a-zA-Z0-9]{2,15}/';
if (!preg_match($pattern_email, $params[Strings::$FORM_NAME_EMAIL])) {
    registrationForm(Strings::$ERROR_INVALID_EMAIL);
    return;
}

$newUser = new User();
$newUser->setLogin($params[Strings::$FORM_NAME_LOGIN]);
$newUser->setEmail($params[Strings::$FORM_NAME_EMAIL]);
$newUser->setName($params[Strings::$FORM_NAME_NAME]);
$newUser->setPassword(Users::md5Salt($params[Strings::$FORM_NAME_PASSWORD]));
Users::addUser($newUser);
header('Location:index.php', true);
exit();