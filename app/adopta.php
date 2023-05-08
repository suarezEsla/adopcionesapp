<?php
include 'index.html';

echo '<div style="text-align: center; margin-top: 50px; color: #00afa1">';
echo '<h4 > Si estás interesado en ponerte en contacto con algún refugio como adoptante, rellena el siguiente formulario y nosotros haremos todo el trabajo!</h4>';
echo '</div>';
?>

<div class="container-fluid ">
  <div class='menus-contacto'>
<form action="procesar_form_adopta.php" method="POST" >

  <div class="form-group">
    <label for="email"></label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Escribe tu email">
    <small id="emailHelp" class="form-text text-muted">No te preocupes, no compartiremos tu e-mail con terceros.</small>
  </div>
  <div class="form-group">
    <label for="mensaje"></label>
    <textarea class="form-control" id="mensaje" rows="3" name="mensaje">Déjanos un mensaje, y nos pondremos en contacto contigo lo antes posible</textarea>
  </div>
  <div>
  &nbsp
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</div>

</div>



  