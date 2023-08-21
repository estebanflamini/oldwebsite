<?php

function informarError() {

  global $lang;

  if ($lang=='es') {
    die("<p><br/>Ha ocurrido un error interno al enviar el mensaje. " 
        . "Disculpe las molestias ocasionadas.</p>");
  } else {
    die("<p><br/>An internal error has occurred while trying to send the "
        . "message. I apologize for any inconveniences.</p>");
  }
}

function informarEnvio() {

  global $lang;

  if ($lang=='es') {
    print "<p><br/>Su mensaje ha sido enviado. Gracias por comunicarse. "
      . "Intentar&eacute; responder a la brevedad.</p>";
  } else {
    print "<p><br/>Your message has been sent. Thanks for contacting me. "
      . "I will try to reply ASAP!</p>";
  }
}

require 'util/quitartags.php';
require 'util/getenctype.php';

getEnctype();
               
$mensaje = quitarTags($_REQUEST["mensaje"]);
$mensaje = htmlentities($mensaje,ENT_COMPAT,$enctype);

if (preg_match('/&(amp;)?lt;/i',$mensaje) && preg_match('/\[(url|link)/i',$mensaje) && preg_match('/http:/i',$mensaje)) { // Ataque de bot
  die();
}
   
$asunto = quitarTags($_REQUEST["asunto"]);
              
$nombre = quitarTags(trim($_REQUEST['nombre']));

if ($_REQUEST["correo"] == "") {
  die();
}

$correo = quitarTags(trim($_REQUEST['correo']));

if (! preg_match('/^\s*[\w\d][\w\d\-\_]*(\.?[\w\d\-\_]+)*@[\w\d][\w\d\-\_]*(\.?[\w\d\-\_]+)*\s*$/i',$correo)) {
  informarError();
}


if (! preg_match('/^\s*[\w\d][\w\d\-\_]*(\.?[\w\d\-\_]+)*@[\w\d][\w\d\-\_]*(\.?[\w\d\-\_]+)*\s*$/i',$correo)) {
  informarError();
}

$mensaje = "<b>[Enviado desde mi sitio web]</b><br/><br/>$mensaje";

$headers = "Return-Path: <$mailContacto>\r\n";
$headers .= "From: $nombre <$correo>\r\n";
$headers .= "Reply-to: $nombre <$correo>\r\n";
$headers .= "MIME-Version: 1.0\r\n"; 
$headers .= "Content-Type: text/html; charset=$enctype\r\n";

if (@mail($mailContacto,"Desde mi web: $asunto",$mensaje,$headers)) {
  informarEnvio();
} else {
  informarError();
}

?>
