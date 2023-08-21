<?php
require('util/cargarcv.php');

pmtime($cvfile);

$miPrimeraVez = mktime(0,0,0,3,1,1984);
$anyosExperiencia = time() - $miPrimeraVez;
$anyosExperiencia /= 3600 * 24 * 365;
if (round($anyosExperiencia) < $anyosExperiencia) {
  $anyosExperiencia = 'more than ' . round($anyosExperiencia);
} else {
  $anyosExperiencia = 'almost ' . round($anyosExperiencia);
}

?>
<h1>Experience as a programmer</h1>

<p>Besides being a translator, I have also <?= $anyosExperiencia ?> years experience using and programming
computers.</p>
<p>I wrote my first program (in BASIC) when I was 15, at
secondary school (I graduated from there as a <em>Programmer Technician</em>).</p>
<p>Programming was my first job before becoming a translator, and I still do it in my spare time (click
<?= gotolink('jobs_prog','here') ?> to see my work history in this field).</p>

<p>Some of the technologies I have experience with:

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

<h2>Operation</h2>
  <ul>
  <li>Windows</li>
  <li>Linux</li>
  <li>Word</li>
  <li>Excel</li>
  <li>Access</li>
  <li>StarOffice</li>
  <li>and more...</li> 
  </ul>
