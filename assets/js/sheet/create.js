$(document).ready(function(){
    $('select').formSelect();
  });
  
  $("textarea").keyup(function(e) {
    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
        $(this).height($(this).height()+1);
    };
})


// send sheet form
$('#sheeForm').submit(function(e) {
    e.preventDefault();

    let form = $(e.target);
    let action = $('#sheeForm').attr('action');
    $.ajax({
        method: "POST",
        url: action,
        data: form.serialize(),
    }).done(function( result ) {

        let data = JSON.parse(result);

        $('#sheet_id').val(data.id);
        $('#sheet_slug').val(data.slug);
        $('#sheet_created_at').val(data.createdAt.date);
        $('#sheet_updated_at').val(data.updatedAt.date);
        $('#submitSheetButton').val('Modifier');
        toastr.success('La fiche a été enregistrée', 'Continuez !');

        $('#contentDefinition').show();


    });
})
