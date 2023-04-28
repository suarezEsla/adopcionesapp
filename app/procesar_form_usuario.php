<?php
include 'conexion.php';

// Procesar datos del formulario
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$nick = $_POST['nick'];
$contrasena = $_POST['contrasena'];
$intereses = $_POST['intereses'];

// Consulta SQL para insertar datos en la tabla "usuario"
$sql = "INSERT INTO usuario (email, nombre, apellidos, nick, contrasena, intereses) VALUES (:email, :nombre, :apellidos, :nick, :contrasena, :intereses)";

// Preparar la consulta SQL
$stmt = $pdo->prepare($sql);

// Vincular los parámetros de la consulta SQL con los valores del formulario
$stmt->bindParam(':email', $email);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellidos', $apellidos);
$stmt->bindParam(':nick', $nick);
$stmt->bindParam(':contrasena', $contrasena);
$stmt->bindParam(':intereses', $intereses);

// Ejecutar la consulta SQL
if ($stmt->execute()) {
  echo "Datos insertados correctamente.";
} else {
  echo "Error al insertar datos: " . $stmt->errorInfo();
}
?>
