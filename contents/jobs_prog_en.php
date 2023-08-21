<?php
require 'util/cargarcv.php';
pmtime($cvfile);

function esProgramacion($trabajo) {
  return $trabajo['programacion'];
}

?>

<h1>Work history as a programmer</h1>

<?php
require 'util/listartrabajos.php';
listarTrabajos('esProgramacion');
?>
