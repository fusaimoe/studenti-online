$("#submit").prop("disabled",true);

$('[data-credits]:checkbox').change(function(){

  var selected = [];

  $('[data-credits]:checkbox:checked').each(function() {
    selected.push($(this).data('credits'));
    console.log(selected);
  });

  var total = 0;

  for (i = 0; i < selected.length; i++) {
       total += selected[i];
  }

  if(total==12){
    $("#submit").prop("disabled",false);
  } else{
    $("#submit").prop("disabled",true);
  }
});
