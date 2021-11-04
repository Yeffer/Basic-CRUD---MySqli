<?php
require_once("clsUsuario.php");

$objUsuario = new clsUsuario();

$arrUsuarios = $objUsuario->read();

$idEditar = NULL;

$txtNombre = NULL;
$txtEstado = NULL;


if (!empty($_GET['ID_CONTRATO'])) {

    $idEditar = $_GET['ID_CONTRATO'];

    $arrReistro = $objUsuario->consulta_uno($idEditar);

    $txtNombre = $arrReistro['NOMBRE'];
    $txtEstado = $arrReistro['ESTADO'];
}
?>
<!DOCTYPE html>
<html>
  <head>
        <meta charset="UTF-8">
        <title>CRUD -- MySqli</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css"> 
    </head>
    <body>

   <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="acciones_usuario.php" method="POST" >            
                    <input type="hidden" name="ID_CONTRATO" value="<?php echo $idEditar ?>" />
                    <div class="form-group">
                        <h6></h6>
                        <label for="name" class="col-sm-2 control-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text"  name="txtNombre" value="<?php echo $txtNombre ?>" placeholder="Nombre" required data-msg="Nombre Requerido" >
                        </div>
                    </div>                            
                    <div class="form-group">
                        <label for="street" class="col-sm-2 control-label">Estado:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="txtEstado" value="<?php echo $txtEstado ?>" placeholder="Estado" required data-msg='Estado Requerido'>
                        </div>
                    </div>                                    
                    <div class="form-group">                        
                        <div class="col-lg-8">
                            <input class="btn btn-success" type="submit" name="accion" id="crear" value="Guardar" />
                        </div>
                    </div>                                            
                </form>
            </div>
        </div>
    </div><br>

    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NOMBRE</th>
                        <th>ESTADO</th>                          
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($arrUsuarios as $arrUsuario) {
                        echo "<tr>";
                            echo "<td>" . $arrUsuario['ID_CONTRATO'] . "</td>";
                            echo "<td>" . $arrUsuario['NOMBRE'] . "</td>";
                            echo "<td>" . $arrUsuario['ESTADO'] . "</td>";                          
                            echo "<td><a href='index.php?ID_CONTRATO=" . $arrUsuario['ID_CONTRATO'] . "' class='btn btn-info glyphicon glyphicon-edit' ></a> </td>";
                            echo "<td><a href='acciones_usuario.php?accion=eliminar&ID_CONTRATO=" . $arrUsuario['ID_CONTRATO'] . "'class='btn btn-danger glyphicon glyphicon-trash '></a></td>";                                
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 
    </body>
</html>       