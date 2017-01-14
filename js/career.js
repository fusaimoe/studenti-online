$('.resize').click(function() {
    $('.resizable-column').toggleClass("col-lg-4").toggleClass("col-nopadding").toggleClass("col-lg-12");
    $('.table-code').toggleClass("hidden");
    $('.table-record').toggleClass("hidden");

    if($("span").hasClass("icon-size-fullscreen")){
      $('.icon-size-fullscreen').toggleClass('icon-size-fullscreen icon-size-actual');
    } else if($("span").hasClass("icon-size-actual")) {
      $('.icon-size-actual').toggleClass('icon-size-actual icon-size-fullscreen');
    }
});

$(".rotate").click(function(){
   $(this).toggleClass("down");
});

/*
$('[id^=collapse-]').each(function() {
  var thisCollapsableDiv = "#" + this.id;

  $(thisCollapsableDiv).on('hidden.bs.collapse', function() {
    $(thisCollapsableDiv).prev().find('.icon-arrow-up').toggleClass('icon-arrow-up icon-arrow-down');
  });
  $(thisCollapsableDiv).on('shown.bs.collapse', function() {
    $(thisCollapsableDiv).prev().find('.icon-arrow-down').toggleClass('icon-arrow-down icon-arrow-up');
  });
});*/

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
