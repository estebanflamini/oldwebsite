<?php
require 'util/cargarcv.php';
pmtime($cvfile);

function esProgramacion($trabajo) {
  return $trabajo['programacion'];
}

?>

<h1>Historial como programador</h1>

<?php
require 'util/listartrabajos.php';
listarTrabajos('esProgramacion');
?>
