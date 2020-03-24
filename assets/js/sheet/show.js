// show information
$( document ).ready(function() {
    $('.expandAnswer').click(function() {

        let dataId = $(this).attr('data-id');
        let type   = dataId.split('-')[0];
        let id     = dataId.split('-')[1];

        if(type == "show") {
            $("#content-"+id).show("slow");
            $(this).hide();
            $("#hideContent-"+id).show();
        } else {
            $("#content-"+id).hide("slow");
            $(this).hide();
            $('#showContent-'+id).show();
        }
    });

    $('.basicInput').keyup(function() {
        let key = $(this).attr('data-informations');
        let first    = $(this).val();
        let solution = $('#solution-'+key).val();
        let options  = $('#options-'+key).val();
        let answer   = 0;

        if( first == solution) { // good answer
            answer = 1;
        } else {
            if(options != "") {
                let allwords = options.split(',');
                for(let j = 0; j < allwords.length; j++) {
                    if( first == allwords[j]) { answer = 1;}
                }
            } 
        }

        if( answer == 0 ) {
            $(this).removeClass('goodAnswer').addClass('badAnswer')
        } else {
            $(this).removeClass('badAnswer').addClass('goodAnswer')
        }
    })


    $('.showTxt').click(function() {
        let el = $(this).attr('id');
        let type = el.split('-')[0];
        let id   = el.split('-')[1];

        if( type == 'TxtFull') {
            $('#showTxtFull-'+id).show();
            $('#showTxtEmpty-'+id).hide();
            $('#TxtFull-'+id).hide();
            $('#TxtEmpty-'+id).show();
        } else {
            $('#showTxtFull-'+id).hide();
            $('#showTxtEmpty-'+id).show();
            $('#TxtFull-'+id).show();
            $('#TxtEmpty-'+id).hide();
        }
    })
})