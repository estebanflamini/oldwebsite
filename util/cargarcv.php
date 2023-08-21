<?php

$trabajos = array();
$index = 0;
$librosTraducidos = 0;
$otrosTraducidos = 0;

function sE($parser, $name, $attrs) {

  global $cdata;
  $cdata = "";
}

function eE($parser, $name) {
  global $cdata;
  global $trabajos;
  global $index;
  global $librosTraducidos;
  global $otrosTraducidos;
    if ($name == "descripcion") {
    $trabajos[$index]['descripcion'] = trim($cdata);
  } else if ($name == "url") {
    $trabajos[$index]['url'] = trim($cdata);
  } else if ($name == "anyo") {
    $trabajos[$index]['anyo'] = trim($cdata);
  } else if ($name == "programacion") {
    $trabajos[$index]['programacion'] = true;
  } else if ($name == "traduccion") {
    $trabajos[$index]['traduccion'] = true;
  } else if ($name == "libro") {
    $trabajos[$index]['libro'] = true;
    $librosTraducidos++;
  } else if ($name == "img") {
    $trabajos[$index]['img'] = trim($cdata);
  } else if ($name == "item") {
    if ($trabajos[$index]['traduccion'] && !$trabajos[$index]['libro']) {
      $otrosTraducidos++;
    }
    $index++;
  }
}

function fH($parser, $data) {
  global $cdata;
  $cdata .= $data;
}

$xp = xml_parser_create();

xml_parser_set_option($xp,XML_OPTION_CASE_FOLDING,false);
xml_set_element_handler($xp, "sE", "eE");
xml_set_character_data_handler($xp, "fH");

$cvfile = "contents/trabajos_$lang.xml";

if (! file_exists($cvfile)) {
  $cvfile = "trabajos_es.xml";
}

if (!($fp = fopen($cvfile, "r"))) {
   die("could not open XML input");
}

while ($data = fread($fp, 4096)) {
   if (!xml_parse($xp, $data, feof($fp))) {
     die(sprintf("XML error: %s at line %d",
          xml_error_string(xml_get_error_code($xp)),
          xml_get_current_line_number($xp)));
   }
}
xml_parser_free($xp);

?>