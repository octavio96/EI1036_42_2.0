<?php
    //view_form.php

/**
 * * Descripción: Ejemplo de proyecto
 * *
 * * 
 * *
 * * @author  Rafael Berlanga
 * * @copyright 2020 Rafa B.
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 1

 * */

session_start();

include(dirname(__FILE__)."/includes/ejecutarSQL.php");
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");

include(dirname(__FILE__)."/includes/conector_BD.php");
include(dirname(__FILE__)."/includes/table2html.php");
include(dirname(__FILE__)."/includes/tabla_productos.php");

include(dirname(__FILE__)."/includes/registrar_usuario.php");
include(dirname(__FILE__)."/includes/autentificar_usuario.php");
include(dirname(__FILE__)."/includes/tabla_usuarios.php");

include(dirname(__FILE__)."/includes/registrar_producto.php");
include(dirname(__FILE__)."/includes/realizarCompra.php");
include(dirname(__FILE__)."/includes/ver_cesta.php");


if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";

$central = "Partials/centro.php";

switch ($action) {
    case "home":
        $central = "/partials/centro.php";
        break;
    case "nosotros":
        $central = "/partials/nosotros.php";
        break;
    case "usuarios_registrados":
        $central = tabla_usuarios();
        break;
    case "login": 
        $central = "/partials/login.php"; //formulario login 
        break;
    case "do_login":
        $central = autentificar_usuario(); //fijar $_SESSION["usuario"]
	$_SESSION["cesta"] = array();
        break;
    case "registrar_usuario":
        $central = "/partials/registro_usuario.php"; //formulario usuarios
        break;
    case "insertar_usuario":
        $central = registrar_usuario("usuarios"); //tabla usuarios
        break;
    case "listar_productos":
        $central = table2html("productos"); //tabla productos
        break;
    case "ver_productos":
        $central = tabla_productos("productos"); //tabla productos
        break;
    case "registrar_producto":
        $central = "/partials/registro_producto.php"; //formulario producto
        break;
    case "insertar_producto":
        $central = registrar_producto("productos"); //tabla productos
        break;
    case "ver_cesta":
        $central = ver_cesta(); //cesta en $_SESSION["cesta"]
        break;
    case "añadir_cesta":
        array_push($_SESSION["cesta"], $_GET["product"]);
        $central = ver_cesta(); //tabla compras
        break;
    case "realizar_compra":
         if ($_SESSION["id_usuario"]=="") {
            $central = "/partials/login.php";
        } else {
            $central = realizarCompra();
        } //cesta en $_SESSION["cesta"] //cesta en $_SESSION["cesta"]
        break;
    case "logout":
        $_SESSION["usuario"] = null;
        $_SESSION["id_usuario"] = "";
        $_SESSION["cesta"] = null;
        $central="/partials/centro.php";
        break;
    default:
        $data["error"] = "Accion No permitida";
        $central = "/partials/centro.php";
}

if ($central <> "") include(dirname(__FILE__).$central);

include(dirname(__FILE__)."/partials/footer.php");
?>
