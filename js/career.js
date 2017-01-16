$('.resize').click(function() {
    $('.resizable-column').toggleClass("col-lg-4").toggleClass("col-lg-12");
    $('.resizable-column').first().toggleClass("col-nopadding-left");
    $('.resizable-column').first().next().toggleClass("col-nopadding");
    $('.resizable-column').last().toggleClass("col-nopadding-right");
    $('.table-code').toggleClass("hidden");
    $('.table-record').toggleClass("hidden");

    if($("span").hasClass("icon-size-fullscreen")){
      $('.icon-size-fullscreen').toggleClass('icon-size-fullscreen icon-size-actual');
    } else if($("span").hasClass("icon-size-actual")) {
      $('.icon-size-actual').toggleClass('icon-size-actual icon-size-fullscreen');
    }
});

$('[id^=collapse-]').each(function() {

  console.log($(this).prev().children().is("button"));

  $(this).on('show.bs.collapse', function() {
    $(this).prev().is("button") ? $(this).prev().toggleClass("down") : $(this).prev().children().toggleClass("down");
    $(this).prev().is("button") ? $(this).prev().prop('disabled', true)  : $(this).prev().children().prop('disabled', true);
  });
  $(this).on('shown.bs.collapse', function() {
    $(this).prev().is("button") ? $(this).prev().prop('disabled', false)  : $(this).prev().children().prop('disabled', false);
  });
  $(this).on('hide.bs.collapse', function() {
    $(this).prev().is("button") ? $(this).prev().toggleClass("down") : $(this).prev().children().toggleClass("down");
    $(this).prev().is("button") ? $(this).prev().prop('disabled', true)  : $(this).prev().children().prop('disabled', true);
  });
  $(this).on('hidden.bs.collapse', function() {
    $(this).prev().is("button") ? $(this).prev().prop('disabled', false)  : $(this).prev().children().prop('disabled', false);
  });
});

$('[data-notification-id]').on('close.bs.alert', function () {

  var pressed = $(this).data("notification-id");

  //console.log(pressed);//debugging purpose

  $.ajax({
    type: "POST",
    url: "../php/notification_dismiss.php",
    data: { dismiss: pressed },
    success: function(response){
      //alert(response);//debugging purpose
    }
  });
})

$("#settings").prop('disabled',true)
