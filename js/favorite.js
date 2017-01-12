$('#settings').click(function () {
  $(".addremove-badge").toggleClass("display-badge");
  $(".toggable-link").toggleClass("toggle-link");
  $(".alert").toggle();
});

$(document).ready(function () {
  if(getUrlParameter('settings')) $('#settings').click() ;
});
