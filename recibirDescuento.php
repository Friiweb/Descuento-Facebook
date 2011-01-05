<?php
require_once("config.php");
if (sizeof($_POST['ids']) < 1)
		echo 'Error, se enviaron menos de 1 petición de descuento, <a href="'.FBROOT.'">regrese</a> y vuelva a invitar a por lo menos otras 5 personas que pudieran estar interesadas en el descuento.';
else {
?>
<div id='descuento'>
    <div id='descuentoIzquierda'>
        <fb:profile-pic uid='<?php echo $fbusuario; ?>' linked='true' width='100' height='100' />
    </div>
    <div id='descuentoDerecha'>
        A nombre de: 
        <strong><fb:name uid='<?php echo $fbusuario; ?>' linked='true' firstnameonly='true' useyou='false' /></strong>
        <br />
        <br />
        <?php echo DESCUENTO; ?>
        <br />
        <strong>Código del vale</strong>: <?php echo $fbusuario; ?>
    </div>
</div>
<br />
Imprima o guarde el codigo del vale para poder reclamarlo.
<?php
	foreach($_POST['ids'] as $value) {
			$mensaje = "Te he enviado un vale descuento para ". DESCUENTO;
			$detalles = array(
				'message'=>$mensaje,
				'link'=>FBROOT,
				'name'=>'Descuento enviado',
				'description'=>'Recibe tu también el descuento.');
			$facebook->api('/'.$value.'/feed', 'post', $detalles);
	}
}
?>