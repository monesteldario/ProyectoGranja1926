<?php 
require_once 'conector/accesoBD.php';

$conexionAbierta = Iniciar();

$conexionAbierta -> next_result();

//$conexionAbierta -> next_result();

if(isset($_POST['ActualizarGallinas'])){ 
  $loteGallinas = $_POST['loteGallinas'];
  $cantGallinas = $_POST['cantGallinas'];
  $edadGallinas = $_POST['edadGallinas'];
  $vacuGallinas = $_POST['cboVacunacion'];
  
  $queryActualizarGallinas= "call ActualizarGallinas('$loteGallinas','$cantGallinas','$edadGallinas','$vacuGallinas')";
  
  if($conexionAbierta -> query($queryActualizarGallinas)){
    echo '<script>
        location.replace("inventarioGallinas.php");
        </script>';
  }else{
    echo $conexionAbierta -> error;
  }
  
  echo '<script type="text/javascript"> alert("Datos de la persona actualizados.");</script>';
}
$conexionAbierta -> next_result();

if(isset($_POST['Buscar'])){ 
  $loteG = $_POST['loteGallinas'];
  $queryGallina= "call ConsultarSupervision('$loteG')";
  $resultadoGallinas = $conexionAbierta -> query($queryGallina);
  if($conexionAbierta -> query($queryGallina)){
    echo '<script>
        location.replace("modalActGal.php");
        </script>';
  }else{
    echo $conexionAbierta -> error;
  }
  $gallinasEncontradas = mysqli_fetch_array($resultadoGallinas);
  echo '<script type="text/javascript"> data-target=("#actualizarModalSuministro");</script>';
}
$conexionAbierta -> next_result();

$queryVacuna = "call ObtenerVacunacion()";
$resultadoVacunacion = $conexionAbierta -> query($queryVacuna);

Finalizar($conexionAbierta);


?>
<!-- Modal -->
<div class="modal fade" id="actualizarModalGallinas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><strong>Actualizar Gallinas.</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="" method="post">
              <label>Digite el lote de gallinas:</label>
              <input type="number" id="loteGallinas" name="loteGallinas" class="form-control form-control-sm" required="">
              <br>
              <input type="submit" value="Buscar" id="Buscar" name="Buscar" class="btn hvr-hover" style="color: aliceblue;">
          </form>
          <form id="frminsert" onsubmit="" method="post">
          <hr>
              <label>Lote de Gallinas:</label>
              <input type="number" id="loteGallinas" name="loteGallinas" class="form-control form-control-sm" value=
              <?php 
              if(!empty($gallinasEncontradas['LOTE_GALLINAS'])){
                 echo $gallinasEncontradas['LOTE_GALLINAS'];
              }else{
                
              }
               
              ?>>
              <label>Cantidad de Gallinas:</label>
              <input type="number" id="cantGallinas" name="cantGallinas" class="form-control form-control-sm"  value = 
              <?php 
              if(!empty($gallinasEncontradas['CANT_GALLINAS'])){
                echo $gallinasEncontradas['CANT_GALLINAS'];
               }else{
               
              }
              ?>>
              <label>Edad de Gallinas:</label>
              <input type="text" id="edadGallinas" name="edadGallinas" class="form-control form-control-sm"  value = 
              <?php
               if(!empty($gallinasEncontradas['EDAD_GALLINAS'])){
                echo $gallinasEncontradas['EDAD_GALLINAS'];
               }else{
               
              }
              
              ?>>
              <label>Vacunación:</label>
              <select id="cboVacunacion" name = "cboVacunacion"  class="form-control form-control-sm" required>
              <?php 
                                    foreach($resultadoVacunacion as $vacunas){
                                        if($vacunas['Id_Vacunacion'] == $gallinasEncontradas['VACUNACION']){
                                          echo '<option value =' . $vacunas ["Id_Vacunacion"] . ' selected>' . $vacunas["Des_Vacunacion"] . '</option>';
                                        }else{
                                          echo '<option value =' . $vacunas ["Id_Vacunacion"] . ' >' . $vacunas["Des_Vacunacion"] . '</option>';
                                        }
                                    }
                                    
                                     ?>
              </select>
              <br>
              <input type="submit" value="Actualizar" name="ActualizarGallinas" class="btn hvr-hover" style="color: aliceblue;">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
