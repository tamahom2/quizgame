<?php
  class User {
      private $username;
      private $password;
      private $email;
      public function __construct($username,$password,$email){
        $this->usermane = $username;
        $this->password = $password;
        $this->email = $email;
    }
      public function setPassword($password){
        $this->password = $password;
    }
      public function setUsername($username){
        if(isValidUsername($username)){
          $this->usermane = $username;
        }
    }
      public function setEmail($email){
        $this->email = $email;
    }
      public function getPassword(){
        return $this->password;
    }
      public function getUsername(){
        return $this->usermane;
    }
      public function getEmail(){
        return $this->email;
    }
  }
 ?>
