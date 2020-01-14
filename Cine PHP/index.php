<!--
    Realizado por Hernando Henao Bedoya C.C. 1214748535
    Desarrollo Web con PHP
    Taller "Uso de formularios para transferencia"
-->
<!DOCTYPE html>
<html>

    <head>
        <title>Reserva de asientos</title>
        <meta charset="utf-8"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="css/index_style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="container">
            <div class="row col-xs-12">

                <h1>Reserva de asientos</h1>

                <?php
                /* Se requieren las funciones para imprimir el escenario
                 * y para enviar las acciones del usuario.
                 */
                require("escenario.php");
                require("accion.php");

                /** Se captura la información del formulario,
                 * se conviete la lista a un array,
                 * para luego realizar la acción solicitada
                 * y finalmente imprimir las sillas
                 * 
                 */
                if (isset($_REQUEST["Enviar"])) {
                    $fila = $_POST['fila'];
                    $puesto = $_POST['puesto'];
                    $accion = $_POST['accion'];
                    $StringEscenario = $_POST['lista'];
                    $count = 0;
                    for ($i = 0; $i < 5; $i++) {
                        for ($j = 0; $j < 5; $j++) {
                            $count = 5 * $i + $j;
                            $lista[$i][$j] = substr($StringEscenario, $count, 1);
                        }
                        $count = 0;
                    }
                    $lista = Accion($fila, $puesto, $accion, $lista);
                    Escenario($lista);
                }
                /**
                 * En caso de recargar pagina u oprimir el botón borrar
                 * se liberan todas las sillas
                 */ else if (isset($_REQUEST["Reset"]) || !isset($_REQUEST["Enviar"])) {
                    $lista = array(array("L", "L", "L", "L", "L"),
                        array("L", "L", "L", "L", "L"),
                        array("L", "L", "L", "L", "L"),
                        array("L", "L", "L", "L", "L"),
                        array("L", "L", "L", "L", "L"));
                    Escenario($lista);
                }
                ?>

                <form method="POST">
                    <input type="hidden" name="lista" value="<?php
                    foreach ($lista as $fila) {
                        foreach ($fila as $puesto) {
                            echo $puesto;
                        }
                    }
                    ?>"  />

                    <label>Fila:</label>
                    <input type="text" name="fila" placeholder="Escribe una fila" required>

                    <label>Puesto:</label>
                    <input type="text" name="puesto" placeholder="Escribe un puesto" required>

                    <label>Acción:</label>
                    <select name="accion" id="accion" required>
                        <option value="" disabled selected hidden>Selecciona una acción</option>
                        <option value="R">Reservar</option>
                        <option value="V">Comprar</option>
                        <option value="L">Liberar</option>
                    </select>

                    <input type="submit" value="Enviar" name="Enviar" />

                    <input type="submit" value="Borrar" name="Reset" />

                </form>
            </div>
        </div>

    </body>
