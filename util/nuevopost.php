<?php
function nuevoPost() {

  $arr = $_POST;
  for ($i = 0 ; $i < func_num_args() ; $i += 2) {
    $var = func_get_arg($i);
    $val = func_get_arg($i + 1);
    if ($val != "") {
      $arr[$var] = $val;
    } else {
      unset($arr[$var]);
    }
  }

  foreach ($arr as $k => $v) {
    print "<input type=hidden name=$k value=\"";
    print htmlspecialchars($v);
    print "\"></input>";
  }
}

?>