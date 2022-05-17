function checkBox(id) {
  let check = $("#" + id).is(":checked");

  if (check == true) {
    $("#" + id).val(1);
  } else {
    $("#" + id).val(0);
  }
}
