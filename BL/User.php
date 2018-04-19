<?php
    require_once './DAL/UserDAL.php';

class User {

    public $id;
    public $username;
    public $password;
    public $name;
    public $email;
    public $role;

    function __construct(){}
    
    static function constructWithParams($username, $password, $name, $email, $role) {
        $user = new self();
        $user->username = $username;
        $user->password = $password;
        $user->name = $name;
        $user->email = $email;
        $user->role = $role;
        
        return $user;
    }

    function create(){
      UserDAL::create($this);
    }
    function getAll(){
        return UserDAL::getAll();
    }
    function getById(){
        return UserDAL::getById($this->id);
    }
    function update(){
        return UserDAL::update($this);
    }  
    function remove(){
        return UserDAL::remove($this->id);
    }

    function getId() {
        return $this->id;
    }
    function getUsername() {
        return $this->username;
    }
    function getPassword() {
        return $this->password;
    }
    function getName() {
        return $this->name;
    }
    function getEmail() {
        return $this->email;
    }
    function getRole() {
        return $this->role;
    }

    function setId($id) {
      $this->id = $id;
    }
    function setUsername($username) {
      $this->username = $username;
    }
    function setPassword($password) {
      $this->password = $password;
    }
    function setName($name) {
      $this->name = $name;
    }
    function setEmail($email) {
      $this->email = $email;
    }
    function setRole($role) {
      $this->role = $role;
    }
}
