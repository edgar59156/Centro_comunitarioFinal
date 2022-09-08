<?php
    include('ws.php');
    foreach($productos_proveedor_externo as $key => $value){
        echo $value->producto;
    }

?>