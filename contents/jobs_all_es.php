<?php
require 'util/cargarcv.php';
pmtime($cvfile);

?>

<h1>Historial de trabajos (general)</h1>

<?php
require 'util/listartrabajos.php';
listarTrabajos('');
?>
