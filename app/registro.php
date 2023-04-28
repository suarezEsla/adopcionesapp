<?php
include 'index.html';
?>

<div class='formulario_usuarios'>
  <form action="procesar_form_usuario.php" method="POST">
  <h3>Registro de usuarios</h3>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="nombre" name="nombre" class="form-control" id="nombre"  placeholder="Introduce tu nombre">
  </div>
  <div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="apellidos" name="apellidos" class="form-control" id="apellidos"  placeholder="Introduce tus apellidos">
  </div>
  <div class="form-group">
    <label for="nick">Nick</label>
    <input type="nick" name="nick" class="form-control" id="nick"  placeholder="Introduce tu nick">
  </div>
  <!-- <div class="form-group">
    <label for="contrasena">Password</label>
    <input type="contrasena" class="form-control" id="contrasena" placeholder="Password">
    <small id="contrasena_help" name="contrasena"  class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div> -->
  <div class="form-group">
  <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" class="form-control" id="contrasena" required><br>
</div>
  <div class="form-group">
    <label for="intereses">Intereses</label>
    <input type="intereses" name="intereses" class="form-control" id="intereses"  placeholder="Introduce tu nick">
  </div>
  <button type="submit" value="Registrarse">Submit</button>
</form>
</div>
