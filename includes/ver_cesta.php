<?php

function ver_cesta()
{
    if(0<=count($_SESSION["cesta"])){
        echo "Cesta Vacía";
    } else {
        echo "<ul>";
        foreach($_SESSION["cesta"] as $k => $producto){
            if(0<=strlen($producto)){
                $eliminar = '?action=BorrarProductoCesta&item_id='.$producto;
                $comprar = '?action=realizar_compra&item_id='.$producto;    
                echo "<li> $producto <a href= $eliminar><button>Eliminar</button></a> <a href= $comprar><button>Comprar</button></a>";
            }
            else{
                echo "Cesta vacía";
            }
        }
      
        echo "</ul>";
    }
}
?>
