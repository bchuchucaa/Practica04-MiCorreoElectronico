<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Agregar nuevo invitado</title>
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
$codigo=$_REQUEST['codigo'];
    $re_codigo=$_REQUEST['re_codigo']; 
    

    echo "codigo de la reunion".$re_codigo;
    echo "codigo del usario".$codigo;
    
 $sql = "INSERT INTO re_user VALUES (0, $re_codigo, $codigo);";
    echo $sql;
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
 }else{
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
}
}

//cerrar la base de datos
$conn->close();
echo "<a href='../vista/crear_reunion.php'>Regresar</a>";

?>
</body>
</html>
