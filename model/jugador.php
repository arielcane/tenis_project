<?php
class jugador
{
    //Atributo para conexión a SGBD
    private $pdo;

  
	public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::Conectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    
	public function get_listado($filtro){
		try
        {
            $result = array();
            
            $stm = $this->pdo->prepare("SELECT * FROM jugador WHERE genero = '".$filtro."'");  
            $stm->execute();
            
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            //Obtener mensaje de error.
            die($e->getMessage());
        }
	}
	
	

}
