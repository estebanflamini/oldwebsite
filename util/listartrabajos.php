<?php function listarTrabajos($filtro) {

  global $trabajos;
  global $lang;
  global $goto;

  $ultimoAnyo = 0;

  echo '<table width="100%">';

  foreach ($trabajos as $trabajo) {

    if (!$filtro || $filtro($trabajo)) { ?>

      <tr valign="top">

        <td width="15%" style="text-align: center; font-weight: bold;
          color: white; background-color: rgb(147,147,147);">

<?php

        if ($ultimoAnyo != $trabajo['anyo']) {
          $ultimoAnyo = $trabajo['anyo'];
          echo $ultimoAnyo;
        }

        echo '</td>';
        echo '<td width="85%" style="padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em">';

        if ($trabajo['img']) {
          echo '<img src="img/cv/' . $trabajo['img'] .
          '" style="float: right; clear: none; padding: 10px;" align="middle"></img>';
        }

        if ($goto != 'books') {
          if ($trabajo['libro']) {
            if (! preg_match('/Tra(nslation|ducci)/i',$trabajo['descripcion'])) {
              echo '<p>';
              echo ($lang == 'en' ? 'Book translation' : 'Traducci&oacute;n del libro');
              echo ':</p>';
            }
          }
        }

        echo $trabajo['descripcion'];

        if ($trabajo['url']) {
          echo '<br><a target="_blank" href="';
          echo $trabajo['url'];
          echo '">';
          echo $trabajo['url'];
          echo '</a>';
        }

        echo '</td></tr>';

    }
  }
  echo '</table>';}
?>