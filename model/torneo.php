<?php
class torneo
{
    //Atributo para conexión a SGBD
    private $pdo;

    //Atributos del objeto
    private $nombre;
	private $jugadores;
	private $partidos;
	private $enfrentamientos;
	private $genero;


    //Método de conexión a SGBD.
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

 
    //Jugar torneo.
    public function jugar_torneo()
    {
		
        shuffle($this->jugadores);
		if ((count($this->jugadores) % 2) == 0) {
			$this->partidos = array_chunk($this->jugadores, (count($this->jugadores)/2));
		}

		
		$fase = count($this->jugadores);
		$fase = $fase/2;
		if($fase == 2) $fase = "Semifinal";
		elseif($fase == 1) $fase = "Final";
		else $fase = $fase."º";

		

		foreach($this->partidos[0] as $key => $value){
				$ganadores[$key] = $this->jugar_partido($value, $this->partidos[1][$key], $fase);
				
		}
		
		$this->jugadores = $ganadores;
		
		
		if(count($this->jugadores) > 1) $this->jugar_torneo();
		else return $ganadores;
		
		
    }
	
	//Jugar partido.
	private function jugar_partido($jugador1, $jugador2, $fase){
		$suerte_jug_1 = rand(0, 99);
		$suerte_jug_2 = rand(0, 99);
		
		//Calcular valores
		$res_jug_1 = $this->calcular_valores($jugador1) + $suerte_jug_1;
		$res_jug_2 = $this->calcular_valores($jugador2) + $suerte_jug_2;
		
		

		$txt_enf = $jugador1['nombre']." vs ".$jugador2['nombre']." - ".$res_jug_1." - ".$res_jug_2." -  Fase ".$fase;
		$this->set_enfrentamientos($txt_enf);
				
		
		if($res_jug_1 > $res_jug_2){
			return $jugador1;
		}elseif($res_jug_1 < $res_jug_2){
			return $jugador2;
		}else{
			//empate
			if(rand(0, 1) == 0){
				return $jugador1;
			}else{
				return $jugador2;
			}
		}
	}

	//Define el ganador en funcion de los parametros de los jugadores.
	public function calcular_valores($jugador){
		if($jugador['genero'] == 'M'){
			$res = $jugador['habilidad'] + $jugador['fuerza'] + $jugador['velocidad'];
		}elseif($jugador['genero'] == 'F'){
			$res = $jugador['habilidad'] + $jugador['reaccion'];
		}else{
			$res = 0;
		}
		return $res;
	}

    public function get_partidos(){
		return $this->partidos;
	}
	
	public function get_jugadores(){
		return $this->jugadores;
	}
	
	public function get_enfrentamientos(){
		return $this->enfrentamientos;
	}
	
	public function get_genero(){
		return $this->genero;
	}
	
	public function set_jugadores($jugadores){
		$this->jugadores = $jugadores;
	}
	
	public function set_genero($genero){
		$this->genero = $genero;
	}
	
	public function set_enfrentamientos($res){
		$this->enfrentamientos[] = $res;
	}
	

}
