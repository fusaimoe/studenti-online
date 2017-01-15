$("#submit").prop("disabled",true);

$("input[type='radio']").change(function(){

    $("#submit").prop("disabled",false);

});
