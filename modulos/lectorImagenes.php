<?php
/**
 * FORMATO DEL ARCHIVO TXT LEGIBLE.
 * - Las imagenes han de estar en una sola linea 
 * - Las imagenes han de ser JPG
 * - Se cogerá como descripción todo el texto que haya después de la imagen, hasta encotrar otra imagen o EOF.
 * - Solo imagenes .jpg
 */

/**
 * 
 * @param type $ruta ruta del archivo txt con las imagenes.
 * Extrae las imagenes de un archivo con texto e imagenes. 
 * SOLO IMAGENES JPG.
 * @return  Array de String de nombres de imagenes.jpg
 */

function getImagenesFichero($ruta) {
    $imagenes = array();
    $file = fopen($ruta, "r") or exit("Unable to open file!");
    //Output a line of the file until the end is reached
    while (!feof($file)) {
        $cadenaActual = (fgets($file));
        if (eregi('.jpg', $cadenaActual)) {
            $imagenes[] = $cadenaActual;
        }
    }
    fclose($file);
    return $imagenes;
}
/**
 * Extrae del archivo de texto las imagenes con su descripción.
 * La descripción de dicha imagen será todo el texto encontrado después de la linea con el nombre de la imagen, hasta encontrar la siguiente.
 * SOLO IMAGENES JPG.
 * 
 * @param type $ruta ruta del achivo txt con las imagenes y descripciones.
 * @return Array con dos arrays. Uno de imagenes con los nombres de las imagenes ("imagen.jpg") y otro con los string de comentarios de dichas imagenes
 * identificados por un int, el que relaciona una imagen con su descripción. Imagen[1] Descripcion[1]
 */
function getDescripcionActividad($ruta) {
    $imagenes = array();
    $texto = array();
    $file = fopen($ruta, "r") or exit("Unable to open file!");
    //Output a line of the file until the end is reached
    $i = -1;
    while (!feof($file)) {
        $cadenaActual = fgets($file);
        if (eregi('.jpg', $cadenaActual)) {
            $i++;
            $imagenes[$i] = $cadenaActual;
        } else
        if (isset($texto[$i]))
            $texto[$i] .= $cadenaActual;
        else
            $texto[$i] = $cadenaActual;
    }
    fclose($file);
    return array("imagenes" => $imagenes, "texto" => $texto);
}

?>
