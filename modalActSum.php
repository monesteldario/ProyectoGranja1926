<?php 
require_once 'conector/accesoBD.php';

$conexionAbierta = Iniciar();

$conexionAbierta -> next_result();

//$conexionAbierta -> next_result();

if(isset($_POST['Actualizar'])){ 
  $cedEmpresa = $_POST['cedEmpresa'];
  $nomEmpresa = $_POST['nombre'];
  $alimento = $_POST['alimento'];
  $vacunas = $_POST['vacunas'];
  $queryActualizarP= "call ActualizarProveedor('$cedEmpresa','$nomEmpresa','$alimento','$vacunas')";
  
  
  if($conexionAbierta -> query($queryActualizarP)){
    echo '<script>
        location.replace("inventarioSuministro.php");
        </script>';
  }else{
    echo $conexionAbierta -> error;
  }

  echo '<script type="text/javascript"> alert("Datos del proveedor actualizados.");</script>';
}
$conexionAbierta -> next_result();

if(isset($_POST['Buscar'])){ 
  $cedEmpresa = $_POST['cedEmpresa'];
  $queryProveedor= "call ConsultarProveedores('$cedEmpresa')";
  $resultadoProveedor = $conexionAbierta -> query($queryProveedor);
  $proveedorEncontrado = mysqli_fetch_array($resultadoProveedor);
  
}
$conexionAbierta -> next_result();

if(isset($_POST['btnElimSuministro'])){ 
  $cedEmpresa = $_POST['cedEmpresa'];
  $queryEliminarProveedor= "call EliminarProveedor('$cedEmpresa')";
  

  if($conexionAbierta -> query($queryEliminarProveedor)){
    echo '<script>
        location.replace("inventarioSuministro.php");
        </script>';
  }else{
    echo $conexionAbierta -> error;
  }

  echo '<script type="text/javascript"> alert("Proveedor Eliminado");</script>';
}
Finalizar($conexionAbierta);


?>

<!-- Modal -->
<div class="modal fade" id="actualizarModalSuministro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><strong>Actualizar Suministro</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" method="post">
              <label>Digite la cédula jurídica de la empresa a actualizar:</label>
              <input type="number" id="cedEmpresa" name="cedEmpresa" class="form-control form-control-sm" required="">
              <br>
              <input type="submit" value="Buscar" id="Buscar" name="Buscar" class="btn hvr-hover" style="color: aliceblue;">
            </form>
            <form action="" method="post">
              <hr>
              <label>Cédula jurídica de la Empresa:</label>
              <input type="number" id="cedEmpresa" name="cedEmpresa" class="form-control form-control-sm"  value = 
              <?php 
              if(!empty($proveedorEncontrado['CED_EMPRESA'])){
                echo $proveedorEncontrado['CED_EMPRESA'] ;
               }else{
               
              }
             
              ?> readonly="true">
              <label>Nombre de la Empresa:</label>
              <input type="text" id="nombre" name="nombre" class="form-control"  value = 
              <?php 
              if(!empty($proveedorEncontrado['NOM_EMPRESA'])){
                echo $proveedorEncontrado['NOM_EMPRESA'] ;
               }else{
               
              }
              
              ?> >
              <label>Cantidad de Alimento:</label>
              <input type="number" id="alimento" name="alimento" class="form-control form-control-sm" value = 
              <?php 
              if(!empty($proveedorEncontrado['CANT_ALIMENTOS'])){
                echo $proveedorEncontrado['CANT_ALIMENTOS'];
               }else{
               
              }
              
              ?>>
              <label>Cantidad de Vacunas:</label>
              <input type="number" id="vacunas" name="vacunas" class="form-control form-control-sm" value = 
              <?php 
              if(!empty($proveedorEncontrado['CANT_VACUNAS'])){
                echo $proveedorEncontrado['CANT_VACUNAS'];
               }else{
               
              }
               
              ?>>
              <br>
               <input type="submit" value="Actualizar" id="Actualizar" name="Actualizar" class="btn hvr-hover" style="color: aliceblue;">
               <button class="btn hvr-hover"  name="btnElimSuministro" id="btnElimSuministro" 
               style="background-color:#E74C3C; border: 0px solid transparent; cursor:pointer; height:38px; color: aliceblue;" >
               <i class="fas fa-trash fa-1x" style="color: white;"></i>  Eliminar Proveedor</button>  
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
