<?php
$host = "localhost";
$puerto = "5432";
$usuario = "postgres";
$contrasena = "K3ll00GGs";
$base_de_datos = "formulario_contacto";

try {
    $conn = new PDO("pgsql:host=$host;port=$puerto;dbname=$base_de_datos", $usuario, $contrasena);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}
?>