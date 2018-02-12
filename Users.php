<?php

class Users {

    private $filepath = "bd/users.xml";

    private function initUsers() {
        $xmlDoc = simplexml_load_file($this->filepath);
        $i = 0;

        foreach ($xmlDoc->user as $value) {
            $users[$i] = new User();
            $users[$i]->setEmail($value->email);
            $users[$i]->setLogin($value->login);
            $users[$i]->setName($value->name);
            $users[$i]->setPassword($value->password);
            $i++;
        }
        return $users;
    }

    public static function getUsers() {
        $u = new Users();
        return $u->initUsers();
    }

    public static function addUser($user) {
        include_once './User.php';
        $u = new Users();
        if (file_exists($u->filepath)) {
            $newXml = new SimpleXMLElement(simplexml_load_file($u->filepath)->asXML());
        } else {
            include_once './Strings.php';
            $newXml = new SimpleXMLElement(Strings::$XML_BD);
        }

        $newXml->user[count(Users::getUsers())]->login = $user->getLogin();
        $newXml->user[count(Users::getUsers())]->password = $user->getPassword();
        $newXml->user[count(Users::getUsers())]->name = $user->getName();
        $newXml->user[count(Users::getUsers())]->email = $user->getEmail();

        file_put_contents($u->filepath, $newXml->asXML());
    }

    public static function isUserFound($login) {
        for ($i = 0; $i < count(Users::getUsers()); $i++) {
            if ($login == Users::getUsers()[$i]->getLogin()) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public static function isPasswordValid($params) {
        include_once './Strings.php';
        $user = Users::getUserByLogin($params[Strings::$FORM_NAME_LOGIN]);
        if ($user != NULL) {
            if ($user->getPassword() == Users::md5Salt($params[Strings::$FORM_NAME_PASSWORD])) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public static function getUserByLogin($login) {
        for ($i = 0; $i < count(Users::getUsers()); $i++) {
            if ($login == Users::getUsers()[$i]->getLogin()) {
                $user = new User();
                $user->setEmail(Users::getUsers()[$i]->getEmail());
                $user->setLogin(Users::getUsers()[$i]->getLogin());
                $user->setName(Users::getUsers()[$i]->getName());
                $user->setPassword(Users::getUsers()[$i]->getPassword());
                return $user;
            }
        }
        return NULL;
    }

    public static function md5Salt($pass) {
        return md5('ldleY$9Dh8vwgG@$UT*dgYloA' . $pass);
    }

}
