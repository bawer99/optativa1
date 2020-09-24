<html>
<head>
	<title> Ingresar Dispositivo</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<h2>Nuevo Ingreso de Dispositivo</h2>
<form action='administrar_dispositivo.php' method='post'>
	<table>
		<tr>
			<td>Numero de serie:</td>
			<td> <input type='text' name='numero'></td>
		</tr>
		<tr>
			<td>Descripcion:</td>
			<td><input type='text' name='descripcion' ></td>
		</tr>
		<tr>
			<td>Tamano:</td>
			<td><input type='text' name='tamano' ></td>
		</tr>
		<tr>
			<td>Sistema Operativo:</td>
			<td><input type='text' name='sistema' ></td>
		</tr>
		<tr>
			<td>Camara:</td>
			<td><input type='text' name='camara' ></td>
		</tr>
		<tr>
			<td>RAM:</td>
			<td><input type='text' name='ram' ></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<input type='submit' value='Guardar'>
	<button onclick = "location.href='index.php'">Volver</button>
</form>
 
</html>