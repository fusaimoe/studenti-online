function leftSidebar() {
  $('.sidebar-left').toggle();
  $('.row-offcanvas').toggleClass('left');
  $('.main-offcanvas').toggle();
  $('#sidebar-lb').children().toggle();
  $('#sidebar-rb').children().toggleClass('icon-bell').toggleClass('icon-arrow-right');
}
function rightSidebar() {
  $('.sidebar-right').toggle();
  $('.row-offcanvas').toggleClass('right');
  $('.main-offcanvas').toggle();
  $('#sidebar-rb').children().toggle();
  $('#sidebar-lb').children().toggleClass('icon-calendar').toggleClass('icon-arrow-left');
}
function toggleLeftSidebar(close){
  if(close){
    rightSidebar();
    return false;
  } else {
    leftSidebar();
    return true;
  }
}
function toggleRightSidebar(close){
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

  $('.sidebar-left').hide();
  $('.sidebar-right').hide();
  $('#sidebar-lb').click(function () {
    close=toggleLeftSidebar(close);
  });
  $(window).on("swipeleft",function(){
    close=toggleLeftSidebar(close);
  });
  $('#sidebar-rb').click(function () {
    close=toggleRightSidebar(close)
  });
});
