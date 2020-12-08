<?php

function registrar_compra($table, $usuario_id, $item_id)
{
    global $pdo;

    $datos = $_REQUEST;
    if (count($_REQUEST) < 2) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    
    $query = "INSERT INTO $table (client_id, product_id)
                          VALUES (?, ?)";
    try { 
        $consult = $pdo -> prepare($query);
        $a = $consult->execute(array($usuario_id, $item_id));

        if (1>$a) print "<h1> Compra fallida </h1>";
        else print "<h1> Compra realizada! </h1>";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>
