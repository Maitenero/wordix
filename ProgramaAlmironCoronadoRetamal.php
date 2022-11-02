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

/* ... COMPLETAR ... 
$coleccionPartidas = [ $partida1,$partida2,$partida3,$partida4,$partida5,$partida6,$partida7,$partida8,$partida9,$partida10 ];

$partida1["palabra"] = "MUJER";
$partida1["nombre"] = "carlos";
$partida1["puntaje"] = 0;
$partida1["intento"] = 6; //verificar condicion, guardo 6 o guardo string de no gano

$partida2["palabra"] = "GATOS";
$partida2["nombre"] = "juan";
$partida2["puntaje"] = 0;
$partida2["intento"] = 6; //verificar condición

$partida3["palabra"] = "CASAS";
$partida3["nombre"] = "fernando";
$partida3["puntaje"] = 0;
$partida3["intento"] = 6; // verificarrrrrrr

$partida4["palabra"] = "MELON";
$partida4["nombre"] = "carlos";
$partida4["puntaje"] = 0;
$partida4["intento"] = 6; //verificar condición

$partida5["palabra"] = "MELON";
$partida5["nombre"] = "fernando";
$partida5["puntaje"] = 11;
$partida5["intento"] = 5; //verificar condición 

$partida6["palabra"] = "MUJER";
$partida6["nombre"] = "ezequiel";
$partida6["puntaje"] = 0;
$partida6["intento"] = 6; //verificar condición

$partida7["palabra"] = "ANIMO";
$partida7["nombre"] = "martin";
$partida7["puntaje"] = 0;
$partida7["intento"] = 6; //verificar condición

$partida8["palabra"] = "BALAS";
$partida8["nombre"] = "martin";
$partida8["puntaje"] = 0;
$partida8["intento"] = 6; //verificar condición

$partida9["palabra"] = "BEBES";
$partida9["nombre"] = "soho221";
$partida9["puntaje"] = 0;
$partida9["intento"] = 6; //verificar condición

$partida10["palabra"] = "BALAS";
$partida10["nombre"] = "abi";
$partida10["puntaje"] = 0;
$partida10["intento"] = 6; //verificar condición
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
