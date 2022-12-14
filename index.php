<?php
session_start();
  //Se incluye la configuración de conexión a datos en el
  //SGBD: MariaDB.
  require_once 'model/database.php';                                        //Conexion a BD

  //Para registrar productos es necesario iniciar los proveedores
  //de los mismos, por ello la variable controller para este
  //ejercicio se inicia con el 'proveedor'.
  $controller = 'torneo';                                                //Controlador por defecto
    //print_r($_REQUEST);
  // Todo esta lógica hara el papel de un FrontController
  if(!isset($_REQUEST['c']))                                                //Si no vienen parametros en la URL
  {
    //Llamado de la página principal
    require_once "controller/$controller.controller.php";                   //Llama al controlador cargado, en este caso proveedor (por defecto)
    $controller = ucwords($controller) . 'Controller';                      //Arma el nombre de la clase controlador, en este caso ProveedorControler
    $controller = new $controller;                                          //Crea la instancia ProveedorControler
    $controller->Index();                                                   //Llama a su pagina principal a traves de su metodo.
  }
  else                                                                      //Vienen parametros en al URL
  {
    // Obtiene el controlador a cargar
    $controller = strtolower($_REQUEST['c']);                               //Pasa letras a minusculas. Ej: proveedor, producto, etc
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';             //Si hay accion se setea, sino va a index. Ej: Nuevo, Crud, etc.

    // Instancia el controlador
    require_once "controller/$controller.controller.php";                   //Idem arriba
    $controller = ucwords($controller) . 'Controller';                      //
    $controller = new $controller;                                          //

    // Llama la accion
    call_user_func( array( $controller, $accion ) );                        //Llama al metodo $accion del controlador $controller
  }
