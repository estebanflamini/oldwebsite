<?php
require 'util/cargarcv.php';
pmtime($cvfile);

function esLibro($trabajo) {
  return $trabajo['libro'];
}

?>

<h1>Books I translated</h1>

<?php
require 'util/listartrabajos.php';
listarTrabajos('esLibro');
?>
