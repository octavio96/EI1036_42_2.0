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
/*
        $cliente = $_REQUEST["client_id"];
        $producto = $_REQUEST["product_id"];
        array_push($_SESSION["cesta"], $producto);    
        $table = "t_producto";
*/
	array_push($_SESSION["cesta"], $_GET["product"]);
        $central = table2html($table);
        break;
    case "BorrarProductoCesta":
	$item_id = $_REQUEST["item_id"];
        $key = array_search($item_id, $_SESSION["cesta"]);
        unset($_SESSION["cesta"][$key]);
        $central = ver_cesta(); 
        break;
    case "realizar_compra":
         if ($_SESSION["id_usuario"]=="") {
            $central = "/partials/login.php";
        } else {
	    $table = "t_compra";
    	    $client_id = $_SESSION["usuario_id"];
    	    $product_id = $_REQUEST["item_id"];
            $central = realizarCompra($table,$cliente_id,$producto_id);
        } //cesta en $_SESSION["cesta"] //cesta en $_SESSION["cesta"]
        break;
    case "logout":
        $_SESSION["usuario"] = null;
        $_SESSION["id_usuario"] = "";
        $_SESSION["cesta"] = null;
        $central="/partials/centro.php";
        break;
   case "upload":
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["foto_url"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	  } else {
	    echo "Sorry, there was an error uploading your file.";
	  }
	
	$central = "/includes/registrar_producto.php";

    default:
        $data["error"] = "Accion No permitida";
        $central = "/partials/centro.php";
}

if ($central <> "") include(dirname(__FILE__).$central);

include(dirname(__FILE__)."/partials/footer.php");
?>
