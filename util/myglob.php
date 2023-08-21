<?php

function myglob($pat) {

  $dir = ".";
  $arr = array();
  if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
      if (preg_match($pat,$file)) {
        $arr[] = $file;
      }
    }
    closedir($dh);
  }
   return $arr;
}
?>