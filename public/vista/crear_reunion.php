<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<link rel="stylesheet" href="styles_css/crear_reunion.css">
</head>
<body>
    <?php
    $remitente=$_GET['remitente'];
    ?>
	<h1>Crear Reunion</h1>
 <form id="formulario01" method="POST" action="../controladores/crear_reunion.php">
     
  <input type="hidden" id="remitente" name="remitente" value="<?echo $remitente?>" />
 <label for="fecha_hora">Fecha/Hora (*)</label>
 <input type="datetime" id="fecha_hora" name="fecha_hora" value="" placeholder="Ingrese la fecha y hora ..."
required/>
 <br>
 <label for="lugar">Lugar (*)</label>
 <input type="text" id="lugar" name="lugar" value="" placeholder="Ingrese el lugar
..." required/>
<br>
 <label for="motivo">Motivo (*)</label>
 <input type="text" id="motivo" name="motivo" value="" placeholder="Ingrese su motivo ..."
required/>
 <br>
 <label for="observacion">Observacion (*)</label>
 <input type="text" id="observacion" name="observacion" value="" placeholder="Ingrese su observacion
..." required/>
 <br>
 <label for="latitud">Latitud(*)</label>
 <input type="text" id="latitud" name="latitud" value="" placeholder="Ingrese su cor..de latitud" required/>
 <br>
 <label for="longitud">Longitud (*)</label>
 <input type="text" id="longitud" name="longitud" value="" placeholder="Ingrese su cor..longitud
..." required/>
 <br>
 
 <input type="submit" id="crear" name="crear" value="Aceptar" />

 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
<input type="button" value="Regresar"id="regresar" onclick="window.open('../vista/login.html')" />
	 
	 
     
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
 $sql = "SELECT * FROM usuario";
$sql2="SELECT max(re_codigo) as re_codigo from reunion";         
 $result = $conn->query($sql);
$result2=$conn->query($sql2);
         $re_codigo = null;
if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
      
        $re_codigo= $row['re_codigo'];
        echo $re_codigo;
    }
}
         echo "<h2 align=center>Agregar invitados</h2>";
         
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
        $leo = $row['usu_codigo'];
        $otro_leo = $re_codigo;
        echo "<td>"."<a href="."'../controladores/agregar_invitado.php?codigo=".$leo."&re_codigo=".$otro_leo."'>INVITAR :v </a>"."</td>";    
        echo "</tr>";
       }
 } else {
 echo "<tr>";
 //echo " <td colspan=7>". No existen usuarios registradas en el sistema. "</td>";
 echo "</tr>";
 }
 $conn->close();
 ?>
 </table>
 </form>
</body>
</html>