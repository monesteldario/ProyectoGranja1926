<?php 
require_once 'conector/accesoBD.php';

$conexionAbierta = Iniciar();

$conexionAbierta -> next_result();

if(isset($_POST['Insertar'])){
                
    $ced = $_POST['ced'];
    $nombre = $_POST['nombre'];
    $alimento = $_POST['alimento'];
    $vacunas = $_POST['vacunas'];

    $queryAgrega = "call RegistrarProveedor('$ced','$nombre','$alimento','$vacunas')";

    if($conexionAbierta -> query($queryAgrega)){
      echo '<script>
          location.replace("inventarioSuministro.php");
          </script>';
    }else{
      echo $conexionAbierta -> error;
    }
  } 

  Finalizar($conexionAbierta);



?>
<!-- Modal -->
<div class="modal fade" id="insertarModalSuministro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><strong>Agregar Nuevo Suministrador</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="" method="post">
              <label>Cédula Jurídica de la Empresa</label>
              <h5><strong> Recuerde que debe de ser un dato de 15 dígitos.</strong></h5>
              <input type="number" id="ced" name="ced" class="form-control form-control-sm" required="">
              <label>Nombre de la Empresa</label>
              <input type="text" id="nombre" name="nombre" class="form-control form-control-sm" required="">
              <label>Cantidad de Alimento</label>
              <input type="number" id="alimento" name="alimento" class="form-control form-control-sm">
              <label>Cantidad de Vacunas</label>
              <input type="number" id="vacunas" name="vacunas" class="form-control form-control-sm">
              <br>
              <input type="submit" value="Insertar" id="Insertar" name="Insertar" class="btn hvr-hover" style="color: aliceblue;">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>


