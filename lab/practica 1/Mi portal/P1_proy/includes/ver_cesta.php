<?php

function ver_cesta()
{
    if(0 >= count($_SESSION["cesta"])){
        echo "Cesta Vacía";
    } else {
        echo "<ul>";
            foreach($_SESSION["cesta"] as $k => $v)
                if(0 < strlen($v)){
                    $linkCompra = '?action=realizar_compra&item_id=' .$v;
                    <a href = $linkCompra> <button> Comprar </button> </a></li>";
                } else {
                    echo "Cesta vacía.";
                } 
        echo "</ul>";
    }
}

?>
