<?php
include_once("wordix.php");

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github 
Martin Alexander Coronado** - Legajo FAI 4421 - mail: martin.coronado@est.fi.uncoma.edu.ar //ticho221@hotmail.com - GitHub: Maitenero
Abigail Juliana Almiron** - Legajo FAI 3147 - mail: abigail.almiron@est.fi.uncoma.edu.ar - GitHub: abialmiron
Ezequiel Juan Retamal** - Legajo FAI 1419 - mail: ezequiel.retamal@est.fi.uncoma.edu.ar - Github: ezequiel95jr*/

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

 /**
  * Solicita al usuario un nombre de jugador, que debe comenzar con una letra, retorna el nombre en minusculas
  * @return STRING
  */
  function solicitarJugador (){ 
    /* */
    do { 
        $esValido = true;
        echo "Ingrese su nombre de usuario utilizando letras y numeros: \n";
        $nombreUsuario = trim(fgets(STDIN));
        echo "\n";
        if (ctype_alpha($nombreUsuario[0])){
            $nombreUsuario = strtolower($nombreUsuario);
            $esValido = false;
            echo "\n";
        }
        else {
            echo "El nombre de usuario debe iniciar con una letra. \n";
            echo "\n";
        }
    }while($esValido);
    return $nombreUsuario;
  }  

/**
  * Despliega el menu de opcines de Wordix, retorna el numero de la opcion elegida
  *@return INT
  */
  function seleccionarOpcion (){ 
    /* int $opcionSelec, boolean $condicionOpcion, $esEntero */
        do{
            $condicionOpcion = false;
            echo "Menu de opciones: \n";
            echo "\n";
            echo "1) Jugar Wordix con una palabra elegida \n";
            echo "2) Jugar Wordix con una palabra aleatoria \n";
            echo "3) Mostrar una partida \n";
            echo "4) Mostrar primer partida ganada \n";
            echo "5) Mostrar resumen de jugador \n";
            echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra \n";
            echo "7) Agregar palabra de 5 letras a Wordix \n";
            echo "8) Salir \n";
            echo "\n";
            echo "Ingrese el numero de la opcion deseada: \n";
            $opcionSelec = trim(fgets(STDIN));
            echo "\n";
            if (is_numeric($opcionSelec)){
                $opcionSelec = $opcionSelec * 1; //covierte de string numerico a variable numerica, si uso settype o intval no funciona bien.
            }    
            $esEntero = is_int ($opcionSelec);
            if (!$esEntero || $opcionSelec < 1 || $opcionSelec > 8){
                echo "Seleccione una opcion valida. \n";
                echo "\n";
                $condicionOpcion = true; 
            }
        } while ($condicionOpcion);
        return $opcionSelec;
    }

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "BALAS","BARES","ANIMO","BOTES","BEBES"
    ];

    return ($coleccionPalabras);
}

/**
 * arreglos de coleccion partidas jugadas
 * @return array
 */
