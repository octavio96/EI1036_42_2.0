//Solo grupos hacer si sobra tiempo
<?php

include(dirname(__FILE__)."/includes/conector_BD.php");
include(dirname(__FILE__)."/includes/ejecutarSQL.php");
include(dirname(__FILE__)."/includes/autentificar_usuario.php");

    
global $pdo;

$minimo = $_REQUEST["min"];
$maximo = $_REQUEST["max"];

$table = "t_producto";
$query = "SELECT * FROM  $table WHERE price >= $minimo AND price <= $maximo;";

header('Content-type: application/json');

$result = $pdo->prepare($query);
$result->execute();
$datos = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($datos);


?>
