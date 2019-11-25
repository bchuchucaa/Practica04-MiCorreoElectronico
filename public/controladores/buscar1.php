<?php
 //incluir conexión a la base de datos
 include "../../config/conexionBD.php";
 $motivo = $_GET['motivo'];
 //echo "Hola " . $cedula;

 $sql = "SELECT * FROM reunion WHERE re_motivo ='$motivo'";

//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Fecha/Hora</th>
 <th>Remitente</th>
 <th>Lugar</th>
 <th>Motivo</th>
 <th>Observacion</th>
 <th>Latitud</th>
 <th>Longitud</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row['re_fecha_hora'] . "</td>";
 echo " <td>" . $row['re_remitente'] ."</td>";
 echo " <td>" . $row['re_lugar'] . "</td>";
 echo " <td>" . $row['re_motivo'] . "</td>";
 echo " <td>" . $row['re_observacion'] . "</td>";
 echo " <td>" . $row['re_cor_latitud'] . "</td>";
 echo " <td>" . $row['re_cor_longitud'] . "</td>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>