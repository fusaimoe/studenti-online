$(':checkbox').change(function(){

  var selected = [];

  $(':checkbox:checked').each(function() {
    selected.push($(this).attr('name'));
  });

  console.log(selected);

  $.ajax({
    url: 'php/update_calendar.php',
    type: 'POST',
    data: { categories: selected },
    success: function()
    {
        alert('Email Sent');
    }
  });

});
