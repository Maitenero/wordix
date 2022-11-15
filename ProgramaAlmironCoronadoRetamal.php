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
* Establece un array de letras
* @return ARRAY
*/
function letrasAbc(){
    //array $arrayLetras
    $arrayLetras = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
    return $arrayLetras;
} 

/**
* Realiza la suma de los puntos correspondientes a cada letra
* @param STRING palabraJugada
* @return INT
*/
function sumaLetras ($palabraJugada){
    /*INT $j, $i, $puntos, STRING $letraActual, $palabraJugada, ARRAY $letras, */
    $letras = letrasAbc ();
    $palabraJugada = strtolower($palabraJugada);
    $i = 0;
    $puntos = 0;
    for ($i=0; $i < 5 ; $i++) { 
        $letraActual = $palabraJugada[$i];
        $j = 0;
        while ($j < count($letras)){
            if ($letraActual == $letras[$j]){
                if ($j == 0 || $j == 4 || $j == 8 || $j == 14 || $j == 20){
                    $puntos = $puntos + 1;  
                }
                elseif ($j < 13){
                    $puntos = $puntos + 2;  
                }
                else{ 
                    $puntos = $puntos + 3;
                }
            }
            $j++;
        }
    }
    return $puntos;
}
 
/**
* Solicita al usuario un nombre de jugador, que debe comenzar con una letra, retorna el nombre en minusculas
* @return STRING
*/
function solicitarJugador (){ 
    /*Bool $esValido,  STRING $nombreUsuario */
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
function cargarColeccionPalabras(){
    /* Array $coleccionPalabras */
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "BALAS","BARES","ANIMO","BOTES","BEBES"
    ];

    return ($coleccionPalabras);
}

/**
* Arreglos de coleccion partidas jugadas
* @return array
*/
function cargarPartidas(){
/* array $coleccionPartidas */
    $coleccionPartidas[0] = ["palabraWordix" => "MUJER","nombre"=>"carlos","puntaje"=>15,"intento"=>1];
    $coleccionPartidas[1] = ["palabraWordix" => "GATOS","nombre"=>"juan","puntaje"=>13,"intento"=>4];
    $coleccionPartidas[2] = ["palabraWordix" => "BALAS","nombre"=>"carlos","puntaje"=>13,"intento"=>3];
    $coleccionPartidas[3] = ["palabraWordix" => "CASAS","nombre"=>"fernando","puntaje"=>0,"intento"=>6];
    $coleccionPartidas[4] = ["palabraWordix" => "MELON","nombre"=>"ezequiel","puntaje"=>10,"intento"=>6];
    $coleccionPartidas[5] = ["palabraWordix" => "MUJER","nombre"=>"diego","puntaje"=>10,"intento"=>6];
    $coleccionPartidas[6] = ["palabraWordix" => "ANIMO","nombre"=>"carlos","puntaje"=>0,"intento"=>6];
    $coleccionPartidas[7] = ["palabraWordix" => "BEBES","nombre"=>"soho221","puntaje"=>15,"intento"=>1];
    $coleccionPartidas[8] = ["palabraWordix" => "BALAS","nombre"=>"abi","puntaje"=>13,"intento"=>3];
    $coleccionPartidas[9] = ["palabraWordix" => "PIANO","nombre"=>"master2000","puntaje"=>15,"intento"=>1];
    return $coleccionPartidas;    
}

/**
* busca una partida segun un nroingresado dentro del array coleccion
* @param INT $nroIngresado 
*/ 
function mostrarPartida ($nroPartida, $coleccionJugadores1){

    echo "Partida WORDIX N° ". ($nroPartida + 1).": palabra ".$coleccionJugadores1[$nroPartida]["palabraWordix"]."\n";
    echo "Jugador: ".$coleccionJugadores1[$nroPartida]["nombre"]."\n";
    echo "Puntaje: ".$coleccionJugadores1[$nroPartida]["puntaje"]." puntos \n";
    // compara si los intentos son 6 y el puntaje 0, no adivinó. El usuario
    // siempre va a llegar a los 6 intentos en caso de no adivinar.
    if ($coleccionJugadores1[$nroPartida]["intento"] == 6 && $coleccionJugadores1[$nroPartida]["puntaje"] == 0){
        echo "No adivinó la palabra.\n";
    }	
    else{
        echo "Adivinó en el intento: ".$coleccionJugadores1[$nroPartida]["intento"]."\n";
    }  
}

/**
* busca una partida segun un nombre ingresado dentro del array coleccion, si la encuentra, devuelve la posición, si no, -1
* @param STRING $nombre
* @param return int
*/
function buscarPartidaGanada($coleccionPartidas,$nombreAdd){
    $jugadorEncontrado = false;
    $condicion = true;
    $i = 0;
    $valor = -1;
    while ( $condicion == true && $i<count($coleccionPartidas) ) {
        if ($coleccionPartidas[$i]["nombre"] == $nombreAdd && $coleccionPartidas[$i]["puntaje"] > 0){
            $condicion = false;	
            $valor = $i;

        }    
        $i = $i+1;    
    }
    return $valor;
}

