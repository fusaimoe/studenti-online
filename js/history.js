$('[data-notification-id]').click(function () {

  var pressed = $(this).data("notification-id");

  console.log(pressed);//debugging purpose


  $(this).removeClass("notification-unread");

  $.ajax({
    type: "POST",
    url: "../php/notification_dismiss.php",
    data: { dismiss: pressed },
    success: function(response){
      //alert(response);//debugging purpose
    }
  });
})
