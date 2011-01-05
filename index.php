<?php
require_once("config.php");
?>
<h2>
Invita a 10 amigos para recibir el descuento de <?php echo DESCUENTO; ?>
</h2>

<fb:request-form 
  action="recibirDescuento.php"
  method="POST" 
  invite="true" 
  type="Descuento" 
  content="Te regalo este descuento en <?php echo DESCUENTO; ?>"
  max="35" >
  <fb:multi-friend-selector showborder="false" actiontext="Selecciona a aquellos que quieras invitar a recibir el descuento." max="10" email_invite="false"> 
</fb:request-form>