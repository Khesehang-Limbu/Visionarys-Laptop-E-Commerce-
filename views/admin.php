<?php

use evil\phpmvc\form\Form;
/* @var $model evil\phpmvc\Model */
/* @var $this evil\phpmvc\View */
$this->title = "Admin Login";
?>


<div class="flex-container max-vh">
    <div class="form-container">
        <h2>Admin Login</h2>
        <?php $form = Form::begin("post", ""); ?>
            <?php echo $form->field($model, "username") ?>
            <?php echo $form->field($model, "password")->passwordField() ?>
            <button class="btn btn-primary-outline">Login</button>
        <?php Form::end(); ?>
    </div>
</div>

