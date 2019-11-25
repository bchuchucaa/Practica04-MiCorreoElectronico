<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Nueva Reunion</title>
 <style type="text/css" rel="stylesheet">
 .error{
 color: red;
 }
 </style>
</head>
<body>
 <?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 $fecha_hora = isset($_POST["fecha_hora"]) ? trim($_POST["fecha_hora"]) : null;
 $remitente = isset($_POST["remitente"]) ? trim($_POST["remitente"]) : null;
    echo 'El remitente es: ' . $remitente;
 $lugar = isset($_POST["lugar"]) ? mb_strtoupper(trim($_POST["lugar"]), 'UTF-8') : null;
 $motivo = isset($_POST["motivo"]) ? mb_strtoupper(trim($_POST["motivo"]), 'UTF-8') : null;
 $observacion = isset($_POST["observacion"]) ? mb_strtoupper(trim($_POST["observacion"]), 'UTF-8') : null;
 $latitud = isset($_POST["latitud"]) ? trim($_POST["latitud"]): null;
 $longitud = isset($_POST["longitud"]) ? trim($_POST["longitud"]): null;


 $sql = "INSERT INTO reunion VALUES (0, '$fecha_hora', $remitente,'$lugar', '$motivo', '$observacion',null,null,'N',
'$latitud','$longitud')";
 echo $sql;
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha creado la reunion correctamemte!!!</p>";
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
 }else{
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
}
}

//cerrar la base de datos
$conn->close();
echo "<a href='../vista/crear_usuario.html'>Regresar</a>";

?>
</body>
</html>
