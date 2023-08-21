<?php
  session_start();
  if (isset($_GET['goto'])) {
   $goto = $_GET['goto'];
  } elseif (isset($_SESSION['lasttime']) && (time() - $_SESSION['lasttime'] > 1800)) {
   $goto = 'home';
  } elseif (isset($_SESSION['goto'])) {
   $goto = $_SESSION['goto'];
  } else {
   $goto = 'home';
  }
  if (isset($_GET['lang'])) {
   $lang = $_GET['lang'];
  } elseif (isset($_SESSION['lang'])) {
   $lang = $_SESSION['lang'];
  } elseif (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
   $m = preg_split('/,/',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
   foreach ($m as $l) {
     $l = substr($l,0,2);
     if (file_exists("contents/$goto_$l.htm")) {
       $lang = $l;
       break;
     }
   }
 } else {
   $lang = 'en';
 }
   if ($lang != 'es' && $lang != 'en') {
    $lang = 'en';
   }
 $_SESSION['lang'] = $lang;
 $_SESSION['lasttime'] = time();
?>