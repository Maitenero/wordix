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
    /* int $opcionSelec */
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
            $esValido = is_int($opcionSelec);
            if (!$esValido){
                echo "Seleccione una opcion valida. \n";
                echo "\n";
                $condicionOpcion = false; 
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
/* function partidasCargadas(){
    $partidas = ["GATOS","juan","0","6",
                "MELON","carlos","0","6",
                "MUJER","ezequiel", "0","6",
                "BALAS", "martin","0","6",
                "BALAS","abi","0","6",
                "MUJER","carlos","0","6",
                "CASAS","fernando", "0","6",
                "MELON","fernando","0","6",
                "ANIMO","martin","0","6",
                "BEBES","soho221","0","6",];
    return $partidas;
}
function cargarPartidas($arregloDePartidas){
    $i = 0;
    $j = 0;
    $coleccionPartidas = [];
    while ($i < count($arregloDePartidas)-3){
        $datosPartidas = [];
        $datosPartidas["palabraWordix"] = $arregloDePartidas[$i];
        $datosPartidas["nombre"] = $arregloDePartidas[$i+1];
        $datosPartidas["intentos"] = (int)($arregloDePartidas[$i+2]);
        $datosPartidas["puntaje"] = (int)($arregloDePartidas[$i+3]);
        $coleccionPartidas[$j] = $datosPartidas;
        $i += 4; 
        $j +=1;
    }
    return $coleccionPartidas;
}

$partidasDefault = partidasCargadas();
$coleccionPartidas1 = cargarPartidas($partidasDefault);
for($i = 0; $i < count($coleccionPartidas1); $i++){
    echo $coleccionPartidas1[$i]["palabraWordix"]."\n";  //echos solo para testear el funcionamiento
    echo $coleccionPartidas1[$i]["nombre"]."\n";
    echo $coleccionPartidas1[$i]["intentos"]."\n";
    echo $coleccionPartidas1[$i]["puntaje"]."\n";
    echo "termina"."\n";
}
*/


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);


//PROGRAMA MAIN
/*
do {
    echo "Seleccione una opción: ";
    $opcion = trim(fgets(STDIN));

    
    switch ($opcion) {
        case 1: 
            // Se le solicita al user nombre y un número (para determinar una palabra). Si el número ya fue elegido previamente, se le solicita otro número.
            Luego de que una partida haya sido terminada, éstos datos se deberán guardar en una estructura de datos ($partidas[]).
        
            break;
        case 2: 
            // Jugar con una palabra random: Se le solicita al user su nombre, se seleccionará una palabra aleatoria disponible QUE NO HAYA SIDO USADA.
            Luego de que una partida haya sido terminada, éstos datos se deberán guardar en una estructura de datos ($partidas[]).

            break;
        case 3: 
            //mostrar una partida: Se le solicta al user un número de partida y se mostrará por pantalla los siguientes datos:

                a) PARTIDA WORDIX <$numero>: palabra <$palabra>
                b) Nombre del jugador.
                c) el puntaje que obtuvo.
                d) Intentos: No adivinó || Adivinó en "X" intentos.

            break;
        case 4:
            //Mostrar la primera partida ganadora: Se le solicita al user un nombre de jugador y se muestra la primera victoria de dicho jugador con los siguientes datos:

                a) PARTIDA WORDIX " (nro de la partida que ganó) ": palabra " . (palabra que adivinó) 
                b) nombre del jugador
                c) El puntaje que obtuvo.
                d) En cuántos intentos logró adivinar la palabra.
    
            break;
        case 5:
            //5) Mostrar las estadísticas de un jugador: Se le solicita al user nombre de un jugador y se muestran los siguientes datos:

                a) Nombre del jugador
                b) cantidad de partidas ganadas
                c) El total de puntajes.
                d) Total de victorias
                e) Porcentaje de victorias.
                f) En que intento adivnó.

            break;
        case 6: 
             //Mostrar el listado de todas las partidas jugadas ordenadas por jugador y palabras: Se muestra por pantalla la estructura ordenada alfabeticamente por jugador y palabra.

            break;
        case 7: 
            //Agregar una palabra de 5 letras: Se le solicita al user una palabra de 5 letras para agregar a la biblioteca de palabras.

            break;
        case 8: 
            //SALIR

            break;
    }
} while ($opcion != 8);
*/
