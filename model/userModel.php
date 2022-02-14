<?php
class UsersModel extends BaseModel {
  private $table;

  public function __construct($table) {
    $this->table = "users";
    parent::__construct($this->table);
  }
  
  public function getUserById($id) {
    $query = "SELECT *FROM users WHERE id = $id";
    $user = $this->runSql($query);
    return $user;
  }
}
?>