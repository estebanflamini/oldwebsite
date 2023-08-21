<?php

$pruebacod = "&ntilde;&aacute;&eacute;&iacute;&oacute;&uacute;";

$enctype = "";
$noEnctype = false;

function getEnctype() {

  global $pruebacod;
  global $enctype;
  global $noEnctype;
  $p = urldecode($_REQUEST["pruebacod"]);
  $noEnctype = false;

/*  if (htmlentities($p) == $pruebacod) {
    $enctype = false;
  }
 else
*/

  if (htmlentities($p,ENT_COMPAT,"utf-8") == $pruebacod) {
    $enctype = "utf-8";
  } else if (htmlentities($p,ENT_COMPAT,"iso-8859-1") == $pruebacod) {
    $enctype = "iso-8859-1";
  } else if (htmlentities($p,ENT_COMPAT,"cp1252") == $pruebacod) {
    $enctype = "cp1252";
  } else {
    $enctype = false;
    $noEnctype = true;
  }
}

function informarProblemasEnctype() {
  global $noEnctype;

  if ($noEnctype) {
    echo "<p><b>Atenci&oacute;n:</b> ";
    echo "Parece haber problemas con la transmisi&oacute;n de caracteres internacionales. ";
    echo "Para que su petici&oacute;n funcione adecuadamente, se recomienda ";
    echo "no incluir acentos y sustituir las e&ntilde;es con enes.<p>";
  }
}

function decodeGet($v) {
  global $enctype;

  $t = trim(urldecode($v));

  if (! $enctype) {
    $t = htmlentities($t);
  } else {
    $t = htmlentities($t,ENT_COMPAT,$enctype);
  }
  return $t;
}

function decodeString($s) {
  global $enctype;

  if (! $enctype) {
    $t = htmlentities($s);
  } else {
    $t = htmlentities($s,ENT_COMPAT,$enctype);
  }
  return $t;
}

function quitarAcentos($v) {
  global $noEnctype;
  $t = strtolower(trim($v));
  $t = str_replace("&aacute;","a",$t);
  $t = str_replace("&eacute;","e",$t);
  $t = str_replace("&iacute;","i",$t);
  $t = str_replace("&oacute;","o",$t);
  $t = str_replace("&uacute;","u",$t);
  if ($noEnctype) {
    $t = str_replace("&ntilde;","n",$t);
  }
  return $t;
}
?>