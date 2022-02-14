<?php
class UserController extends BaseController {
  
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $user = new User();

    $allUsers = $user->getAll();

    $this->view("index", array(
                "allUser"=>$allUsers,
                "Hola" => "Vide ejemplo MVC PHP"
    ));
  }

  public function create() {
    if ( isset($_POST["name"])) {
      $user = new User();

      $name = $_POST["name"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $password = $_POST["password"];

      $user->setName($name);
      $user->setLastName($lastName);
      $user->setEmail($email);
      $user->setPassword($password);
      
      $save = $user->save();

    }

    $this->redirect("users", "index");
  }

  public function delete() {
    if( isset($_GET["id"])) {
      $id = (int) $_GET["id"];

      $user = new User();

      $user->deleteById($id);

      $this->redirect();
    }
  }
}
?>