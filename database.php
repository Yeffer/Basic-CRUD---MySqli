<?php

function connect_db() {

    $strHost = "localhost";
    $strUser = "root";
    $strPassword = "";
    $strDBName = "prueba";
    
    $resLink = new mysqli($strHost, $strUser, $strPassword, $strDBName);

    if ($resLink === FALSE) {
        die("Error de conexion a la DB. ");
    }

    $bolResult = @mysqli_select_db($strDBName);

    if ($bolResult === FALSE) {
        die("Error la DB no existe! " . $strDBName);
    }

    return $resLink;
}

function consultar_db($strSQL) {
    
    $mysqli = connect_db();    

    $resQuery = $mysqli->query($strSQL);
    
    if ($resQuery === FALSE) {
        die("No se pudo ejecutar la consulta en la base de datos: " . mysqli_error());
    }

    if ($resQuery === TRUE) {
        return TRUE;
    }

    $arrTodos = array();

    while ($arrFila = @mysqli_fetch_assoc($resQuery)) {
        $arrTodos[] = $arrFila;
    }

    return $arrTodos;
}
