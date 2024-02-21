<?php

/** @var $model = \app\models\User; */

use \evil\phpmvc\form\Form;

?>

<div class="flex-container max-vh">
    <div class="form-container">
        <div class="form-logo">
            <img src="/images/Logo.png" alt="Logo" />
        </div>
        <h2>Register</h2>

        <?php $form = Form::begin("post", ""); ?>
        <?php echo $form->field($model, "full_name") ?>
        <?php echo $form->field($model, "email") ?>
        <?php echo $form->field($model, "address") ?>
        <?php echo $form->field($model, "password")->passwordField() ?>
        <?php echo $form->field($model, "confirm_password")->passwordField() ?>
        <button class="btn btn-primary-outline" type="submit">Register</button>
        <?php $form = Form::end("", "post"); ?>

        <!--
        <form action="" method="post">
            <div class="form-field">
                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name" id="full_name" />
            </div>
            <div class="form-field">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" />
            </div>
            <div class="form-field">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" />
            </div>
            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" />
            </div>
            <div class="form-field">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" />
            </div>
        </form>
-->

        <div>
            <p>Already Have An Account?</p>
            <a class="btn btn-primary-outline" href="login">Login</a>
        </div>
    </div>
</div>
