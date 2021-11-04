<?php
if ( ! empty($_REQUEST['accion'])) {
  $strAccion = $_REQUEST['accion'];
}

if ( ! empty($_POST['txtNombre'])) {
  $txtNombre = $_POST['txtNombre'];
}

if ( ! empty($_POST['txtEstado'])){
  $txtEstado = $_POST['txtEstado'];
}

$idRegistro = NULL;

if ( ! empty($_POST['ID_CONTRATO'])) {
  $idRegistro = $_POST['ID_CONTRATO'];
}

require_once ("clsUsuario.php");

$objUsuario = new clsUsuario();

switch ($strAccion) {
  case "Guardar":

    if (empty($idRegistro)) {
      $objUsuario->create($txtNombre, $txtEstado);
    }
    else {
      $objUsuario->update($idRegistro, $txtNombre, $txtEstado);
    }

    break;

  case "eliminar":
    
    $idRegistro = $_GET['ID_CONTRATO'];
    
    $objUsuario->delete($idRegistro);
    break;
}

header("Location: index.php");
