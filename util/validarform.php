<?php

function validarMail($mail) {
  if (trim($mail)=="") {
    return true;
  }
  $pat = "/^\s*(\w|\.)+@(\w+\.)+\w+\s*$/";
  return preg_match($pat,$mail) > 0;
}

function normalizarMail($mail) {
  $pat = "/\s+(,|;)\s+/";
  return preg_replace($pat,",",trim($mail));
}

function validarFecha($d,$m,$a) {
  if (trim($d . $m . $a) == "") {
    return true;
  }
  if ($d == "") {
    $d == 1;
  }
  if ($m == "") {
    $m == 1;
  }
  if ($a == "") {
    $a == 1;
  }
  return checkdate($m,$d,$a);
}
?>