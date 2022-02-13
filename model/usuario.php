<?php
class User extends BaseEntity {
  private $id, $name, $lastName, $email, $password;

  public function __construct($table) {
    $table = "Users";
    parent::__construct($table);
  }

  public function getId(){
    return $this->id;
  }
  
  public function getName(){
    return $this->name;
  }
  
  public function getLastName(){
    return $this->lastName;
  }
  
  public function getEmail(){
    return $this->email;
  }
  
  public function getPassword(){
    return $this->password;
  }

  public function setId($id){
     $this->id = $id;
  }
  
  public function setName($name){
    $this->name = $name;
  }
  
  public function setLastName($lastName){
    $this->lastName = $lastName;
  }
  
  public function setEmail($email){
    $this->email = $email;
  }
  
  public function setPassword($password){
    $this->password = $password;
  }

  public function save() {
    $query = "INSERT INTO users(id, name, lastName, email, password)"
            ."VALUES (NULL,"
            ."'".$this->name."',"
            ."'".$this->lastName."',"
            ."'".$this->email."',"
            ."'".$this->password."',"
            .");";
    $save = $this->db()->query($query);
    return $save;

  }


}
?>