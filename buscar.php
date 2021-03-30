<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>CUIM</title>
  <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
  <style type="text/css">
    body{
      font-size: 12px;
    }
  </style>
</head>

<body>

  <?php
  require_once ("config/db.php");
  require_once ("config/conexion.php");
  $dni = $_POST['dni'];
  ?>


  <!-- Esquema de datos Turnos Hospital Municipal-->
  <div class="container text-center">
    <div class="row">
      <caption>Resultados para turnos en Hospital Municipal</caption>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Obra Social</th>
            <th scope="col">Fecha de Atencion</th>
            <th scope="col">Hora de Atencion</th>
            <th scope="col">Especialidad</th>
            <th scope="col">Estado del turno</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //Esquema de datos TURNOS HOSPITAL
        $sql = "SELECT * FROM turnos WHERE dni='$dni' order by fecha_atencion DESC";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $originalDate = $row["fecha_atencion"];
            $newDate = date("d/m/Y", strtotime($originalDate));
            echo '        
            <tr>
            <td>' . $row["obra_social"]. '</td>
            <td>' . $newDate . '</td>
            <td>' . $row["hora_atencion"]. ' hs </td>
            <td>' . $row["especialidad"]. '</td>
            <td>' . $row["estado_turno"]. '</td>        
            </tr>
            ';
          }
        } else {
          echo "*** Sin resultados ***";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>    


  <!-- Esquema de datos Turnos Hospital Municipal-->
  <div class="container text-center">
    <div class="row">
      <caption>Tipos de Ayuda Social</caption>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID Ayuda Social</th>
            <th scope="col">Tipo de Ayuda</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //Esquema de datos TURNOS HOSPITAL
        $sql = "SELECT * FROM as_ayuda_soc_tipo";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {         
            echo '        
            <tr>
            <td>' . $row["id_ayuda_social"]. '</td>
            <td>' . $row["ayuda_social"]. '</td>
            </tr>
            ';
          }
        } else {
          echo " *** Sin resultados *** ";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>    



  <!-- Esquema de datos Turnos Hospital Municipal-->
  <div class="container text-center">
    <div class="row">
      <caption>Resultados para Ayuda Social</caption>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Fecha de Registro</th>
            <th scope="col">ID Ayuda Social</th>
            <th scope="col">Monto</th>
            <th scope="col">Motivo</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Decreto</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //Esquema de datos TURNOS HOSPITAL
        $sql = "SELECT * FROM as_ayuda_soc WHERE dni='$dni'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $originalDate = $row["fecha_registro"];
            $newDate = date("d/m/Y", strtotime($originalDate));            
            echo '        
            <tr>
            <td>' . $newDate. '</td>
            <td>' . $row["id_ayuda_social"]. '</td>
            <td>' . $row["monto"]. '</td>
            <td>' . $row["motivo"]. '</td>
            <td>' . $row["observaciones"]. '</td>
            <td>' . $row["nro_decreto"]. '</td>       
            </tr>
            ';
          }
        } else {
          echo " *** Sin resultados *** ";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>    

  <!-- Esquema de datos Turnos Hospital Municipal-->
  <div class="container text-center">
    <div class="row">
      <caption>Resultados para Materiales</caption>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nro Encuesta</th>
            <th scope="col">Fecha</th>
            <th scope="col">Materiales</th>
            <th scope="col">Motivo</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //Esquema de datos TURNOS HOSPITAL
        $sql = "SELECT * FROM as_materiales WHERE dni='$dni'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $originalDate = $row["fecha"];
            $newDate = date("d/m/Y", strtotime($originalDate));            
            echo '        
            <tr>
            <th>' . $row["nro_encuesta"]. '</th>
            <td>' . $newDate. '</td>
            <td>' . $row["materiales"]. '</td>
            <td>' . $row["motivo"]. '</td>        
            </tr>
            ';
          }
        } else {
          echo "*** Sin resultados ***";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>    


  <!-- Esquema de datos Turnos Hospital Municipal-->
  <div class="container text-center">
    <div class="row">
      <caption>Resultados para Remises</caption>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Fecha registro</th>
            <th scope="col">Fecha de Reserva</th>
            <th scope="col">Motivo</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //Esquema de datos TURNOS HOSPITAL
        $sql = "SELECT * FROM as_remis WHERE dni='$dni'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $originalDate = $row["fecha_registro"];
            $newDate = date("d/m/Y", strtotime($originalDate));
            $originalDate_two = $row["fecha_reserva"];
            $newDate_two = date("d/m/Y", strtotime($originalDate_two));                          
            echo '        
            <tr>
            <td>' . $newDate. '</td>
            <td>' . $newDate_two. '</td>
            <td>' . $row["materiales"]. '</td>
            <td>' . $row["motivo"]. '</td>        
            </tr>
            ';
          }
        } else {
          echo "*** Sin resultados ***";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>  

<?php
$con->close();
?>