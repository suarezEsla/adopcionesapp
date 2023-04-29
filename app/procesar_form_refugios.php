<?php
include 'conexion.php';

// Procesar datos del formulario
$nif = $_POST['nif'];
$nom_refugio= $_POST['nom_refugio'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];



// Consulta SQL para insertar datos en la tabla "usuario"
$sql = "INSERT INTO refugio (nif, nom_refugio, direccion, telefono, email,contrasena) VALUES (:nif, :nom_refugio, :direccion, :telefono, :email, :contrasena)";

// Preparar la consulta SQL
$stmt = $pdo->prepare($sql);

// Vincular los parámetros de la consulta SQL con los valores del formulario
$stmt->bindParam(':nif', $nif);
$stmt->bindParam(':nom_refugio', $nom_refugio);
$stmt->bindParam(':direccion', $direccion);
$stmt->bindParam(':telefono', $telefono);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':contrasena', $contrasena);


// Ejecutar la consulta SQL
if ($stmt->execute()) {
  echo "Datos insertados correctamente.";
} else {
  echo "Error al insertar datos: " . $stmt->errorInfo();
}
?>