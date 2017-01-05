function toggleSidebar(button) {
  var opposite = getOpposite(button);
  var icon = getIcon(opposite);
  $(".sidebar-"+button).toggle();
  $('.row-offcanvas').toggleClass(button);
  $('.main-offcanvas').toggle();
  $("#sidebar-"+button+"-button").children().visibilityToggle();
  $("#sidebar-"+button+"-button").toggleClass('icon-button-disabled');
  $("#sidebar-"+button+"-button").is(':disabled') ? $("#sidebar-"+button+"-button").prop('disabled',false) : $("#sidebar-"+button+"-button").prop('disabled',true);  // This causes Bug 685657 on Firefox though, after refresh it will stay disabled
  $("#sidebar-"+opposite+"-button").children().toggleClass("icon-"+icon).toggleClass("icon-arrow-"+opposite);
}

function clickedButton(close, buttonStr){
  var button = (buttonStr.indexOf("left") >= 0) ? "left" : "right";
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

function initVisibility(){
  jQuery.fn.visible = function() {
    return this.css('visibility', 'visible');
  };

  jQuery.fn.invisible = function() {
    return this.css('visibility', 'hidden');
  };

  jQuery.fn.visibilityToggle = function() {
    return this.css('visibility', function(i, visibility) {
        return (visibility == 'visible') ? 'hidden' : 'visible';
    });
  };
}

$(document).ready(function () {

  var close = false;

  initVisibility();

  $('#sidebar-left-button').click(function () {
    var buttonStr = $(this).attr('id');
    close = clickedButton(close, buttonStr);
  });

  $('#sidebar-right-button').click(function () {
    var buttonStr = $(this).attr('id');
    close = clickedButton(close, buttonStr);
  });

});
