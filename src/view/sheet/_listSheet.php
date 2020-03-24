<ul>
    <?php foreach($sheets as $sheet):?>
        <li class="lineList showInfoBelow">
            <div><?= ucfirst($sheet->getTopicName());?></div>
            <a href="<?= path('showSheet', $sheet->getSlug());?>" class="titleLine">
                <?= $sheet->getTitle();?>
            </a>
            <div>
                <?php if(is_owner($sheet)):?>
                <a href="<?= path('editSheet', $sheet->getSlug());?>" class="">
                    <i class="material-icons">edit</i>
                </a>
                <?php else:?>
                    <?= $sheet->getOwner()->getInitials();?> 
                <?php endif;?>
            </div>
    </li>
    <li class="describeInformation blockInformation">
        <?= $sheet->getDescription();?>
    </li>
    <?php endforeach;?>
</ul>