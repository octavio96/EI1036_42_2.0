  
<?php

function registrar_usuario($table)
{
    global $pdo;

    $datos = $_REQUEST;
    if (count($_REQUEST) < 8) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO $table (name, surname, role, passwd, address, city, zip_code, foto_file)
                          VALUES (?,?,?,?,?,?,?,?)";
    try { 
        $consult = $pdo -> prepare($query);
        $a = $consult->execute(array($_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['role'], $_REQUEST['passwd'], $_REQUEST['address'], $_REQUEST['city'], $_REQUEST['zip_code'], $_REQUEST['foto_file'] ));

        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else echo "<h1> Usuario registrado! </h1>";

        $_SESSION["usuario"] = "normal";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>
