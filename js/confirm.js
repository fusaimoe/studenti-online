function sendConfirmation(array, conf) {
  $.ajax({
    type: "POST",
    url: "php/update_plan.php",
    data: conf + '=' + array,
    success: function(response){
      location.href = "index.php";
    }
  });
}
