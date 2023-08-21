<?php
require 'util/cargarcv.php';
pmtime($cvfile);

function esTraduccion($trabajo) {
  return $trabajo['traduccion'];
}

?>

<h1>Work history as a translator</h1>

<?php
require 'util/listartrabajos.php';
listarTrabajos('esTraduccion');
?>
