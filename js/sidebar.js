function toggleSidebar(button) {
  var opposite = getOpposite(button);
  var icon = getIcon(opposite);
  $(".sidebar-"+button).toggle();
  $('.row-offcanvas').toggleClass(button);
  $('.main-offcanvas').toggle();
  $("#sidebar-"+button+"-button").toggleClass('icon-button-disabled');
  $("#sidebar-"+button+"-button").is(':disabled') ? $("#sidebar-"+button+"-button").prop('disabled',false) : $("#sidebar-"+button+"-button").prop('disabled',true);
  $("#sidebar-"+opposite+"-button").children().toggleClass("icon-"+icon).toggleClass("icon-arrow-"+opposite);
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

function checkSidebar(sidebar) {
  return $("."+sidebar).length;
}

function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');

    if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined ? true : sParameterName[1];
    }
  }
}

$(document).ready(function () {

  var close = false;

  $('#sidebar-left-button').click(function () {
    close = clickedButton(close, $(this).attr('id'));
  });

  $('#sidebar-right-button').click(function () {
    close = clickedButton(close, $(this).attr('id'));
  });

  if (isMobile()) {
    $(window).swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
        if(!checkSidebar("right")){
          close = clickedButton(close, "right");
        }
      },
      swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
        if(!checkSidebar("left")){
          close = clickedButton(close, "left");
        }
      }
    });
  }

  if(getUrlParameter('sidebar')=='left') {
    $('.row-offcanvas').toggleClass('notransition');
    $('#sidebar-left-button').click();
    $('.row-offcanvas').toggleClass('notransition');
  } else if(getUrlParameter('sidebar')=='right') {
    $('.row-offcanvas').toggleClass('notransition');
    $('#sidebar-right-button').click();
    $('.row-offcanvas').toggleClass('notransition');
  }

});

$(window).on('load', function() {

  $("body").removeClass("preload");

  $('#mycalendar').monthly({
    weekStart: 'Mon',
    mode: 'event',
    xmlUrl: 'events.xml'
  });

  $( ".notification-unread" ).click(function() {
    $(this).removeClass("notification-unread");
  });

});
