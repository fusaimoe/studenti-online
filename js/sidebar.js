function leftSidebar() {
  $('.sidebar-left').toggle();
  $('.row-offcanvas').toggleClass('left');
  $('.main-offcanvas').toggle();
  $('#sidebar-lb').children().visibilityToggle();
  $('#sidebar-lb').toggleClass('icon-button-disabled');
  if ($('#sidebar-lb').is(':disabled')) {
    $('#sidebar-lb').prop('disabled',false)
  } else {
    $('#sidebar-lb').prop('disabled',true);
  }; // This causes Bug 685657 on Firefox though, after refresh it will stay disabled
  $('#sidebar-rb').children().toggleClass('icon-bell').toggleClass('icon-arrow-right');
}

function rightSidebar() {
  $('.sidebar-right').toggle();
  $('.row-offcanvas').toggleClass('right');
  $('.main-offcanvas').toggle();
  $('#sidebar-rb').children().visibilityToggle();
  $('#sidebar-rb').toggleClass('icon-button-disabled');
  if ($('#sidebar-rb').is(':disabled')) {
    $('#sidebar-rb').prop('disabled',false);
  } else {
    $('#sidebar-rb').prop('disabled',true);
  }; // This causes Bug 685657 on Firefox though, after refresh it will stay disabled
  $('#sidebar-lb').children().toggleClass('icon-calendar').toggleClass('icon-arrow-left');
}

function leftButton(close){
  if(close){
    rightSidebar();
    return false;
  } else {
    leftSidebar();
    return true;
  }
}

function rightButton(close){
  if(close){
    leftSidebar();
    return false;
  } else {
    rightSidebar();
    return true;
  }
}

$(document).ready(function () {

  var close = false;

  $('#sidebar-lb').click(function () {
    close=leftButton(close);
  });

  $('#sidebar-rb').click(function () {
    close=rightButton(close)
  });

  /*$(window).on("swipeleft",function(){
    close=leftButton(close);
  });*/

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

});