function cargarPartidas(){

        $coleccionPartidas[0] = ["palabraWordix" => "MUJER","nombre"=>"carlos","puntaje"=>0,"intento"=>6];
        $coleccionPartidas[1] = ["palabraWordix" => "GATOS","nombre"=>"juan","puntaje"=>0,"intento"=>6];
        $coleccionPartidas[2] = ["palabraWordix" => "BALAS","nombre"=>"carlos","puntaje"=>0,"intento"=>6];
        $coleccionPartidas[3] = ["palabraWordix" => "CASAS","nombre"=>"fernando","puntaje"=>0,"intento"=>6];
        $coleccionPartidas[4] = ["palabraWordix" => "MELON","nombre"=>"ezequiel","puntaje"=>0,"intento"=>6];
        $coleccionPartidas[5] = ["palabraWordix" => "MUJER","nombre"=>"diego","puntaje"=>0,"intento"=>6];
        $coleccionPartidas[6] = ["palabraWordix" => "ANIMO","nombre"=>"carlos","puntaje"=>0,"intento"=>6];
        $coleccionPartidas[7] = ["palabraWordix" => "BEBES","nombre"=>"soho221","puntaje"=>0,"intento"=>6];
        $coleccionPartidas[8] = ["palabraWordix" => "BALAS","nombre"=>"abi","puntaje"=>0,"intento"=>6];
        $coleccionPartidas[9] = ["palabraWordix" => "PIANO","nombre"=>"master2000","puntaje"=>0,"intento"=>6];
        return $coleccionPartidas;    
}
    /**
    * busca una partida segun un nroingresado dentro del array coleccion
    * @param INT $nroIngresado */

    function mostrarPartida($nroPartida){
        $partidaEncontrada = false;
        $condicion = true;
        $i = 0;
        $coleccionArray = cargarPartidas();
        while ( $condicion == true && $i<count($coleccionArray)) {
                if ($i+1 == $nroPartida){
                    $condicion = false;	
                    $partidarEncontrada = true;
                    echo "Partida WORDIX N° ". ($i+1).": palabra ".$coleccionArray[$i]["palabraWordix"]."\n";
                    echo "Jugador: ".$coleccionArray[$i]["nombre"]."\n";
                    echo "Puntaje: ".$coleccionArray[$i]["puntaje"]." puntos \n";
                    // compara si los intentos son 6 y el puntaje 0, no adivinó. El usuario
                    // siempre va a llegar a los 6 intentos en caso de no adivinar.
                    if ($coleccionArray[$i]["intento"] == 6 && $coleccionArray[$i]["puntaje"] == 0){
                        echo "No adivinó la palabra.\n";
            }	    else{
                        echo "Adivinó en el intento: ".$coleccionArray[$i]["intento"]."\n";
            }       
    }       $i = $i+1;
    }
            if($partidaEncontrada == false){
                    "No se encontró la partida.";
            }
    
    }
    /**
    * busca una partida segun un nombre ingresado dentro del array coleccion, si la encuentra, devuelve la posición, si no, -1
    * @param STRING $nombre
    * @param return int */
     
    function buscarPartidaGanada($coleccionPartidas,$nombreAdd){
        $jugadorEncontrado = false;
        $condicion = true;
        $i = 0;
        $valor = -1;
        //$coleccionArray = cargarPartidas();
        while ( $condicion == true && $i<count($coleccionPartidas) ) {
                if ($coleccionPartidas[$i]["nombre"] == $nombreAdd && $coleccionPartidas[$i]["puntaje"] > 0){
                    $condicion = false;	
                    $valor = $i;

        }    $i = $i+1;    
}
return $valor;
}
/** recorre el arreglo $coleccionPartidas buscando la clave "nombre" y llena el arreglo $resumenJugador con los datos
 * @param ARRAY $coleccionArray
 * @param STRING $nombreJugador
 * @return ARRAY
 */
    function estadisticasJugador($coleccionArray, $nombreJugador){
        //crear una colección sobre las jugadas del usuario
        $i = 0;
        $resumenPuntaje = 0;
        $countVictorias = 0;
        $resumenUser;
        $resumenUser["partidas"] = 0; // inicializo al arreglo en posicion "partidas" en 0 para luego verificar si éste encontró resultados o no
        $resumenUser["victorias"] = 0;
        $resumenUser["puntaje"] = 0;
        $resumenUser["intento1"] = 0;
        $resumenUser["intento2"] = 0;
        $resumenUser["intento3"] = 0;
        $resumenUser["intento4"] = 0;
        $resumenUser["intento5"] = 0;
        $resumenUser["intento6"] = 0;
        while ($i < count($coleccionArray)){
            if( $coleccionArray[$i]["nombre"] == $nombreJugador){ // en caso de que el nombre existe:
                $resumenUser["nombre"] = $coleccionArray[$i]["nombre"];
                $resumenUser["partidas"]= $resumenUser["partidas"] +1; //guarda 1 unidad cada ves que encuentra el nombre dentro del array
                $resumenUser["puntaje"]= $resumenUser["puntaje"] + $coleccionArray[$i]["puntaje"];
                if($coleccionArray[$i]["puntaje"]>0){ 
                        $resumenUser["victorias"] = $resumenUser["victorias"] + 1; //suma 1 victoria segun el puntaje
            }   switch($coleccionArray[$i]["intento"]){ //acá es "segun el nro que me devuelve lo que haya en esa posicion: 3
                        case 1: $resumenUser["intento1"] = $resumenUser["intento1"] + 1;
                        break;
                        case 2: $resumenUser["intento2"] = $resumenUser["intento2"] + 1;
                        break;
                        case 3: $resumenUser["intento3"] = $resumenUser["intento3"] + 1;
                        break;
                        case 4: $resumenUser["intento4"] = $resumenUser["intento4"] + 1;
                        break;
                        case 5: $resumenUser["intento5"] = $resumenUser["intento5"] + 1;
                        break;
                        case 6: $resumenUser["intento6"] = $resumenUser["intento6"] + 1;
                        break; 
                // el switch guarda en la correspondiente posicion "intento" una unidad pero el resto debería ser 0...
        }       //if main
                
    }   $i = $i + 1;        // si $resumenUser["partida"] == 0 es porq nunca encontró al nombre buscado.
}
    return $resumenUser;
}
/**
*@param ARRAY $coleccionResumen */

