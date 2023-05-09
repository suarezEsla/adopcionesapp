<?php
//FUNCIONES CRUD REFUGIO
function insertRefugio($refugio):bool{
    // Creo una nueva conexión e inserto el refugio en la BBDD
    $midb = AccesoDatos::getModelo();
    $insert=$midb->insertRefugio($refugio);
    
    return $insert;
}

//FUNCIONES CRUD USUARIO
function insertUser($user):bool{
    // Creo una nueva conexión e inserto el refugio en la BBDD
    $midb = AccesoDatos::getModelo();
    $insert=$midb->insertUsu($user);
    
    return $insert;
}

//FUNCIONES CRUD ANIMALES
?>