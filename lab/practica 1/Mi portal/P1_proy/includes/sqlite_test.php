<?php

/* pdo debe ser sqlite en desarrollo */

$t_cliente  = 'clientes';
$t_producto = 'productos';
$t_compra   = 'compras';

$query = "CREATE TABLE  IF NOT EXISTS $t_cliente (
                                    client_id SERIAL PRIMARY KEY, 
                                    name CHAR(50) NOT NULL, 
                                    surname CHAR(50) NOT NULL,
                                    role CHAR(10),
                                    passwd TEXT,
                                    address CHAR(50),
                                    city CHAR(50),
                                    zip_code CHAR(5),
                                    foto_file VARCHAR(25) )";

$pdo -> exec($query);

$query = "INSERT INTO $t_cliente (name, surname, role) VALUES (?, ?, 'admin');";

$a = ejecutarSQL($query, ["Jefe", "Supremo"]);

if (0>$a) echo "No pude crear el usuario admin";

$query = "CREATE TABLE IF NOT EXISTS $t_producto (product_id SERIAL PRIMARY KEY, 
                                    name CHAR(50) NOT NULL,
                                    price FLOAT NOT NULL,
                                    foto_url VARCHAR(25) )";

$pdo -> exec($query);

$query = "INSERT INTO $t_producto (name, price) VALUES (?, ?)";

ejecutarSQL($query, ["Leggins", 20.8]);
ejecutarSQL($query, ["Esterilla", 15.0]);

$query = "CREATE TABLE IF NOT EXISTS $t_compra (item_id SERIAL PRIMARY KEY, 
                                    client_id INTEGER NOT NULL,
                                    product_id INTEGER NOT NULL,
                                    )";

$pdo -> exec($query);

/*$query = "SELECT * FROM  $t_producto;";

$rows = $pdo->query($query);

foreach($rows as $row){
	print_r($row);
}*/

?>