function showEstadisticas ($coleccionResumen){
	$porcentajeVictorias = 0.0;
	$end = count($coleccionResumen);
	$countVictorias = $coleccionResumen["victorias"];
	$cantPartidas = $coleccionResumen["partidas"];
	echo "*************************************** \n";
	for ($i=0; $i< $end; $i++){
		switch ($i){
			case 0: echo "Jugador: ".$coleccionResumen["nombre"]." \n"; //debería llamar al modulo que pasa los nombres a minúscula?????
			break;	
			case 1: echo "Partidas: ".$coleccionResumen["partidas"]."\n";
			break;
			case 2: echo "Puntaje Total: ".$coleccionResumen["puntaje"]."\n";
			break;
			case 3: echo "Victorias: ". $coleccionResumen["victorias"]."\n";
			break;
			case 4: //porcentaje, advertencia: si el array es vacio, $cantPartidas será 0...
				$porcentajeVictorias = ($countVictorias*100)/$cantPartidas;
				echo "Porcentaje Victorias: ".round($porcentajeVictorias,2)."% \n";
				break;
			case 5: //El menú muestra todos los intentos, incluso si éstos son 0...
				//debería inicializar cada posicion "intento" del arreglo $coleccionResumen en 0...
				echo "Intento: \n";
				echo $coleccionResumen["intento1"]."\n";
				echo $coleccionResumen["intento2"]."\n";
				echo $coleccionResumen["intento3"]."\n";
				echo $coleccionResumen["intento4"]."\n";
				echo $coleccionResumen["intento5"]."\n";
				echo $coleccionResumen["intento6"]."\n";
				break;
}}
	echo "*************************************** \n";
}
/** MODULO UASORT 
 *@param ARRAY $coleccionJugadores
*/
function showColeccionOrdenada($coleccionJugadores){
        
    uasort($coleccionJugadores, "cmp");

print_r($coleccionJugadores);
}
/** MODULO UASORT 
 *@param STRING $palabra1
 *@param STRING $palabra2
 *@return INT
 */
function cmp($partida1, $partida2){
    if($partida1["nombre"] == $partida2["nombre"]){
        if($partida1["palabraWordix"] == $partida2["palabraWordix"]){
            return 0;
        }
        else{
            if($partida1["palabraWordix"] < $partida2["palabraWordix"]){
                return -1;
            }
            else{
                return 1;
            }
        }
    }
    else{
        if($partida1["nombre"] < $partida2["nombre"]){
            return -1;
        }
        else{
            return 1;
        }
    }
}
/**
 * 
 */
function cargarNuevaPartida ($partidaJugada){

    return $coleccionPartidaNueva;    
    }
/**
 * 
 */
