<?php
session_start();
	$sesion = $_SESSION['cod_usr'];

	/*
	if(substr($sesion,0,1) != 1){
		header('location: ../login.php');
	}
	*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administrador de Solicitudes de Servicios</title>
</head>
<body>
	<h2><?php echo $sesion?></h2>
    <div id="example"></div>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <?php
    // Aquí puedes incluir cualquier código PHP que necesites para tu módulo de administrador
    
    // Por ejemplo, puedes incluir un formulario para crear una nueva solicitud de servicio
    ?>
    <h1>Nueva Solicitud de Servicio</h1>
    <form action="guardar_solicitud.php" method="POST">
        <!-- Aquí puedes incluir los campos necesarios para la solicitud de servicio -->
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        
        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" id="telefono" required><br>
        
        <label for="servicio">Servicio:</label>
        <select name="servicio" id="servicio" required>
            <option value="servicio1">Servicio 1</option>
            <option value="servicio2">Servicio 2</option>
            <option value="servicio3">Servicio 3</option>
        </select><br>
        
        <input type="submit" value="Guardar">
    </form>
    
    <?php
    // Aquí puedes incluir cualquier otro código PHP que necesites para mostrar y gestionar las solicitudes de servicios
    
    // Por ejemplo, puedes hacer una consulta a la base de datos para obtener todas las solicitudes guardadas
    // y mostrarlas en una tabla
    
    // Aquí puedes incluir código PHP para mostrar las solicitudes de servicios en una tabla
    ?>
    
    <h1>Lista de Solicitudes de Servicios</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Servicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes incluir código PHP para mostrar cada solicitud de servicio en una fila de la tabla -->
            <!-- Puedes utilizar un bucle para recorrer todas las solicitudes y generar una fila por cada una -->
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Digital PAS\app\digitalpas\resources\views/welcome.blade.php ENDPATH**/ ?>