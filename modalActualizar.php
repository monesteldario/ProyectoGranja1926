<?php 
require_once 'conector/accesoBD.php';

$conexionAbierta = Iniciar();

$conexionAbierta -> next_result();

//$conexionAbierta -> next_result();
if(isset($_POST['ActualizarProducto'])){ 
  $codProducto = $_POST['codigoProducto'];
  $cantProducto = $_POST['editarCantidad'];

  $queryActualizarProd= "call ActualizarProducto('$codProducto','$cantProducto')";
  

  if($conexionAbierta -> query($queryActualizarProd)){
    echo '<script>
        location.replace("inventarioHuevos.php");
        </script>';
  }else{
    echo $conexionAbierta -> error;
  }
  
  //echo '<script type="text/javascript"> alert("Datos del producto actualizados.");</script>';
}

$conexionAbierta -> next_result();

if(isset($_POST['Buscar'])){ 
  $codProducto = $_POST['codProducto'];
  $queryProducto= "call ConsultarProductos('$codProducto')";
  $resultadoProducto = $conexionAbierta -> query($queryProducto);
  $productoEncontrado = mysqli_fetch_array($resultadoProducto);
  //echo '<script type="text/javascript"> data-target=("#actualizarModalSuministro");</script>';
}

Finalizar($conexionAbierta);


?>

<!-- Modal -->
<div class="modal fade" id="actualizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><strong>Actualizar Cantidad.</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
              <label>Digite el código del producto:</label>
              <input type="number" id="codProducto" name="codProducto" class="form-control form-control-sm" required="">
              <br>
              <input type="submit" value="Buscar" id="Buscar" name="Buscar" class="btn hvr-hover" style="color: aliceblue;">
      </form>
      <form action="" method="post">
              <hr>
              <label>Código del Producto</label>
              <input type="number" id="codigoProducto" name="codigoProducto" class="form-control form-control-sm" required="" value = 
              <?php 
              if(!empty($productoEncontrado['IDPRESEN'])){
                echo $productoEncontrado['IDPRESEN'] ;
               }else{
               
              }
              
              ?>>
              <label>Cantidad</label>
              <input type="number" id="editarCantidad" name="editarCantidad" class="form-control form-control-sm" required="" value = 
              <?php 
              if(!empty($productoEncontrado['CANT_PRESEN'])){
                echo $productoEncontrado['CANT_PRESEN'];
               }else{
               
              }
              
              ?>>
              <br>
               <input type="submit" value="Actualizar Cantidad" id="ActualizarProducto" name="ActualizarProducto" class="btn hvr-hover" style="color: aliceblue;">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
