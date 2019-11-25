<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Buscar reuniones</title>
<link rel="stylesheet" href="../vista/styles_css/buscar.css">
<script type="text/javascript" src="metodos.js"></script>
</head>
<body> 
	<h1>Buscar reunion</h1>
 <form id="formulario01" method="POST" action="" onsubmit="return buscarPorMotivo()">
 <label for="Motivo">Motivo (*)</label>
 <input type="text" id="motivo" name="motivo" value=""
required placeholder="Ingrese el motivo"/>
 <br>
 <input type="submit" id="buscar" name="buscar" value="Buscar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
     <div id="informacion"><b>Datos de la persona</b></div>
 </form>
 <input type="button" value="Regresar"id="register" onclick="window.open('login.php')" />
</body>
</html>