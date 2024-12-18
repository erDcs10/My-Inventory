<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Register';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

            <?php $form = ActiveForm::begin(); ?>

            <div class="form-group">
                <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-control-sm']) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'email')->input('email', ['class' => 'form-control form-control-sm']) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-sm']) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'confirm_password')->passwordInput(['class' => 'form-control form-control-sm']) ?>
            </div>

            <div class="form-group text-center">
                <!-- Register Button -->
                <?= Html::submitButton('Register', ['class' => 'btn btn-primary btn-sm']) ?>
            </div>

            <div class="form-group text-center">
                <p>Sudah punya akun? 
                    <?= Html::a('Login', ['site/login'], ['class' => 'text-primary']) ?>
                </p>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
