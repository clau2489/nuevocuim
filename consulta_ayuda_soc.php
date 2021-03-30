<?
//Esquema de datos AYUDA SOCIAL
$sql = "SELECT * FROM as_ayuda_soc WHERE dni='$dni'";
$result = $con->query($sql);

echo "<caption>Resultados para AYUDA SOCIAL</caption>";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '
    <table class="table">
    <thead>
    <tr>
    <th scope="col">DNI</th>
    <th scope="col">Monto</th>
    <th scope="col">Motivos</th>
    <th scope="col">Fecha</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <th>' . $row["dni"]. '</th>
    <td>' . $row["monto"]. '</td>
    <td>' . $row["motivo"]. '</td>
    <td>' . $row["fecha_registro"]. '</td>
    </tr>
    </tbody>
    </table>
    ';
  }
} else {
  echo "<br>Sin resultados ";
}
//Fin de esquema
?>
