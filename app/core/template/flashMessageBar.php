<?php if($app_session->hasFlashMessage()):?>
    <div id="flashMessageBar">
        <?php foreach($app_session->getFlashBagMessage() as $type => $messages):?>
            <div class="flashMessageBarContent <?=$type;?>">
                <ul>
                    <?php foreach($messages as $message):?>
                        <li><?= $message;?></li>
                    <?php endforeach;?>
                </ul>
            </div>
        <?php endforeach;?>

    </div>

    <script>
        $('.flashMessageBarContent').fadeIn(1000).delay(2000).fadeOut('slow');
    </script>

<?php endif;?>

