<?php

function nuevoGet() {

  $arr = $_GET;
  for ($i = 0 ; $i < func_num_args() ; $i += 2) {
    $var = func_get_arg($i);
    $val = func_get_arg($i + 1);
    if ($val != "") {
      $arr[$var] = $val;
    } else {
      unset($arr[$var]);
    }
  }
  $nuevo = "";
  foreach ($arr as $k => $f) {
    if ($nuevo != "") {
      $nuevo .= "&";
    }
    $nuevo .= $k . "=" . urlencode($f);
  }
  return $nuevo;
}

?>
