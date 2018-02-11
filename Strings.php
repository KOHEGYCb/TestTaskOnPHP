<?php

class Strings {

    public static $FORM_NAME_LOGIN = 'login';
    public static $FORM_NAME_PASSWORD = 'password';
    public static $FORM_NAME_EMAIL = 'email';
    public static $FORM_NAME_CONFIRM_PASSWORD = 'confirm_password';
    public static $FORM_NAME_NAME = 'name';
    
    public static $ERROR_EMPTY_LOGIN = 'Input login';
    public static $ERROR_EMPTY_PASSWORD = 'Input password';
    public static $ERROR_INVALID_PASSWORD = 'Invalid password';
    public static $ERROR_USER_NOT_FOUND = 'User not found';
    public static $ERROR_EMPTY_EMAIL = 'Input e-mail';
    public static $ERROR_EMPTY_NAME = 'Input name';
    public static $ERROR_DIFFERENT_PASSWORDS = 'Passwords is different';
    public static $ERROR_LOGIN_IS_USED = 'Login already used';
    public static $ERROR_INVALID_EMAIL = 'Invalid e-mail';

    
    public static $XML_BD = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<users>

</users>
XML;

}
