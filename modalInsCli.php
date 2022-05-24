<?php 
require_once 'conector/accesoBD.php';

$conexionAbierta = Iniciar();

$conexionAbierta -> next_result();

if(isset($_POST['Insertar'])){
                
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $entrega = $_POST['entrega'];

    $queryAgrega = "call RegistrarCliente('$cedula','$nombre','$telefono','$direccion','$entrega')";

    if($conexionAbierta -> query($queryAgrega)){
      echo '<script>
          location.replace("registroClientes.php");
          </script>';
    }else{
      echo $conexionAbierta -> error;
    }
  } 

  Finalizar($conexionAbierta);



?>
<!-- Modal -->
<div class="modal fade" id="insertarModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><strong>Agregar Nuevo Cliente</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="frminsert" onsubmit="" method="post">
              <label>Cédula del Cliente:</label>
              <input type="number" id="cedula" name="cedula" class="form-control form-control-sm" required="">
              <label>Nombre Completo:</label>
              <input type="text" id="nombre" name="nombre" class="form-control form-control-sm" required="">
              <label>Teléfono</label>
              <input type="text" id="telefono" name="telefono" class="form-control form-control-sm" required="">
              <label>Dirección:</label>
              <input type="text" id="direccion" name="direccion" class="form-control form-control-sm">
              <label>Entrega:</label>
              <input type="text" id="entrega" name="entrega" class="form-control form-control-sm">
              <br>
              <input type="submit" value="Insertar" name="Insertar" class="btn hvr-hover" style="color: aliceblue;">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>


