<?php
class User{
    private $login;
    private $password;
    private $email;
    private $name;
    
    function __construct() {
        
    }
    
    public function setLogin($login){
        $this->login = $login;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function getLogin(){
        return $this->login;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getName(){
        return $this->name;
    }
}
