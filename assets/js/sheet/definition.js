var updateDefinitionUrl = $('#updateDefinitionUrl').val();
var textSelectedArray = [];
var wDefinition = 0;


function getRandomInt() {
    return Math.floor(Math.random() * Math.floor(1000000));
  }

$('#addDefinition').click(function() {
    let sheetId= document.getElementById('sheet_id').value;
    let formId = getRandomInt();
    let html  = "<div class='definitionBlock' id='blockDefinition-"+formId+"'>";
        html += "<div class='deleteWdefinition' onclick='deleteBlockDefinition("+formId+")'>X</div><br style='clear: both'/>";
        html += "<form method='post' id='formQuestion-"+formId+"' class='formQuestion'>";
        html += "<input type='hidden' name='sheet_id' value="+sheetId+" />";
        html += "<input type='hidden' name='id' id='questionId-"+formId+"'/>";
        html += "<input type='hidden' name='created_at' id='createdAt-"+formId+"'/>";
        html += "<input type='hidden' name='updated_at' id='updatedAt-"+formId+"'/>";
        html += "<input type='text' name='question' placeholder='Entrez votre question'/><br/>";
        html += "<textarea id='textarea-"+formId+"' class='textareaAnswerDefinition' name='answer' placeholder='Proposez votre définition'></textarea><br/>";
        html += "<div class='btn btnSelectWordDefinition' onclick='getTextareaSelection("+formId+")'>Sélectionner le mot</div>" 
        html += "<button class='btn submitFormDefinition' onclick='event.preventDefault();submitFormQuestion("+formId+")' data-formId='"+formId+"' >Enregistrer</button>";
        html += "<br style='clear: both'/>";
        html += "<div id='textSelectedContainer-"+formId+"'></div>";
        html += "</form></div>";
    $('#flowDefinition').append(html);
})

function submitFormQuestion(formId) {

    let myForm = document.getElementById('formQuestion-'+formId);
    formData = new FormData(myForm);

    let definition = {}; var d = 0; var a = 0; let valTextDef = {}; let valTextAlt = {}
    formData.forEach(function(value, key){
        if(key == "textDefinition") {
            valTextDef[d] = value;
            d++;
        }
        if(key == "textAlternative") {
            valTextAlt[a] = value;
            a++;
        }
        definition[key] = value;
    });
    definition['textDefinition'] = valTextDef;
    definition['textAlternative'] = valTextAlt;

    $.ajax({
        method: "POST",
        url: updateDefinitionUrl,
        data: { definition },
    }).done(function( result ) {
        let data = JSON.parse(result);
        document.getElementById('questionId-'+formId).value = data.id;
        document.getElementById('createdAt-'+formId).value = data.createdAt.date;
        document.getElementById('updatedAt-'+formId).value = data.updatedAt.date;
        toastr.success('La question a été enregistrée', 'Question');

    });
}

function deleteBlockDefinition(id) {
    let line = document.getElementById('blockDefinition-'+id);
    line.parentNode.removeChild(line);
}

function getTextareaSelection(id) {
    let el = document.getElementById('textarea-'+id);
    let startPosition = el.selectionStart;
    let endPosition = el.selectionEnd;
    let txt = el.value.substring(startPosition, endPosition);

    createInputSelected(id, txt);
    let newTxt = '['+txt+']';
    replaceTextareaSelection(el, txt, newTxt);    
}

function createInputSelected(id, txt) {
    wDefinition++;
    var escapeTxt = txt.replace(/'/g, "\\'");
    let html  = "";
    html += "<div class='textSelected' id='lineWSelected-"+id+"-"+wDefinition+"'>";
    html += '<div class="deleteWdefinition" onclick="retrieveSelected(\''+escapeTxt+'\', '+id+', '+wDefinition+')">X</div><br style="clear: both"/>';
    html += '<input type="hidden" name="textDefinition" value="'+txt+'">';
    html += "<b>"+txt+"</b><input type='text' name='textAlternative' placeholder='Ajoutez les variantes séparées par des virgules. Ex : fiche, fiches, fish'/>";
    html += "</div>";
    $('#textSelectedContainer-'+id).append(html);
}

function retrieveSelected(txt, id, wId) {
    let el = document.getElementById('textarea-'+id);
    let newTxt = '['+txt+']';
    replaceTextareaRemove(el, newTxt, txt);
    let line = document.getElementById('lineWSelected-'+id+'-'+wId);
    line.parentNode.removeChild(line);
}

function replaceTextareaSelection(el, txt, newTxt) {
    if(el.selectionStart == undefined) {
        document.selection.createRange().text = txt;
    } else { 
        el.value = el.value.substring(0, el.selectionStart) + newTxt + el.value.substring(el.selectionEnd, el.value.length);
    }
}

function replaceTextareaRemove(el, txt, newTxt) {
    let textareaContent = el.value;
    let newTxtareaContent = textareaContent.replace(txt, newTxt);
    el.value = newTxtareaContent;
}
