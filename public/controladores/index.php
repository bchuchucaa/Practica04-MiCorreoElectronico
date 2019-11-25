<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Gestión de usuarios</title>
<link rel="stylesheet" href="../vista/styles_css/index.css">
</head>
<body>

 <table style="width:100%">
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Dirección</th>
 <th>Telefono</th>
 <th>Correo</th>
 <th>Fecha Nacimiento</th>
 </tr>
 <?php

   session_start();
   if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
   header("Location: /SistemaDeGestion/public/vista/login.html");
   }  
 include '../../config/conexionBD.php';
 $codigo = $_REQUEST["codigo"];

 $remitente="";
 $sql = "SELECT * FROM usuario WHERE usu_codigo=$codigo";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row["usu_cedula"] . "</td>";
        echo " <td>" . $row['usu_nombres'] ."</td>";
        echo " <td>" . $row['usu_apellidos'] . "</td>";
        echo " <td>" . $row['usu_direccion'] . "</td>";
        echo " <td>" . $row['usu_telefono'] . "</td>";
        echo " <td>" . $row['usu_correo'] . "</td>";
        echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
        echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
        echo " <td> <a href='../vista/modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
        echo " <td> <a href='../vista/cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar
       contraseña</a> </td>";
        echo "</tr>";
        $remitente=$row['usu_codigo'];
        

       }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
  $sql2 = "SELECT * FROM reunion ORDER by date(re_fecha_hora);";
  
  $result2=$conn->query($sql2);
	 echo "<h1>Reuniones agendadas</h1>";
if ($result2->num_rows > 0) {

    while($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row["re_fecha_hora"] . "</td>";
        echo " <td>" . $row['re_remitente'] ."</td>";
        echo " <td>" . $row['re_lugar'] . "</td>";
        echo " <td>" . $row['re_motivo'] . "</td>";
        echo " <td>" . $row['re_observacion'] . "</td>";
        echo " <td>" . $row['re_cor_latitud'] . "</td>";
        echo " <td>" . $row['re_cor_longitud'] . "</td>";
        echo " <td> <a href='eliminar.php?codigo=" . $row['re_codigo'] . "'>Eliminar</a> </td>";
        echo " <td> <a href='../vista/modificar.php?codigo=" . $row['re_codigo'] . "'>Modificar</a> </td>";
        
        echo "</tr>";
        
       }
	echo " <td> <a href='../vista/crear_reunion.php?codigo=" . $row['re_codigo'] . "&remitente=".$remitente."'>Crear Reunion</a> </td>";
    
echo "<h2><a href='buscar.php?u_codigo=".$remitente."'>Buscar Reuniones</a></h2>";
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen reuniones registradas en el sistema </td>";
 echo "</tr>";
 }  



 $conn->close();
 ?>
 </table>
</body>
</html>