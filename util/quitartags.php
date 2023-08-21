<?php

function quitarTags($s) {
  $s = str_replace("<","&lt;",$s);
  $s = str_replace(">","&gt;",$s);
  $s = str_replace("&","&amp;",$s);
  $s = str_replace('"',"&quot;",$s);
  $s = str_replace("'","&#x27;",$s);
  $s = str_replace("/","&#x2F;",$s);
  return $s;
}

function agregarBr($s) {
  return preg_replace("/\r*\n/","<br/>",$s);
}

?>