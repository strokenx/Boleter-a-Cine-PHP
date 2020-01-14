<?php

/**
  Realizado por Hernando Henao Bedoya C.C. 1214748535
  Desarrollo Web con PHP
  Taller "Uso de formularios para transferencia"
 * */

/**
 * Funcion que devuelve un array modificado en base a la acción requerida,
 * y muestra una advertencia si el asiento esta vendido.
 * @param type $fila donde se encuentra el asiento.
 * @param type $puesto donde se encuentra el asiento.
 * @param type $accion a utilizarse.
 * @param type $lista de asientos.
 * @return type
 */
function Accion($fila, $puesto, $accion, $lista) {
    if ($lista[$fila - 1][$puesto - 1] == "L") {
        $lista[$fila - 1][$puesto - 1] = $accion;
    } else if ($lista[$fila - 1][$puesto - 1] == "V") {
        echo "<script>alert('";
        if ($accion == "L" || $accion == "R" || $accion == "V") {
            echo " La operación no puede ser realizada";
        }
        echo "')";
        echo "</script>'";
    } else if ($lista[$fila - 1][$puesto - 1] == "R" && $accion != "R") {
        $lista[$fila - 1][$puesto - 1] = $accion;
    }
    return $lista;
}
?>

