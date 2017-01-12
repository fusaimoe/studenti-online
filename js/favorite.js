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

$('#settings').click(function () {
  $(".addremove-badge").toggleClass("display-badge");
  $(".toggable-link").toggleClass("toggle-link");
  $(".alert").toggle();
});

$(document).ready(function () {
  if(getUrlParameter('settings')) $('#settings').click() ;
});
