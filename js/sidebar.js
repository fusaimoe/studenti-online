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
function leftButton(close){
  if(close){
    rightSidebar();
    history.pushState(null, "Returned to index", "index.htm");
    return false;
  } else {
    leftSidebar();
    history.pushState(null, "Calendar sidebar", "calendar.htm");
    console.log('ora');
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

  $('.sidebar-left').hide();
  $('.sidebar-right').hide();
  $('#sidebar-lb').click(function () {
    close=leftButton(close);
  });
  $(window).on("swipeleft",function(){
    close=leftButton(close);
  });
  $('#sidebar-rb').click(function () {
    close=rightButton(close)
  });
});
