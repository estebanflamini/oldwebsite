<?php
require 'util/cargarcv.php';
pmtime($cvfile);

function esLibro($trabajo) {
  return $trabajo['libro'];
}

?>

<h1>Libros traducidos</h1>

<?php
require 'util/listartrabajos.php';
listarTrabajos('esLibro');
?>
