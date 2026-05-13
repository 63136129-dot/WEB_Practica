<?php
$conexion = new mysqli("localhost", "root", "", "sistema_web");

if($conexion->connect_error){
    die("Error de conexion: " . $conexion->connect_error);
}

// VALIDAR SI ENTRAN DATOS O NO
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'] ?? "";
    $correo = $_POST['correo'] ?? "";
    $telefono = $_POST['telefono'] ?? "";
    $mensaje = $_POST['mensaje'] ?? "";

    $sql = "INSERT INTO tb_clientes (nombre, correo, telefono, mensaje) 
            VALUES ('$nombre', '$correo', '$telefono', '$mensaje')";

    if ($conexion->query($sql) === TRUE){
        echo "¡DATOS GUARDADOS CORRECTAMENTE!";
        echo "<br><a href='index.html'>Volver al inicio</a>";
    } else {
        echo "Error: " . $conexion->error;
    }
} else {
    echo "ACCESO NO PERMITIDO";
}

$conexion->close();
?>

<?php
// 1. Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_web");

if($conexion->connect_error){
    die("Error de conexión: " . $conexion->connect_error);
}

// 2. Verificar que la petición sea POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // REVISIÓN DE NOMBRES: Deben coincidir con el 'name' de tu HTML
    $nombre  = $_POST['nombre_completo'] ?? null;
    $correo  = $_POST['correo_electronico'] ?? null; // Aquí tenías un error de mayúscula en tu imagen
    $mensaje = $_POST['mensaje'] ?? null;

    if ($nombre && $correo) {
        // 3. INSERTAR: Asegúrate de que los nombres de las columnas sean exactos a phpMyAdmin
        $sql = "INSERT INTO tb_contactos (nombre_completo, correo_electronico, mensaje) 
                VALUES ('$nombre', '$correo', '$mensaje')";

        if ($conexion->query($sql) === TRUE) {
            echo "<h1>¡ÉXITO!</h1>";
            echo "Los datos se guardaron correctamente.<br>";
            echo "<a href='contactos.html'>Regresar al formulario</a>";
        } else {
            echo "Error de SQL: " . $conexion->error;
        }
    } else {
        echo "Error: Faltan datos en el formulario.";
    }
} else {
    echo "ACCESO NO PERMITIDO";
}

$conexion->close();
?>

<?php
// 1. Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_web");

if($conexion->connect_error){
    die("Error de conexion: " . $conexion->connect_error);
}

// 2. Verificar si los datos vienen por POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Capturamos los datos del formulario (clientes.html)
    // Usamos los nombres que pusiste en el HTML: name="nombre", name="cargo", name="mensaje"
    $nombre  = $_POST['nombre']  ?? "";
    $cargo   = $_POST['cargo']   ?? "";
    $mensaje = $_POST['mensaje'] ?? "";

    // 3. LA SOLUCIÓN: Cambiamos 'tb_clientes' por 'tb_cliente' para que coincida con tu imagen
    // Y usamos las columnas exactas: nombre, cargo, mensaje
    $sql = "INSERT INTO tb_cliente (nombre, cargo, mensaje) 
            VALUES ('$nombre', '$cargo', '$mensaje')";

    if ($conexion->query($sql) === TRUE) {
        // Estilo visual para confirmar el éxito
        echo "<body style='background-color: #1a1e29; color: white; font-family: sans-serif; text-align: center; padding-top: 50px;'>";
        echo "<h2 style='color: #4CAF50;'>✅ ¡DATOS GUARDADOS CORRECTAMENTE!</h2>";
        echo "<p>El testimonio de <strong>$nombre</strong> ha sido registrado.</p>";
        echo "<br><a href='clientes.html' style='display:inline-block; text-decoration:none; color:white; background:#bd3342; padding:12px 25px; border-radius:5px; font-weight:bold;'>Volver a Clientes</a>";
        echo "</body>";
    } else {
        echo "Error al guardar: " . $conexion->error;
    }
} else {
    echo "ACCESO NO PERMITIDO";
}

// 4. Cerrar conexión
$conexion->close();
?>