/** recorre el arreglo $coleccionPartidas buscando la clave "nombre" y llena el arreglo $resumenJugador con los datos
* @param ARRAY $coleccionArray
* @param STRING $nombreJugador
* @return ARRAY
*/
function estadisticasJugador($coleccionArray, $nombreJugador){
    /*int $i, array $resumenUser */
    //crear una colección sobre las jugadas del usuario
    $i = 0;
    $resumenPuntaje = 0; //preguntar a eze pq se inicializa esto
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
            }   
            switch($coleccionArray[$i]["intento"]){ //acá es "segun el nro que me devuelve lo que haya en esa posicion: 3
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
            }       
        }   
        $i = $i + 1;        // si $resumenUser["partida"] == 0 es porq nunca encontró al nombre buscado.
    }
    return $resumenUser;
}

/**
*@param ARRAY $coleccionResumen
*/
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
        }   
    }
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
* Dada una colección de palabras ya establecida por el programa principal, le agrega otra palabra ingresada por el usuario y verificada.
* @param array $coleccion
* @return array 
*/
function agregarPalabrasAColeccion($coleccion){
    /* string $palabraACargar */
    do {
        $palabraACargar = leerPalabra5Letras();
    } while(palabraYaIngresada(strtoupper($palabraACargar), $coleccion));

    $coleccion[count($coleccion)] = strtoupper($palabraACargar);
    return $coleccion;
} 

/**
* Verifica su una palabra pasada por parámentro se encuentra dentro del array coleccion (también pasado por parámetro).
* @param string $palabraABuscar
* @param array $coleccion
* @return boolean
*/
function palabraYaIngresada($palabraABuscar, $coleccion){
/* boolean $seEncuentra
int $longitud 
int $i */
    $seEncuentra = false;
    $longitud = count($coleccion);
    $i = 0;
    while($i < $longitud && $seEncuentra == false) {
        if(strcmp($palabraABuscar, $coleccion[$i]) === 0){
            echo 'Ha ingresado una palabra que ya se encuentra en la colección, pruebe nuevamente.' . "\n";
            $seEncuentra = true;
        }
        $i++;
    }
    return $seEncuentra;
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

/* INT $opcion, $countPartidas1, $numeroDePartida, $nroDePalabra,$valorEncontrado
   STRING $nombreUser
   ARRAY $partidaJugada, $resumenJugador, $coleccionArray, $coleccionPalabrasMain
*/

//Inicialización de variables:

$coleccionArray = cargarPartidas();
$coleccionPalabrasMain = cargarColeccionPalabras();
$nroDePalabra = 0;
$partidaJugada = [];
$countPartidas1 = 0;
$opcion = 0;
$numeroDePartida = 0;
$valorEncontrado = 0;
$resumenJugador = [];
$nombreUser = "";

//PROGRAMA MAIN

do {
    
    $opcion = seleccionarOpcion ();
    
    switch ($opcion){
        case 1: echo "JUGAR WORDIX CON UNA PALABRA ELEGIDA \n";
            $nombreUser = solicitarJugador();
            $nroDePalabra = solicitarNumeroEntre(0, (count($coleccionPalabrasMain)-1));
            $partidaJugada = jugarWordix($coleccionPalabrasMain[$nroDePalabra],$nombreUser);
            // CARGAR LA NUEVA PARTIDA EN LA COLECCIONARRAY DEBERÍA SER EN UN MODULO?
            $countPartidas1 = count($coleccionArray);
            $coleccionArray[$countPartidas1] = ["palabraWordix"=> $partidaJugada["palabraWordix"], "nombre"=> $partidaJugada["jugador"],"puntaje"=> $partidaJugada["puntaje"],"intento"=> $partidaJugada["intentos"]];

        break;
        case 2: echo "JUGAR WORDIX CON UNA PALABRA ALEATORIA \n";
            $nombreUser = solicitarJugador();
            $nroDePalabra = rand(0,count($coleccionPalabrasMain));
            $partidaJugada = jugarWordix($coleccionPalabrasMain[$nroDePalabra],$nombreUser);
            // CARGAR LA NUEVA PARTIDA EN LA COLECCIONARRAY DEBERÍA SER EN UN MODULO?
            $countPartidas1 = count($coleccionArray);
            $coleccionArray[$countPartidas1] = ["palabraWordix"=> $partidaJugada["palabraWordix"],"nombre"=> $partidaJugada["jugador"],"puntaje"=> $partidaJugada["puntaje"],"intento"=> $partidaJugada["intentos"]];

        break;
        case 3:
            $numeroDePartida = solicitarNumeroEntre(0, (count($coleccionArray)-1));
            echo "\n";
            mostrarPartida($numeroDePartida,$coleccionArray);
        break;
        case 4: 
            $nombreUser = solicitarJugador();
            $valorEncontrado = buscarPartidaGanada($coleccionArray,$nombreUser);
            if($valorEncontrado == -1){
                echo "No se encontró resultado. \n";
            }
            else{
                mostrarPartida($valorEncontrado, $coleccionArray)."\n";
            }

        break;
        case 5:
            $nombreUser = solicitarJugador();
            $resumenJugador = estadisticasJugador($coleccionArray,$nombreUser);
            if($resumenJugador["partidas"] != 0){
                showEstadisticas($resumenJugador);
            }
            else{
                echo "No existe el jugador ".$nombreUser. ". \n";
            }
        break;
        case 6:
            echo "Mostrar listado de partidas ordenadas por jugador y por palabra \n";
            showColeccionOrdenada($coleccionArray); 
        break;
        case 7: 
            $coleccionPalabras = agregarPalabrasAColeccion($coleccionPalabrasMain);
            echo "\n";
        break;
    }
} while ($opcion != 8);


