<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

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
