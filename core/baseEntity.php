<?php

// De esta clase heredarán los modelos que representen entidades.
class BaseEntity
{
  private $table;
  private $db;
  private $connect;

  public function __construct($table)
  {
    $this->table = (string) $table;

    require_once 'connect.php';
    $this->connect = new Connect();
    $this->db = $this->connect->conexion();
  }

  public function getConnect()
  {
    return $this->connect;
  }

  public function db()
  {
    return $this->db;
  }

  public function getAll()
  {
    $query = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
    //Devolvemos el result set en forma de array de objetos.  
    while ($row = $query->fetch_object()) {
      $resultSet[] = $row;
    }

    return $resultSet;
  }

  public function getById($id)
  {
    $query = $this->db->query("SELECT * FROM $this->table WHERE id=$id");

    if ($row = $query->fetch_object()) {
      $resultSet = $row;
    }

    return $resultSet;
  }

  public function getBy($column, $value)
  {
    $query = $this->db->query("SELECT * FROM $this->table WHERE $column = '$value'");

    if ($row = $query->fetch_object()) {
      $resultSet = $row;
    }

    return $resultSet;
  }

  public function deleteById($id)
  {
    $query = $this->db->query("DELETE FROM $this->table WHERE id=$id");
    return $query;
  }

  public function deleteby($column, $value)
  {
    $query = $this->db->query("DELETE FROM $this->table WHERE $column = '$value'");

    return $query;
  }

  //TODO: se pueden agregar mas metodos de consulta.
}
