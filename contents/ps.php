<?php

  $meses_es = array("enero","febrero","marzo","abril","mayo","junio","julio",
                    "agosto","septiembre","octubre","noviembre","diciembre");
  $meses_en = array("January","February","March","April","May","June","July",
                    "August","September","October","November","December");

  function informarError() {

    global $lang;

    if ($lang=='es') {
      die("<p><br/>Ha ocurrido un error interno. Disculpe las molestias.</p>");
    } else {
      die("<p><br/>An internal error has occurred. I apologize for any inconveniences.</p>");
    }
  }

  $htm = '';
  $duoshao = 0;

  function procesarDuoShao() {
    global $duoshao;
    global $ps;

    preg_match('#^duoshao:\t(\d+)\n+#',$ps,$m);

    $duoshao = $m[1];

    $ps = preg_replace('#^duoshao:\t(\d+)\n+#','',$ps);
  }

  function procesarItem() {
    global $htm;
    global $ps;
    global $lang;
    global $meses_es;
    global $meses_en;
    global $ca;
    global $pp;
    global $pag;
    global $az;
    global $mostrados;
    global $indice;
    global $elegidosAlAzar;

    preg_match('#^(.+?\n\n)#s',$ps,$m);
    $tmp = $m[1];
    $ps = preg_replace('#^.+?\n{2,}#s','',$ps);

    $indice++;

    if ($ca) {
      $noMostrar = true;
      preg_match_all('#^ca:\s+(.+?)\s*$#m',$tmp,$m);
      for ($i = 0 ; $i < count($m[1]) ; $i++) {
        if ($m[1][$i] == $ca) {
          $noMostrar = false;
          break;
        }
      }
      if ($noMostrar) {
        return;
      }
    } else if ($az) {
      if ($elegidosAlAzar[$indice] !== 1) {
        return;
      }
    } else if ($pp && ($indice <= ($pag - 1) * $pp || $mostrados >= $pp)) {
      return;
    }

    preg_match_all('#^autor:\s+(.+?)\s*$#m',$tmp,$m);
    $autor = '';
    for ($i = 0 ; $i < count($m[1]) ; $i++) {
      $autor .= ($i > 0 ? ', ' : '') . $m[1][$i];
    }

    preg_match('#^fecha:\t(\d{4})(\d{2})(\d{2})$#m',$tmp,$m);
    $anyo = $m[1];
    $mes = $m[2] - 1;
    $dia = $m[3] + 0;
    
    preg_match('#^titIng:\s+(.+)\s*$#m',$tmp,$m);
    $titIng = $m[1];

    preg_match('#^uriIng:\s+(.+)\s*$#m',$tmp,$m);
    $uriIng = $m[1];

    preg_match('#^frgIng:\s+(.+)\s*$#m',$tmp,$m);
    $frgIng = $m[1];

    preg_match('#^titEsp:\s+(.+)\s*$#m',$tmp,$m);
    $titEsp = $m[1];

    preg_match('#^uriEsp:\s+(.+)\s*$#m',$tmp,$m);
    $uriEsp = $m[1];

    preg_match('#^frgEsp:\s+(.+)\s*$#m',$tmp,$m);
    $frgEsp = $m[1];

    $htm .= '<hr/>';

    if ($lang == 'es') {
      $htm .= <<<ARTICULO
<p><i>$autor</i> &mdash; $dia de $meses_es[$mes] de $anyo<br/>
<a href="$uriIng" target="_blank">$titIng</a><br/>
$frgIng<br/>
<a href="$uriEsp" target="_blank">$titEsp</a><br/>
$frgEsp</p>
ARTICULO;
    } else {
      $htm .= <<<ARTICULO
<p><i>$autor</i> &mdash; $meses_en[$mes] $dia, $anyo<br/>
<a href="$uriIng" target="_blank">$titIng</a><br/>
$frgIng<br/>
<a href="$uriEsp" target="_blank">$titEsp</a><br/>
$frgEsp</p>
ARTICULO;
    }

    $mostrados++;

  }

  srand();

  $az = 0;
  $ca = '';
  $au = '';
  $pp = 10;
  $pag = 1;
  $ia = 0;

  if ($_GET['az'] != '') {
    if (preg_match('/^\d+$/',$_GET['az'])) {
      $az = $_GET['az'];
    }
  }

  if ($_GET['ca'] != '') {
    if (preg_match('/^[a-z_]+$/',$_GET['ca'])) {
      $ca = $_GET['ca'];
      if (!($f = fopen("contents/ps_autores.inc","r"))) {
        informarError();
      }
      $autores = '';
      while (! feof($f)) {
        $autores .= fread($f,4096);
      }
      fclose($f);
      preg_match("#$ca.+?>(.+?)</a>#",$autores,$m);
      $au = $m[1];
      $au = preg_replace('#<.+?>#','',$au);
    }
  }

  if ($_GET['pp'] != '') {
    if (preg_match('/^\d+$/',$_GET['pp'])) {
      $pp = $_GET['pp'];
    } else {
      $pp = 10;
    }
  }

  if ($_GET['pag'] != '') {
    if (preg_match('/^\d+$/',$_GET['pag'])) {
      $pag = $_GET['pag'];
    }
    if ($pag == 0) {
      $pag = 1;
    }
  }

  if ($_GET['ia'] != '') {
    if (preg_match('/^1$/',$_GET['ia'])) {
      $ia = 1;
    }
  }

  if ($ia) {
    $bajada = ' (' . ($lang == 'es' ? 'índice de autores' : 'author index') . ')';
  } else if ($ca) {
    $bajada = ' (' . ($lang == 'es' ? 'autor: ' : 'author: ') . "$au)";
  } else if ($az) {
    $bajada = " ($az " . ($lang == 'es' ? 'artículos al azar' : 'randomly chosen') . ')';
  } else {
    $bajada = ' (' . ($lang == 'es' ? 'lista completa' : 'comprehensive list') . ')';
  }

  print '<h1>';
  if ($lang == 'es') {
    print "<h1>Traducciones para Project Syndicate</h1>";
  } else {
    print "<h1>Translations for Project Syndicate</h2>";
  }

  print '<p style="font-size: 75%">';

  print gotolink('samples', $lang == 'es' ? 'Traducciones' : 'Translations');
  if ($ca) {
    print ' &gt; <a href="index.php?goto=ps&ia=1">' . ($lang == 'es' ? 'Autores' : 'Authors') . '</a>';
  }

  print ' &gt; ';

  if ($ca) {
    print $au;
  } else if ($ia) {
    print ($lang == 'es' ? 'Autores' : 'Authors');
  } else if ($az) {
    print ($lang == 'es' ? 'Al azar' : 'Random');
  } else {
    print ($lang == 'es' ? 'Todos' : 'All');
  }

  print '</p>';

  if ($ia) {
    print '<hr/';
    require 'ps_autores.inc';
    exit;
  }

  $indice = 0;
  $mostrados = 0;

  if (!($f = fopen("contents/ps_dep.txt","r"))) {
    informarError();
  }

  $ps = '';

  $ps .= fread($f,4096);

  procesarDuoShao();
  
  if ($az >= $duoshao + 100000) {
    $az = 0;
    $pp = 10;
  } else if ($az) {

    $elegidosAlAzar = array();

    for ($i = 0 ; $i < $az ; $i++) {
      $eaa = mt_rand(1,$duoshao);
     
      while ($elegidosAlAzar[$eaa] == 1) {
        if (++$eaa > $duoshao) {
          $eaa = 1;
        }
      }
      $elegidosAlAzar[$eaa] = 1;
    }
  }

  while (strpos($ps,"\n\n") !== false) {
    procesarItem();
  }

  while (! feof($f)) {
    $ps .= fread($f,4096);
    while (strpos($ps,"\n\n") !== false) {
      procesarItem();
    }
  }

  fclose($f);
  while (strpos($ps,"\n\n") !== false) {
    procesarItem();
  }

  $nav = '';
  if (! $az && ! $ca && $pp && $duoshao > $pp) {
    $nav = ($lang == 'es' ? 'Ver página: ' : 'Show page: ');
    $n = 1;
    $tmp = ($lang == 'es' ? 'anterior' : 'prev');
    if ($pag > 1) {
      $nav .= '<a href="index.php?' . nuevoGet('pag',$pag-1,'pp',$pp) . '">' .  $tmp . '</a>';
    } else {
      $nav .= $tmp;
    }
    $tmp = ($lang == 'es' ? ' siguiente' : ' next');
    if ($pag * $pp < $duoshao) {
      $nav .= ' - <a href="index.php?' . nuevoGet('pag',$pag+1,'pp',$pp) . '">' .  $tmp . '</a>';
    } else {
      $nav .= " - $tmp";
    }
    for ($i = 1 ; $i <= $duoshao ; $i += $pp) {
      $nav .= ' - ';
      if ($n != $pag) {
        $nav .= '<a href="index.php?' . nuevoGet('pag',$n,'pp',$pp) . '">' .  $n . '</a>';
      } else {
        $nav .= $n;
      }
      $n++;
    }

    $htm = "<p>$nav</p>$htm<hr/><p>$nav</p>";
  }

  print $htm;

?>
