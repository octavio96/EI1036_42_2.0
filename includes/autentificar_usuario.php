<?php

function autentificar_usuario()
{
    global $pdo;

    /*
    buscar usuario y passwd en DB y comparar con $_POST
    según el resultado fijar la variable de sesion of mostar error

    $_SESSION["usuario"] = role
    */
    $nombre_user = $_REQUEST["nombre"];
    $contrasena_user = $_REQUEST["passwd"];
    $query = "SELECT * FROM clientes WHERE name = '$nombre_user'"; 

    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    if (is_array($rows)) {
        $_SESSION["usuario_id"] = array_values(array_values($rows)[0])[0];
        $_SESSION['usuario'] = array_values(array_values($rows)[0])[3];
        print "Success ".$_SESSION['usuario'];
    } else {
        print "No registrado";
    }

}

?>
