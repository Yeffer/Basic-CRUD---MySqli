<?php
require_once("database.php");

connect_db();

class clsUsuario
{

  function create($nombre, $estado)
  {
    $strSQL = "INSERT INTO `prueba`.`contratos` (`NOMBRE`, `ESTADO` ) VALUES ('$nombre', '$estado')";
    consultar_db($strSQL);
  }

  function read()
  {
    $strSQL = "SELECT * FROM contratos";
    $arrDatos = consultar_db($strSQL);
    return $arrDatos;
  }

  function update($id_contrato, $nombre, $estado)
  {
    $strSQL = "UPDATE contratos SET NOMBRE='$nombre', ESTADO='$estado' WHERE  ID_CONTRATO= $id_contrato";
    consultar_db($strSQL);
  }

  function delete($id_contrato)
  {
    $strSQL = "DELETE FROM contratos WHERE ID_CONTRATO = $id_contrato ";
    consultar_db($strSQL);
  }
  
  function consulta_uno( $id_contrato )
  {
    
    $strSQL = "SELECT * FROM contratos WHERE ID_CONTRATO = $id_contrato";
    $arrDatos = consultar_db($strSQL);
    
    $arrRegisto = array_shift($arrDatos);
    
    return $arrRegisto;    
  }
}
