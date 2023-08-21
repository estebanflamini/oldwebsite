<?php

require('util/cargarcv.php');

pmtime($cvfile);

$miPrimeraVez = mktime(0,0,0,3,1,1984);
$anyosExperiencia = time() - $miPrimeraVez;
$anyosExperiencia /= 3600 * 24 * 365;

if (round($anyosExperiencia) < $anyosExperiencia) {
  $anyosExperiencia = 'm&aacute;s de ' . round($anyosExperiencia);
} else {
  $anyosExperiencia = 'casi ' . round($anyosExperiencia);
}

?>

<h1>Experiencia en programaci&oacute;n</h1>

<p>Además de mi experiencia en traducción, llevo <?= $anyosExperiencia ?> a&ntilde;os usando y programando
   computadoras.</p>
<p>Escribí mi primer programa (en BASIC)
   a los quince a&ntilde;os, en la escuela secundaria (de donde me
   gradu&eacute; con el t&iacute;tulo de <em>T&eacute;cnico Programador</em>).</p>
<p>Programar fue mi primer trabajo antes de convertirme en traductor, y aún hoy, sigo haciéndolo en mi tiempo libre. Haga clic
<?= gotolink('jobs_prog','aquí') ?> para ver mi historial de trabajo en el área.</p>

<p>Algunas de las tecnologías con las que tengo experiencia:

  <ul>
    <li>Java</li>
    <li>Perl</li>
    <li>PHP</li>
    <li>SQL</li>
    <li>xBase (dBase, FoxBase, Clipper)</li>
    <li>HTML, DHTML</li>
    <li>javascript</li>
    <li>CSS</li>
    <li>XSLT</li>
    <li>XML</li>
    <li>Visual Basic for Applications</li>
    <li>Basic</li>
    <li>Pascal</li>
    <li>C</li>
    <li>Assembler (8086)</li>
  </ul>

<h2>Operaci&oacute;n</h2>
  <ul>
  <li>Windows</li>
  <li>Linux</li>
  <li>Word</li>
  <li>Excel</li>
  <li>Access</li>
  <li>StarOffice</li>
  <li>etc.</li> 
  </ul>
