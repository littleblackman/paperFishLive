<ul>
    <?php foreach($storys as $story):?>
        <li class="lineList showInfoBelow">
            <div><?= ucfirst($story->getType());?></div>
            <a href="<?= path('showStory', $story->getSlug());?>" class="titleLine">
                <?= $story->getTitle();?>
            </a>
            <div>
                <?php if(is_owner($story)):?>
                <a href="<?= path('editStory', $story->getSlug());?>" class="">
                    <i class="material-icons">edit</i>
                </a>
                <?php else:?>
                    <?= $story->getOwner()->getInitials();?> 
                <?php endif;?>
            </div>
    </li>
    <li class="describeInformation blockInformation">
        <b><?= $story->getByName();?></b><br/>
        <i>Oeuvre sortie en <?= $story->getDateParution();?></i>
        <br/>
        <div class="listTag">
            <?= $story->getGenresTag();?>
            <?= $story->getThemesTag();?>
        </div>
        <?= $story->getResume();?>
    </li>
    <?php endforeach;?>
</ul>