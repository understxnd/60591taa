<div class="container">
    <div >
        <p class="error">
            <?php
            if ($message){
                echo ($message);
            }
            if ($_SESSION['message']){
                echo ($_SESSION['message']);
                $_SESSION['message'] = null;
            }
            ?>
        </p>
    </div>
</div>