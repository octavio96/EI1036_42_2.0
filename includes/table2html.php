<?php

function table2html($table)
{

  global $pdo;

    $query = "SELECT * FROM  $table;";
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
        print '<table><thead>';
        foreach($rows[0] as $key => $value) {
            echo "<th>", $key,"</th>";
        }
        echo "<th> Añadir a la Cesta </th>";
        print "</thead>";
        foreach ($rows as $row) {
            print "<tr>";
            $link = '?action=añadir_cesta&client_id=' .$_SESSION["usuario_id"] .'&product=' .array_values($row)[0];
            foreach ($row as $key => $val) {
                echo "<td>", $val, "</td>";
            }
            echo "<td><a href=$link><button>Añadir a la cesta</button></a></td>";
            print "</tr>";
        }
        print "</table>";
    } 
    else
        print "<h1> No hay resultados </h1>"; 
}


?>
