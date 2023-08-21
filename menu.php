<?php

require_once('util/nuevoget.php');

$index = 0;
$menuJs = $menuNoJs = '';

/* $menuNoJs = '<span style="color: red">' . ($lang == 'es' ? 'Menú para navegadores sin Javascript '
  : 'No-javascript menu') . '</span>'; */

function startsection() {

  global $index;
  global $menuJs;

  $index = 0;

  $menuJs .= '<td><div class="menusection">';
}

function endsection() {
  global $menuJs;

  $menuJs .= '</div></td>';
}

function menuitem($goto2,$es,$en) {

  global $lang;
  global $goto;
  global $index;
  global $menuJs;
  global $menuNoJs;

  $text = ($lang=='es' ? $es : $en);

  if ($index++==0) {
    $class="menuheader activo";
  } else {
    $class="menuitem";
  }

  if ($goto2 == '') {
    $menuJs .= "<div class=\"$class\">$text</div>";
  } else if ($goto==$goto2) {
    $menuJs .= "<div class=\"$class selec\">$text</div>";
    $text = str_replace('<br>','&nbsp;',$text);
    $text = str_replace(' ','&nbsp;',$text);
    $menuNoJs .= " &bull;<span>$text</span> ";
  } else {
    if (preg_match('/^[a-z_]+$/i',$goto2)) {
      $href = href($goto2);
    } else {
      $href = $goto2;
    }
    if (preg_match('/^http:/',$href)) {
      $target = ' target="_blank"';
    } else {
      $target = '';
    }
    $menuJs .= "<a class=\"$class\"$target href=\"$href\">$text</a>";

    $text = str_replace('<br>','&nbsp;',$text);
    $text = str_replace(' ','&nbsp;',$text);
    $menuNoJs .= " &bull;<a $target href=\"$href\">$text</a> ";
  }
}

startsection();
menuitem('home','Presentación','Introduction');
menuitem('serv','Servicios','Services');
menuitem('fort','Mis fortalezas','My strengths'); */
menuitem('ref','CV y referencias','CV & references');
endsection();

startsection();
menuitem('trad','Experiencia','Experience');
menuitem('cli','Clientes','Clients');
menuitem('spec','Especialidades','Specializations');
menuitem('jobs','Historial','Work history');
menuitem('rec','Membresías<br>y premios','Memberships<br>& Awards');
menuitem('samples','Trabajos de muestra','Work samples');
endsection();

startsection();
menuitem('','Más datos','Other data');
menuitem('docencia','Experiencia<br>docente','Work as<br>a teacher');
menuitem('prog','Experiencia en programación','Experience as a programmer');
menuitem('jobs_prog','Historial en programación','Work history as a programmer');
menuitem('jobs_all','Historial general','Work history (all)');
menuitem('educ','Estudios','Education');
endsection();

startsection();
menuitem('mail','Contacto','Contact');
menuitem('otros_sitios','LinkedIn, ProZ, Facebook, etc.','LinkedIn, ProZ, Facebook, etc.');
endsection();

startsection();
menuitem('index.php?' . nuevoGet('lang',($lang=='es'?'en':'es'),'fb',''),'English','Español');
endsection();

?>
