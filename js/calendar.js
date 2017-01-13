$(':checkbox').change(function(){

  var selected = [];

  $(':checkbox:checked').each(function() {
    selected.push($(this).attr('name'));
  });

  //console.log(selected);

  $.ajax({
    type: "POST",
    url: "php/update_calendar.php",
    data: { categories: selected },
    success: function(data){

      newid= new Date().getTime();
      $('.monthly').empty().replaceWith('<div class="monthly" id="cal' + newid + '"></div>');
        $('#cal' + newid).monthly({
          weekStart: 'Mon',
          mode: 'event',
          xmlUrl: 'events.xml'
        });

    }
  });

});
