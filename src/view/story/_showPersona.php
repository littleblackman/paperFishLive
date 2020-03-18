<ul class="listPersona">
    <?php foreach($story->getPersonas() as $k => $persona):?>
        <li class="item showInfoBelow">
            <?= $persona->getFullname();?>
            <?php if($persona->getNickname()) echo '<br/><i>dit aussi '.$persona->getNickname().'</i>';?>
        </li>
        <li class="blockInformationPersona">
            <!--
            <div data-href="<?= path('editPersona', $persona->getId());?>" style="float: right; font-size:12px; cursor: pointer" title="Ajouter un récit">
                <i class="material-icons addBigButton">edit</i>
            </div>-->
            <div>
                Age : <?= $persona->getAge();?>
                <h4>Personnalité</h4>
                <?= $persona->getPersonnality();?>

                <h4>Valeurs morales et éthiques</h4>
                <?= $persona->getMoralValues();?>

                <h4>Point faible</h4>
                <?= $persona->getAchillesHeel();?>

                <h4>Vie et statut social</h4>
                <?= $persona->getSocialStanding();?>

                <h4>Philosophie & Croyance</h4>
                <?= $persona->getPhilosophy();?>

                <h4>Background</h4>
                <?= $persona->getBackground();?>

                <h4>Evolution au cours du récit</h4>
                <?= $persona->getNarrativeAnalysis()->getEvolution();?>

                <h4>Schéma actanciel</h4>
                <div id="myDiagramDiv<?= $k;?>" style="width: 100%; height:500px"></div>
            
            </div>
        </li>
    <?php endforeach;?>

</ul>

<?php foreach($story->getPersonas() as $k => $persona):?>
    <script>
        $( document ).ready(function() {
            let $ = go.GraphObject.make;  

            let k = "<?= $k ;?>"
            let personaName = "<?= $persona->getFullname();?>";
            let mission = "<?= $persona->getNarrativeAnalysis()->getQuestItem();?>";
            let receiver = "<?= $persona->getNarrativeAnalysis()->getReceiver();?>";
            let senderName = "<?= $persona->getNarrativeAnalysis()->getSender();?>";
            let adjuvant = "<?= $persona->getNarrativeAnalysis()->getAdjuvant();?>";
            let opponent = "<?= $persona->getNarrativeAnalysis()->getOpponent();?>";

            myDiagram = $(go.Diagram, "myDiagramDiv"+k,{"undoManager.isEnabled": true});

            myDiagram.nodeTemplate =
            $(go.Node, "Auto",
                new go.Binding("location", "loc", go.Point.parse),
                $(
                    go.Shape, "RoundedRectangle", 
                    { strokeWidth: 0, fill: "white" },
                    new go.Binding("fill", "color")
                ),
                $(
                    go.TextBlock,
                    { margin: 8, font: "bold 14px sans-serif", stroke: '#333' },
                    new go.Binding("text", "name")
                )
            );

            myDiagram.model = new go.GraphLinksModel(
            [
                { key: "1", name: "Autorité\n"+senderName, color: "lightblue" ,  loc: "0 0" },
                { key: "2", name: "Mission\n"+mission, color: "#EE56A1",  loc: "133 100" },
                { key: "3", name: "Bénéficiaire\n"+receiver, color: "lightgreen",  loc: "266 0"  },
                { key: "5", name: "Allié(s)\n"+adjuvant, color: "lightgreen",  loc: "0 300"  },
                { key: "6", name: personaName, color: "white",  loc: "143 200"  },
                { key: "7", name: "Opposant(s)\n"+opponent, color: "pink",  loc: "266 300"  }
            ],
            [
                { from: "1", to: "2" },
                { from: "3", to: "2" },
                { from: "5", to: "6" },
                { from: "7", to: "6" },
                { from: "6", to: "2" }
            ]);
        });
    </script>
<?php endforeach;?>

<script>
    $( document ).ready(function() {
        $('.blockInformationPersona').hide();
    });
</script>
