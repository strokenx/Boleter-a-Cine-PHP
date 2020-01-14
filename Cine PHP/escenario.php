<?php

/**
  Realizado por Hernando Henao Bedoya C.C. 1214748535
  Desarrollo Web con PHP
  Taller "Uso de formularios para transferencia"
 * */

/**
 * Función que crea una tabla y luego la llena por medio de un array.
 * @param type $lista array que contiene los datos de la tabla.
 */
function Escenario($lista) {
    echo "<table class='tg' id='asientos'>";
    echo "<tr>";
    echo "<th colspan='6'>ESCENARIO</th>";
    echo "<tr>";
    echo "<th></th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th> 
                <th>5</th>
            </tr>";
    $i = 1;
    foreach ($lista as $fila) {
        echo "<tr>";
        echo "<th>";
        echo $i;
        echo "</th>";
        foreach ($fila as $silla) {
            echo "<td>";
            echo $silla;
            echo "</td>";
        }
        echo "</tr>";
        $i++;
    }
    echo "</table>";
}
?>