function nuevaPalabraWordix ($coleccionPalabras){
    echo "ingrese una nueva palabra de 5 letra: ";
    $nuevaPalabra = leerPalabra5Letras();
    $finColeccion = count($coleccionPalabras);
    $coleccionPalabras[$finColeccion+1] = $nuevaPalabra;
    echo "La palabra ".$nuevaPalabra." se ha guardado exitosamente. \n";
return $coleccionPalabras;
}
/**
* 
*/
function cmp2($palabra, $palabra2){
if($palabra[0] == $palabra2[0]){
        return 0;
}
    else{
        if($palabra[0] < $palabra2[0]){
            return -1;
        }
        else{
            return 1;
        }
    }
}
/**
* 
*/
function showColeccionPalabras($coleccionPalabrasMain){
    
uasort($coleccionPalabrasMain, "cmp2");

print_r($coleccionPalabrasMain);
}



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

//Inicialización de variables:
//PROGRAMA MAIN
        $coleccionArray = cargarPartidas();
        $coleccionPalabrasMain = cargarColeccionPalabras();
do {
    
    $opcion = seleccionarOpcion ();
    
    switch ($opcionSelec){
        case 1: echo "JUGAR WORDIX CON UNA PALABRA ELEGIDA \n";
                $nombreUser = solicitarJugador();
                $nroDePalabra = solicitarNumeroEntre(0, count($coleccionPalabrasMain));
                $partidaJugada = jugarWordix($coleccionPalabrasMain[$nroDePalabra],$nombreUser);
                // CARGAR LA NUEVA PARTIDA EN LA COLECCIONARRAY DEBERÍA SER EN UN MODULO?
                $countPartidas = count($coleccionArray);
                $coleccionArray[$countPartidas] = ["palabraWordix"=> $partidaJugada["palabraWordix"], "nombre"=> $partidaJugada["jugador"],"puntaje"=> $partidaJugada["puntaje"],"intento"=> $partidaJugada["intentos"]];

        break;
        case 2: echo "JUGAR WORDIX CON UNA PALABRA ALEATORIA \n";
                $nombreUser = solicitarJugador();
                $nroDePalabra = rand(0,count($coleccionPalabrasMain));
                $partidaJugada = jugarWordix($coleccionPalabrasMain[$nroDePalabra],$nombreUser);
                // CARGAR LA NUEVA PARTIDA EN LA COLECCIONARRAY DEBERÍA SER EN UN MODULO?
                $countPartidas = count($coleccionArray);
                $coleccionArray[$countPartidas+1] = ["PalabraWordix"=> $partidaJugada["palabraWordix"]];
                $coleccionArray[$countPartidas+1] = ["jugador"=> $partidaJugada["jugador"]];
                $coleccionArray[$countPartidas+1] = ["puntaje"=> $partidaJugada["puntaje"]];
                $coleccionArray[$countPartidas+1] = ["intento"=> $partidaJugada["intentos"]];
                
        break;
        case 3:
            echo "ingrese un número de partida: ";
            $numeroDePartida = trim(fgets(STDIN));
            //$nroValido = solicitarNumeroEntre(1, count($coleccionArray))
            mostrarPartida($nroValido,$coleccionArray);
        break;
        case 4: 
            echo "Ingrese un nombre: ";
            $nombreIngresado = trim(fgets(STDIN));
            $valorEncontrado = buscarPartidaGanada($coleccionArray,$nombreIngresado);
            var_dump($valorEncontrado);
            if($valorEncontrado == -1){
                echo "no se encontró resultado. \n";
            }
            else{
                mostrarPartida($valorEncontrado, $coleccionArray)."\n";}

        break;
        case 5:
            echo "ingrese el nombre de un jugador: ";
            $nombreIngresado = trim(fgets(STDIN));
            $resumenJugador = estadisticasJugador($coleccionArray,$nombreIngresado);
            if($resumenJugador["partidas"] != 0){
                showEstadisticas($resumenJugador);
            }
            else{
                echo "No existe el jugador ".$nombreIngresado. ". \n";
            }
            break;
        case 6:
            echo "Mostrar listado de partidas ordenadas por jugador y por palabra";
            showColeccionOrdenada($coleccionArray); 
        break;
        case 7: 
            $coleccionPalabrasMain = nuevaPalabraWordix($coleccionPalabrasMain);
            echo "\n";
            showColeccionPalabras($coleccionPalabrasMain);
        break;
    }
} while ($opcion != 8);

