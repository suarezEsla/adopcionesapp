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
$sql = "INSERT INTO refugio (nif, nom_refugio, direccion, telefono, email) VALUES (:nif, :nom_refugio, :direccion, :telefono, :email)";

// Preparar la consulta SQL
$stmt = $pdo->prepare($sql);

// Vincular los parámetros de la consulta SQL con los valores del formulario
$stmt->bindParam(':nif', $nif);
$stmt->bindParam(':nom_refugio', $nom_refugio);
$stmt->bindParam(':direccion', $direccion);
$stmt->bindParam(':telefono', $telefono);
$stmt->bindParam(':email', $email);


// Ejecutar la consulta SQL
if ($stmt->execute()) {
  echo "Datos insertados correctamente.";
} else {
  echo "Error al insertar datos: " . $stmt->errorInfo();
}
?>