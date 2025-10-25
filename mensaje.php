<?php
include 'db_conexion.php';

try {
    $sql = "SELECT * FROM mensajes ORDER BY fecha_envio DESC";
    $stmt = $conn->query($sql);
    $mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener los mensajes: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>📋 Mensajes Recibidos</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h2>📋 Mensajes Recibidos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mensajes as $mensaje): ?>
                    <tr>
                        <td><?= $mensaje['id'] ?></td>
                        <td><?= htmlspecialchars($mensaje['nombre']) ?></td>
                        <td><?= htmlspecialchars($mensaje['apellido']) ?></td>
                        <td><?= htmlspecialchars($mensaje['correo']) ?></td>
                        <td><?= htmlspecialchars($mensaje['mensaje']) ?></td>
                        <td><?= $mensaje['fecha_envio'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>