<?php
include 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    try {
        $sql = "INSERT INTO mensajes (nombre, apellido, correo, mensaje) VALUES (:nombre, :apellido, :correo, :mensaje)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':mensaje', $mensaje);
        $stmt->execute();

        echo "✅ Mensaje enviado correctamente.";
    } catch (PDOException $e) {
        echo "❌ Error al enviar el mensaje: " . $e->getMessage();
    }
}
?>