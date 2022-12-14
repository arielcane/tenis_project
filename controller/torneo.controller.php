<?php
require_once 'model/torneo.php';
require_once 'model/jugador.php';

class torneoController{

    private $model;



    public function __CONSTRUCT(){
		
        $this->model = new torneo();
    }

    //Llamado plantilla principal
    public function Index(){
    	require_once 'view/header.php';
        require_once 'view/torneo/torneo.php';
        require_once 'view/footer.php';
    }
	
	public function comenzar_torneo(){
		
		//M para torneo masculino, F para torneo femenino.
		$genero = 'M';

		//Obtengo lista de jugadores de la BBDD 
		$jugadores = $this->get_jugadores($genero);
		
		$this->cargar_genero($genero);

		//Si el genero de los jugadores es igual al definido por el torneo, lo juega. 
		if($this->validar_genero($jugadores)){
			//Si la cantidad de jugadores es potencia de 2.
			if($this->es_potencia(count($jugadores))){
				$this->cargar_jugadores($jugadores);
		
			
				$jugadores = $this->model->get_jugadores();
		
				$this->model->jugar_torneo();
				$enfrentamientos = $this->model->get_enfrentamientos();
		
				$campeon = $this->model->get_jugadores()[0];

				$html_jugadores = $this->preparar_jugadores_html($jugadores);
				$html_enfrentamientos = $this->preparar_enfrentamientos_html($enfrentamientos);
				$mensaje = "<h2 align='center'>Ganador: ".$campeon['nombre']."<h2>";

				require_once 'view/header.php';
				require_once 'view/torneo/torneo-jugar.php';
				require_once 'view/footer.php';
			 
				return $mensaje;


			}else{
				$mensaje = '<h2 align="center">La cantidad de jugadores no es potencia de 2. No se puede realizar el torneo.</h2>';
				require_once 'view/torneo/torneo-jugar.php';
				return $mensaje;
			}

			
		}else{

			$mensaje = '<h2 align="center">Existen generos incompatibles con el torneo definido</h2>';
			require_once 'view/torneo/torneo-jugar.php';
			return $mensaje;

		}
			
	
	}
	
	public function cargar_jugadores($jugadores){		
		$this->model->set_jugadores($jugadores);	
	}

	public function cargar_genero($genero){
		$this->model->set_genero($genero);
	}

	public function es_potencia($n){

		$p = 2;
		while($p <= $n){
			if($p == $n){
				$res = true;
				break;	
			} 
			$p = $p*2;
		}
		if($res) return $res;
		else return false;
	}

	public function get_jugadores($filtro){
		$jug = new jugador();		
		$res = $jug->get_listado($filtro);
		return $res;	
	}

	public function validar_genero($jugadores){
		$gen = $this->model->get_genero();
		$cont = 0;

		foreach ($jugadores as $jugador) {
			if($jugador['genero'] != $gen){
				$cont++;
			}
		}

		if($cont == 0) return true;
		else return false;
	}



	public function preparar_enfrentamientos_html($elementos){


		$html = '<br><br><br>
<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:50px;">#</th>
            <th style="width:500px;">Enfrentamientos</th>
            <th style="width:200px;">Resultados</th>
            <th style="width:200px;">Fase</th>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>


        </tr>
    </thead>
    <tbody>';

		$i=1;

        foreach($elementos as $r): 
        	$r_elem = explode('-', $r);
        	

        	$html .= "<tr><td>".$i++."</td>";
        	$html .= "<td>".$r_elem[0]."</td>";
        	$html .= "<td>".$r_elem[1]." - ".$r_elem[2]."</td>";
        	$html .= "<td>".$r_elem[3]."</td></tr>";
        
        endforeach;


      $html .= '</tbody>
</table>

<br><br><br><br>';

		return $html;
	}


	public function preparar_jugadores_html($elementos){


		$html = '<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:50px;">#</th>
            <th style="width:500px;">Jugadores</th>
            <th style="width:50px;">Genero</th>
            <th style="width:50px;">Habilidad</th>
            <th style="width:50px;">Fuerza</th>
            <th style="width:50px;">Velocidad</th>
            <th style="width:50px;">Reaccion</th>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>


        </tr>
    </thead>
    <tbody>';

		$i=1;

        foreach($elementos as $r): 
        	
        	$html .= "<tr><td>".$i++."</td>";
        	$html .= "<td>".$r['nombre']."</td>";
        	$html .= "<td>".$r['genero']."</td>";
        	$html .= "<td>".$r['habilidad']."</td>";
        	$html .= "<td>".$r['fuerza']."</td>";
        	$html .= "<td>".$r['velocidad']."</td>";
        	$html .= "<td>".$r['reaccion']."</td></tr>";
        
        endforeach;


      $html .= ' </tbody>
</table>';

		return $html;
	}
    
}
