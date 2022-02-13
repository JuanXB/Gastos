<?php
  class BaseController {
    public function __construct() {
      require_once 'baseEntity.php';
      require_once 'baseModel';

      //Incluir todos los modelos
      foreach(glob("model/*.php") as $file){
        require_once $file;
    }

    }

    //Plugins y funcionalidades
     
    /*
    * Este método lo que hace es recibir los datos del controlador en forma de array
    * los recorre y crea una variable dinámica con el indice asociativo y le da el
    * valor que contiene dicha posición del array, luego carga los helpers para las
    * vistas y carga la vista que le llega como parámetro. En resumen un método para
    * renderizar vistas.
    */

    public function view($vista, $datos) {
      
      foreach ($datos as $id_assoc => $valor) {
        ${$id_assoc} = $valor;
      }

      require_once '../core/helpViews.php';
      $helper = new helpViews();

      require_once 'view/'.$vista.'view.php';
      
    }

    public function redirect($controller = DEFAULT_DRIVER, $action = DEFAULT_ACTION) {
      header("Location:index.php? 
              controller=".$controller."&action=".$action);
    }

    //TODO: Metodos para controladores.
  }
?>