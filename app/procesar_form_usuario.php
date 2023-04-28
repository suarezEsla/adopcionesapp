<?php
include 'conexion.php';

// Procesar datos del formulario
$nif = $_POST['nif'];
$nombre = $_POST['nom_refugio'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$contrasena = $_POST['contrasena'];
$telefono = $_POST['telefono'];

// Consulta SQL para insertar datos en la tabla "usuario"
$sql = "INSERT INTO refugio (nif, nom_refugio, direccion, telefono, email, contrasena, intereses) VALUES (:email, :nombre, :apellidos, :nick, :contrasena, :intereses)";

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
