<?php
define('API_KEY', 'API de la aplicacion');
define('SECRET', 'API secreta de la aplicacion');

define('FBROOT', 'Ruta de la aplicacion'); //ejemplo http://apps.facebook.com/nombreapp/
define('DESCUENTO','Define el texto del descuento'); //ejemplo: 2x1 en una copa en X
define('IMAGEN','URI de la imagen');
//Fin edicion codigo

require_once("includes/facebook.php");

$facebook = new Facebook(array(
  'appId'  => API_KEY,
  'secret' => SECRET,
  'cookie' => true
));

$sesion = $facebook->getSession();

if (!$sesion)
{
	$loginUrl = $facebook->getLoginUrl(
		array(
		'canvas'    => 1,
		'fbconnect' => 0,
		'req_perms' => 'publish_stream,read_stream,user_photo_video_tags,user_photos,friends_photos',
		'next'      => FBROOT,
		'cancel_url'=> 'http://facebook.com/'

		)
	);
	echo '<fb:redirect url="'.$loginUrl.'" />';
}

$fbusuario = $facebook->getUser();
?>
<style>
	#descuento {
		width:600px;
		height:100px;
		margin-top:50px;
		border: 4px dotted black;
	}
	
	#descuentoIzquierda {
		width:100px;
		float:left;
	}
	
	#descuentoDerecha {
		padding-top:10px;
		width:485px;
		float:right;
		margin-left:15px;
		
	}
</style>