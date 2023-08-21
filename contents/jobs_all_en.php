<?php
require 'util/cargarcv.php';
pmtime($cvfile);

?>

<h1>Work history (all)</h1>

<?php
require 'util/listartrabajos.php';
listarTrabajos('');
?>
