<?php
 
function conectDB() : mysqli{
    
    $db = new mysqli('localhost', 'root', 'root','realstates_crud');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}
