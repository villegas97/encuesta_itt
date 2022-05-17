function habilita_via_informacion_otro(id) {
  let check = $("#" + id).is(":checked");
  if (id == "via_informacion_otro" && check == true) {
    $("#via_inf_otro_text").removeAttr("disabled");
  } else {
    $("#via_inf_otro_text").attr("disabled", "disabled");
  }
}
