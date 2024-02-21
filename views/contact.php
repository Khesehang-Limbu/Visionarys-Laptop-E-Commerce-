<?php
use evil\phpmvc\form\Form;
use evil\phpmvc\form\TextAreaField;
/**
 * @var $model \app\models\ContactForm
 * */

?>

<div class="flex-container">
    <div class="form-container">
        <h1>Contact Us</h1>
        <?php $form = Form::begin("post", "") ?>
            <?php echo $form->field($model, "subject") ?>
            <?php echo $form->field($model, "email")->emailField() ?>
            <?php echo new TextAreaField($model, "message"); ?>
            <button class="btn btn-primary-outline">Submit</button>
        <?php Form::end(); ?>
    </div>
</div>

