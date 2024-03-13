<?php

/**  @var $exception \Throwable */
?>

<style>
    .flex-container {
        height: 64vh;
        flex-direction: column;
    }

    .flex-container>* {
        margin-bottom: 15px;
        line-height: 1.5;
        font-size: 2rem;
    }
</style>

<div class="flex-container">
    <h1 class="text-center">
        <?php echo $exception->getCode();  ?> - <?php echo $exception->getMessage(); ?>
    </h1>

    <?php
    $status_code = $exception->getCode();
    if ($status_code === 401 || $status_code === 402 || $status_code === 403) {
    ?>
        <div class="text-center">
            <a href="login">Login</a> | <a href="register">Sign up</a>
        </div>
    <?php } ?>

</div>
