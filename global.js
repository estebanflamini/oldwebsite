$(function() {

  $("a[href=javascript:void()]").css("cursor","default");
  $("div.menuheader").css("cursor","default");
  $("div.menuitem").css("cursor","default");
  $("a[href!=javascript:void()]").addClass("hover");

/* Pendiente: aplicar el atributo width mediante una clase */
  if ($.browser.msie && ! $.support.boxModel) {
    $(".menuheader").css("width","7em");
    $(".menuitem").css("width","7em");
  }


  $(".menuheader").each(function() {
    if ($(this).siblings(".menuitem").length==0) {
      if ($(this).hasClass("selec")) {
        $(this).removeClass("activo");
      }
    }
  });

  $(".activo").mouseover(function() {
    $(this).siblings(".menuitem").css("display","block");
    $(this).parent().css("margin","0px");
    $(this).parent().css("border","1px solid black");
  });

  $(".menusection").mouseleave(function() {
    $(this).children(".menuitem").css("display","none");
    $(this).css("margin","1px");
    $(this).css("border","none");
  });
});

$(window).resize(function() {
  fijarAncho()
});

function fijarAncho() {

  w = $(window).width();
  $("#contenidoout").width((w * 70) / 100);
  $("#menujs").width((w * 70) / 100);
  $("#contenidoout").css('left',(w * 12) / 100);
  $("#menujs").css('left',(w * 15) / 100);
}
