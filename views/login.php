<?php

/** @var $model = \app\models\User; */

use \evil\phpmvc\form\Form;

?>

<div class="flex-container max-vh">
    <div class="form-container">
        <div class="form-logo">
            <img src="/images/Logo.png" alt="Logo" />
        </div>
        <h2>Login</h2>

        <?php $form = Form::begin("post", ""); ?>
        <?php echo $form->field($model, "email") ?>
        <?php echo $form->field($model, "password")->passwordField() ?>
        <button class="btn btn-primary-outline" type="submit">Login</button>
        <?php $form = Form::end("", "post"); ?>

        <div>
            <p>Don't Have an Account?</p>
            <a class="btn btn-primary-outline" href="register">Register</a>
        </div>
    </div>
</div>
