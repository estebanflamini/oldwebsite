<?php require 'util/getenctype.php'; ?>

<script type="text/javascript">

function trim(s) {
  return s.replace(/\s|\n/g,"");
}

function validarMail(form) {

  if (trim(form.asunto.value)=="") {
    alert("Debe ingresar el asunto del mensaje.");
    return false;
  }

  if (trim(form.mensaje.value)=="") {
    alert("Debe ingresar el texto del mensaje.");
    return false;
  }

  if (trim(form.nombre.value)=="") {
    alert("Debe ingresar su nombre.");
    return false;
  }

  if (trim(form.correo.value)=="") {
    alert("Debe ingresar su correo-e.");
    return false;
  }

  if (! form.correo.value.match(/^\s*[\w\d][\w\d\-\_]*(\.?[\w\d\-\_]+)*@[\w\d][\w\d\-\_]*(\.?[\w\d\-\_]+)*\s*$/i)) {
    alert("El correo-e ingresado es incorrecto.");
    return false;
  }

  return true;
}

</script>


<!-- INICIO CONTENIDO -->

<h1>Formulario de correo</h1>

               
<form action="index.php?goto=enviarmail" method="post"
    onsubmit="return validarMail(this)">

<table width=100% border=0 cellspacing=0 cellpadding=0>

<input type=hidden name=pruebacod value="<?= $pruebacod ?>"></input>

<tr>
  <td align=center width=30% style="text-align: left">Asunto:</td>
  <td><input type=text name=asunto style="width: 100%" value=""></input></td>
</tr>

<tr>
  <td colspan=2>&nbsp;</td>
</tr>

<tr>
  <td colspan=2>Mensaje:</td>
</tr>
<tr>
  <td colspan=2 width=100%>
    <textarea name=mensaje rows=10 style="width: 100%"></textarea>
  </td>
</tr>

<tr>
  <td colspan=2>&nbsp;</td>
</tr>

<tr>
  <td align=center width=30% style="text-align: left">Su nombre:</td>
  <td><input type=text name=nombre style="width: 100%" value=""></input></td></tr>
<tr>
  <td align=center width=30% style="text-align: left">Su <i>e-mail</i>:</td>
  <td><input type=text name=correo style="width: 100%" value=""></input></td>
</tr>
<tr>
  <td colspan=2>&nbsp;</td>
</tr>
<tr>
  <td colspan=2 align=center>
    <input type=submit name=enviar value=Enviar></input>&nbsp;
  <input type=reset value=Borrar></input>&nbsp;</td>
</tr>
</table>
</form>

<!-- FIN CONTENIDO -->

