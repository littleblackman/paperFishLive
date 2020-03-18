<?php if(ENV == "dev"):?>
    <div style="position:absolute; top: 0px; left: 0px; z-index: 1999; background-color: black; color: white;">
        <div id="buttonSessionBarContent" style="background-color: black; color: white; cursor: pointer; width: 30px; height: 30px">
            X
        </div>
        <div style="display: none; width: 100%" id="showSessionBarContent">
            <pre>
                <?php print_r($_SESSION);?>
            </pre>
        </div>
    </div>
    <script>
        $('#buttonSessionBarContent').click(function() {
            $('#showSessionBarContent').toggle();
        })
    </script>
<?php endif;?>