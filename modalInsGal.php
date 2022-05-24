<?php 
require_once 'conector/accesoBD.php';

$conexionAbierta = Iniciar();

$conexionAbierta -> next_result();

if(isset($_POST['Insertar'])){
                
    $lote = $_POST['loteGallinas'];
    $cantidad = $_POST['cantidadGallinas'];
    $edad = $_POST['edadGallinas'];
    $vacunacion = $_POST['cboVacunacion'];
    

    $queryAgrega = "call RegistrarSupervision('$lote','$cantidad','$edad','$vacunacion',NOW())";

    if($conexionAbierta -> query($queryAgrega)){
      echo '<script>
          location.replace("inventarioGallinas.php");
          </script>';
    }else{
      echo $conexionAbierta -> error;
    }
  } 
  $conexionAbierta -> next_result();

  $queryVacuna = "call ObtenerVacunacion()";
  $resultadoVacunacion = $conexionAbierta -> query($queryVacuna);

  Finalizar($conexionAbierta);



?>
<!-- Modal -->
<div class="modal fade" id="insertarModalGallinas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><strong>Agregar Nuevos Datos</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="frminsert" onsubmit="" method="post">
              <label>Lote de Gallinas:</label>
              <input type="number" id="loteGallinas" name="loteGallinas" class="form-control form-control-sm" required="">
              <label>Cantidad de Gallinas:</label>
              <input type="text" id="cantidadGallinas" name="cantidadGallinas" class="form-control form-control-sm" required="">
              <label>Edad de Gallinas:</label>
              <input type="text" id="edadGallinas" name="edadGallinas" class="form-control form-control-sm" required="">
              <label>Vacunación:</label>
              <select id="cboVacunacion" name = "cboVacunacion"  class="form-control form-control-sm" required>
                <?php 

                    echo '<option value="">Seleccione...</option>'; 
                    if(!empty($resultadoVacunacion)){
                      While($opcion = mysqli_fetch_array($resultadoVacunacion))
                    {
                      echo '<option value =' . $opcion ["Id_Vacunacion"] . '>' . $opcion["Des_Vacunacion"] . '</option>';
                    }
                    }
                    
                ?>
              </select>
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


