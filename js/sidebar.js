function toggleSidebar(button) {
  var opposite = getOpposite(button);
  var icon = getIcon(opposite);
  $(".sidebar-"+button).toggle();
  $('.row-offcanvas').toggleClass(button);
  $('.main-offcanvas').toggle();
  $("#sidebar-"+button+"-button").toggleClass('icon-button-disabled');
  $("#sidebar-"+button+"-button").is(':disabled') ? $("#sidebar-"+button+"-button").prop('disabled',false) : $("#sidebar-"+button+"-button").prop('disabled',true);
  $("#sidebar-"+opposite+"-button").children().toggleClass("icon-"+icon).toggleClass("icon-arrow-"+opposite);
  if(isMobile()) toggleSwipe();
}

function clickedButton(close, buttonId){
  var button = (buttonId.indexOf("left") >= 0) ? "left" : "right";
  var opposite = getOpposite(button);

  if(close){
    toggleSidebar(opposite);
    return false;
  } else {
    toggleSidebar(button);
    return true;
  }
}

function getOpposite(button) {
  return opposite = (button=="left") ? "right" : "left";
}

function getIcon(opposite) {
  return icon = (opposite=="left") ? "calendar" : "bell";
}

function isMobile() {
  try{ document.createEvent("TouchEvent"); return true; }
  catch(e){ return false; }
}

function toggleSwipe() {
  if(checkSidebar("left")) {
    $("body").swipe( {
      swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
        $("#sidebar-right-button").trigger( "click" );
      }
    });
  } else if(checkSidebar("right")) {
    $("body").swipe( {
      swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
        $("#sidebar-left-button").trigger( "click" );
      }
    });
  } else {
    $("body").swipe("destroy");
  }
}

function checkSidebar(sidebar) {
  return $("."+sidebar).length;
}

$(document).ready(function () {

  var close = false;

  if(isMobile()){

  }

  $('#sidebar-left-button').click(function () {
    close = clickedButton(close, $(this).attr('id'));

  });

  $('#sidebar-right-button').click(function () {
    close = clickedButton(close, $(this).attr('id'));
  });




});
