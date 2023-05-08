<?php
include 'conexion.php';

// Procesar datos del formulario
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];


// Consulta SQL para insertar datos en la tabla "usuario"
$sql = "INSERT INTO adopta (email, mensaje) VALUES (:email, :mensaje)";

// Preparar la consulta SQL
$stmt = $pdo->prepare($sql);

// Vincular los parámetros de la consulta SQL con los valores del formulario
$stmt->bindParam(':email', $email);
$stmt->bindParam(':mensaje', $mensaje);


// Ejecutar la consulta SQL
if ($stmt->execute()) {
  echo "Mensaje enviado.";
} else {
  echo "Error al enviar el mensaje: " . $stmt->errorInfo();
}
?>