$("textarea").keyup(function(e) {
    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
        $(this).height($(this).height()+1);
    };
})

var updatePersonaAjaxUrl = $('#updatePersonaAjaxUrl').val();
var personas = [];

// show information
$('.showInfoBelow').click(function() {
    $(this).next().toggle('slow');
})

// show information type
$('.selectType').click(function() {
    $('.informationType').hide();
    let type = $(this).val();
    $('#'+type+'InformationType').show();
})

// autocomplte resume
$('.dataResumeItem').change(function() {

    let when = $('#data-when').val();
    let where = $('#data-where').val();
    let who = $('#data-who').val();
    let what = $('#data-what').val();
    let why = $('#data-why').val();
    let how = $('#data-how').val();

    let html = when+', '+where+', '+who+' '+what+' '+how+' '+why+'.';
    $('#data-resume').val(html);
})

// Persona
$('#addCharacter').click(function() {
    $('#characterFormContent').toggle('slow');
    $('#deletePersona').hide();
    $('#personaForm')[0].reset();
    $('#submitPersonaForm').val('Créer');
    $('#titlePersonaForm').text('Créer');

})

$('#closePersonaForm').click(function(){
    $('#characterFormContent').hide('slow');
})

// create list select THEME
$('#data-theme').keyup(function() {
    let myString = $('#data-theme').val();
    $('#themeList').empty();

    let href= $(this).attr('data-href');
    if(myString == "") {
        $('#themeList').hide();
        return false;
    }

    $('#themeList').show();
    
    let line = "";

    $.ajax({
        method: "POST",
        url: href,
        data: { myString: myString}
    })
        .done(function( result ) {
            let data =  JSON.parse(result);
            for(let i = 0; i < data.length; i++) {
                line = "<li onclick='addToThemeList(\""+data[i].name+"\", \""+data[i].id+"\")'  style='cursor: pointer'>"+data[i].name+"</li>";
                $('#themeList').append(line);
            } 
    });
});

function addToThemeList(theme, id) {
    let tag = "<div onclick='removeTag(\""+id+"\")' class='tag' id='tag-"+id+"' style='cursor: pointer'>"+theme+"</div>";
    $("#themeTag").append(tag);
    let themeList = $('#data-theme-list').val();
    themeList += "-"+id;
    $('#data-theme-list').val(themeList);
}

function removeTag(id) {
    let elem = document.getElementById("tag-"+id);
    elem.parentNode.removeChild(elem);

    let themeList = $('#data-theme-list').val();
    let newThemeList = themeList.replace(id, "");
    $('#data-theme-list').val(newThemeList);
}


// create list select GENRE
$('#data-genre').keyup(function() {

    let myString = $('#data-genre').val();
    $('#genreList').empty();

    let href= $(this).attr('data-href');
    if(myString == "") {
        $('#genreList').hide();
        return false;
    }

    $('#genreList').show();
    
    let line = "";

    $.ajax({
        method: "POST",
        url: href,
        data: { myString: myString}
    })
        .done(function( result ) {
            let data =  JSON.parse(result);
            for(let i = 0; i < data.length; i++) {
                line = "<li onclick='addToGenreList(\""+data[i].name+"\", \""+data[i].id+"\")' style='cursor: pointer'>"+data[i].name+"</li>";
                $('#genreList').append(line);
            } 
    });
});

function addToGenreList(genre, id) {
    let tag = "<div onclick='removeTagGenre(\""+id+"\")' class='tag' id='tagGenre-"+id+"' style='cursor: pointer'>"+genre+"</div>";
    $("#genreTag").append(tag);
    let genreList = $('#data-genre-list').val();
    genreList += "-"+id;
    $('#data-genre-list').val(genreList);
}

function removeTagGenre(id) {
    let elem = document.getElementById("tagGenre-"+id);
    elem.parentNode.removeChild(elem);

    let genreList = $('#data-genre-list').val();
    let newGenreList = genreList.replace(id, "");
    $('#data-genre-list').val(newGenreList);
}

// send persona form
$('#personaForm').submit(function(e) {
    e.preventDefault();

    let form = $(e.target);
    let action = $('#personaForm').attr('action');
    $.ajax({
        method: "POST",
        url: action,
        data: form.serialize(),
    }).done(function( result ) {

        let data = JSON.parse(result);

        personas[data.id] = data;


        let isUpdated = parseInt($('#persona_id').val());
        
        if(isUpdated > 0) {
            let targetId = "tagPersona-"+data.id;
            let elem = document.getElementById(targetId);
            elem.parentNode.removeChild(elem);    
        }
      
        let tag = "<div onclick='updatePersona(\""+data.id+"\")' class='tag' id='tagPersona-"+data.id+"' style='cursor: pointer'>"+data.firstname+' '+data.lastname+"</div>";
        $("#personaTag").append(tag);
        let personaList = $('#data-persona-list').val();
        personaList += "-"+data.id;
        $('#data-persona-list').val(personaList);
        $('#characterFormContent').hide('slow');
    });
})

function updatePersonaAjax(id) {
    $.ajax({
        method: "GET",
        url: updatePersonaAjaxUrl+'/'+id,
        data: {persona_id : id},
    }).done(function( data ) {

        $('#personaForm')[0].reset();
        $('#characterFormContent').toggle('slow');
        
        let persona = JSON.parse(data);
        let narrative = persona.narrativeAnalysis;

        hydatePersonaForm(persona, narrative);

    })
}

function updatePersona(id) {

    $('#personaForm')[0].reset();
    $('#characterFormContent').toggle('slow');

    let persona = personas[id];
    let narrative = personas[id].narrativeAnalysis;

    hydatePersonaForm(persona, narrative);

}

function hydatePersonaForm(persona, narrative) {
    // hydrate form modal
    $('#persona_id').val(persona.id);
    $('#persona_firstname').val(persona.firstname);
    $('#persona_lastname').val(persona.lastname);
    $('#persona_nickname').val(persona.nickname);
    $('#persona_age').val(persona.age);
    $('#persona_personnality').val(persona.personnality);
    $('#persona_moral_values').val(persona.moralValues);
    $('#persona_achilles_heel').val(persona.achillesHeel);
    $('#persona_social_standing').val(persona.socialStanding);
    $('#persona_philosophy').val(persona.philosophy);
    $('#persona_background').val(persona.background);

    $('#narrative_id').val(narrative.id);
    $('#narrative_quest_item').val(narrative.questItem);
    $('#narrative_receiver').val(narrative.receiver);
    $('#narrative_sender').val(narrative.sender);
    $('#narrative_adjuvant').val(narrative.adjuvant);
    $('#narrative_opponent').val(narrative.opponent);
    $('#narrative_evolution').val(narrative.evolution);

    $('#deletePersona').show();
    $('#deletePersona').attr('data-personaId', persona.id);
    $('#submitPersonaForm').val('Modifier');
    $('#titlePersonaForm').text('Modifier');

}


$('#deletePersona').click(function(e) {

    e.preventDefault();
    let href = $(this).attr('href');
    var personaId = $(this).attr('data-personaId');

    $.ajax({
        method: "POST",
        url: href,
        data: { personaId: personaId}
    })
        .done(function( result ) {
            toastr.error('Le personnage a été supprimé', 'Continuez !');
            let elem = document.getElementById("tagPersona-"+personaId);
            elem.parentNode.removeChild(elem);
            $('#characterFormContent').hide('slow');
            
    });
   
})
