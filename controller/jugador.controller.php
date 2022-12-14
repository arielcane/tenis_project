<?php
require_once 'model/jugador.php';


class jugadorController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new jugador();
    }
    
    
}

