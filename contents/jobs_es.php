<?php
require 'util/cargarcv.php';
pmtime($cvfile);

function esTraduccion($trabajo) {
  return $trabajo['traduccion'];
}

?>

<h1>Historial como traductor</h1>

<?php
require 'util/listartrabajos.php';
listarTrabajos('esTraduccion');
?>
