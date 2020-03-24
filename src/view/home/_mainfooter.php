<?php if(!isset($copyUrl)):?>
    <?php $copyUrl = $app_session->getRequest()->getAbsoluteUrl();?>
<?php endif;?>

<p>
    Partager le lien<br/>
    <span id="tocopy"><?= $copyUrl;?></span><br/>
   
    <div style="display: flex">
        <button type="button" value="Copier" class="js-copy btn" data-target="#tocopy">
            <i class="material-icons">content_copy</i>
        </button>
    </div>
</p>





<script>
var btncopy = document.querySelector('.js-copy');
if(btncopy) {
    btncopy.addEventListener('click', docopy);
}

function docopy() {
    // Cible de l'élément qui doit être copié
    var target = this.dataset.target;
    var fromElement = document.querySelector(target);
    if(!fromElement) return;

    // Sélection des caractères concernés
    var range = document.createRange();
    var selection = window.getSelection();
    range.selectNode(fromElement);
    selection.removeAllRanges();
    selection.addRange(range);

    try {
        // Exécution de la commande de copie
        var result = document.execCommand('copy');
        if (result) {
            // La copie a réussi
            alert('Copié !');
        }
    }
    catch(err) {
        // Une erreur est surevnue lors de la tentative de copie
        alert(err);
    }

    // Fin de l'opération
    selection = window.getSelection();
    if (typeof selection.removeRange === 'function') {
        selection.removeRange(range);
    } else if (typeof selection.removeAllRanges === 'function') {
        selection.removeAllRanges();
    }
}
</script>