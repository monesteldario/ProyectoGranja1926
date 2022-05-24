<?php 
require_once 'conector/accesoBD.php';

$conexionAbierta = Iniciar();

$conexionAbierta -> next_result();

//$conexionAbierta -> next_result();

if(isset($_POST['ActualizarCliente'])){ 
  $idCliente = $_POST['cedCliente'];
  $nomCliente = $_POST['nombreCliente'];
  $telCliente = $_POST['telCliente'];
  $direcCliente = $_POST['direccionCliente'];
  $domiCliente = $_POST['domCliente'];
  $queryActualizarCliente= "call ActualizarCliente('$idCliente','$nomCliente','$telCliente','$direcCliente','$domiCliente')";
  
  if($conexionAbierta -> query($queryActualizarCliente)){
    echo '<script>
        location.replace("registroClientes.php");
        </script>';
  }else{
    echo $conexionAbierta -> error;
  }
  
  echo '<script type="text/javascript"> alert("Datos de la persona actualizados.");</script>';
}
$conexionAbierta -> next_result();

if(isset($_POST['Buscar'])){ 
  $codCliente = $_POST['cedCliente'];
  $queryCliente= "call ConsultarCliente('$codCliente')";
  $resultadoCliente = $conexionAbierta -> query($queryCliente);
  $clienteEncontrado = mysqli_fetch_array($resultadoCliente);
  echo '<script type="text/javascript"> data-target=("#actualizarModalSuministro");</script>';
}
$conexionAbierta -> next_result();

if(isset($_POST['btnElimCliente'])){ 
  $codCliente = $_POST['cedCliente'];
  $queryQuitarCliente= "call EliminarCliente('$codCliente')";
  
  if($conexionAbierta -> query($queryQuitarCliente)){
    echo '<script>
        location.replace("registroClientes.php");
        </script>';
  }else{
    echo $conexionAbierta -> error;
  }
  
  echo '<script type="text/javascript"> alert("Cliente Eliminado");</script>';
}
Finalizar($conexionAbierta);


?>

<!-- Modal -->
<div class="modal fade" id="actualizarModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><strong>Actualizar Cliente.</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
              <label>Digite la cédula del cliente:</label>
              <input type="number" id="cedCliente" name="cedCliente" class="form-control form-control-sm" required="">
              <br>
              <input type="submit" value="Buscar" id="Buscar" name="Buscar" class="btn hvr-hover" style="color: aliceblue;">
          </form>
          <form  method="post">
              <hr>
              <label>Cédula del Cliente:</label>
              <input type="number" id="cedCliente" name="cedCliente" class="form-control form-control-sm"  value = 
              <?php 
              if(!empty($clienteEncontrado['CED_CLIENTE'])){
                echo $clienteEncontrado['CED_CLIENTE'] ;
               }else{
               
              }
              
              ?>>
              <label>Nombre:</label>
              <input type="text" id="nombreCliente" name="nombreCliente" class="form-control"  value = 
              <?php 
              if(!empty($clienteEncontrado['NOM_CLIENTE'])){
                echo $clienteEncontrado['NOM_CLIENTE'];
               }else{
               
              }
               
              ?>>
              <label>Teléfono:</label>
              <input type="number" id="telCliente" name="telCliente" class="form-control form-control-sm" value = 
              <?php 
              if(!empty($clienteEncontrado['TEL_CLIENTE'])){
                echo $clienteEncontrado['TEL_CLIENTE'] ;
               }else{
               
              }
              
              ?>>
              <label>Dirección:</label>
              <input type="text" id="direccionCliente" name="direccionCliente" class="form-control form-control-sm" value = 
              <?php 
              if(!empty($clienteEncontrado['DIREC_CLIENTE'])){
                echo $clienteEncontrado['DIREC_CLIENTE'];
               }else{
               
              }
             
              ?>>
              <label>Domicilios:</label>
              <input type="text" id="domCliente" name="domCliente" class="form-control form-control-sm" value = 
              <?php 
              if(!empty($clienteEncontrado['DOMICILIOS'])){
                echo $clienteEncontrado['DOMICILIOS'];
               }else{
               
              }
              
               
              ?>>
              <br>
               <input type="submit" value="Actualizar" id="ActualizarCliente" name="ActualizarCliente" class="btn hvr-hover" style="color: aliceblue;">
               <button class="btn hvr-hover"  name="btnElimCliente" id="btnElimCliente" 
               style="background-color:#E74C3C; border: 0px solid transparent; cursor:pointer; height:38px; color: aliceblue;" >
               <i class="fas fa-trash fa-1x" style="color: white;"></i>  Eliminar Cliente</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
