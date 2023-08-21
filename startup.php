<?php

function pmtime($p) {
  global $pagemtime;

  $pagemtime = filemtime($p);
}

function gotolink($where,$text) {

  $href = href($where);

  return "<a href=\"$href\">$text</a>";
}

function href($where) {
  if (! preg_match('/^[a-zA-Z_]+$/',$where)) {
    return 'javascript:void()';
  } else {
    return "index.php?goto=$where";
  }
}

/*
error_reporting(0); */

header('Content-type: text/html; charset=utf-8');

require('util/configmail.php');

$script = $_SERVER['PHP_SELF'];
$serverName = $_SERVER['SERVER_NAME'];
$scriptName = basename($script,'.php');
$scriptPath = dirname($script);
$ua = $_SERVER['HTTP_USER_AGENT'];
$referer = $_SERVER['HTTP_REFERER'];
$uri = $_SERVER['REQUEST_URI'];
$time = strftime('%d-%m-%y %T');
$ip = $_SERVER['REMOTE_ADDR'];

if ($_GET['plugin'] == 'si' && ! isset($_COOKIE['plugin'])) {
  setcookie('plugin','si',time()+3600*24*365*10,$scriptPath);
}

require('util/var_sesion.php');

/* Defense against parameter tampering */

/* This is Level 0 defense */

if (! preg_match('/^([a-z_])+$/i',$goto)) {
  $goto = 'home';
}

/* This is the end of Level 0 defense */


/* This is Level 1 defense  */

if (! preg_match('/^[a-z][a-z]$/i',$lang)) {
  $lang = 'en';
}

/* This is the end of Level 1 defense */

$gotofile = "contents/$goto" . "_$lang.php";

/* This is Level 2 defense */

if (!($langOk = file_exists($gotofile))) {
  $gotofile = "contents/$goto" . ($lang=='es' ? "_en.php" : "_es.php");
  if (! file_exists($gotofile)) {
    $gotofile = "contents/$goto" . ".php";
    if (! file_exists($gotofile)) {
      $goto = 'home';
      $gotofile = "contents/home_$lang.php";
    }
    $langOk = true;
  }
}

/* This is the end of Level 2 defense */

$_SESSION['goto'] = $goto;

/*
if (preg_match('/^(juegos|javatshoot|downloadjavaplugin|javaplugindownloaded)$/i',$goto)) {
  require 'util/nocache.php';
}
*/

pmtime($gotofile);

if ($lang=='es') {
  $titulo = 'Esteban Flamini, traductor de inglés a español';
} else {
  $titulo = 'Esteban Flamini, English-to-Spanish translator';
}

?>