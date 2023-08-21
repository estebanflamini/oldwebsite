<?php require_once('startup.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title><?= $titulo ?></title>

    <link href="global.css" rel="stylesheet" type="text/css"></link>

    <script type="text/javascript" src="jquery.js"></script>

    <script type="text/javascript" src="global.js"></script>

  </head>

  <body>

    <div id="titulo">
      <span class="titulo">Esteban Flamini: </span>
    </div>

    <?php require('menu.php'); ?>

    <div id="menujs"><center><table><tr>

       <?= $menuJs ?>

    </tr></table></center></div>

    <div id="contenidoout">

      <div id="menunojs">

        <?= $menuNoJs ?>

      </div>

      <script type="text/javascript">
       $('#menunojs').css('display','none');
       $('#menujs').css('display','block'); 
       fijarAncho();
      </script>

      <div id="contenido">

        <?php
          if (!$langOk) {
            require("contents/notfound_$lang.php");
          }
          require($gotofile);
        ?>

      </div>

      <div id="footer"">

        <div style="font-size: 10pt; font-weight: bold">

          <?php if ($lang=='en') { ?>
              This page was last updated: <?= date('m/d/Y',$pagemtime)?>
          <?php } else { ?>
              &Uacute;ltima actualizaci&oacute;n de esta p&aacute;gina: <?= date('d/m/Y',$pagemtime)?>
          <?php } ?>

        </div>

        <div style="font-size: 10pt; font-style: italic;">
          <?php if ($lang=='en') { ?>
             Designed and programmed by the owner
          <?php } else { ?>
             Dise&ntilde;o y programaci&oacute;n propios
          <?php } ?>
        </div>
    
    </div>

  </body>

</html>
