<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Barang $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kategori_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga_barang')->textInput() ?>

    <?= $form->field($model, 'gambar_barang')->textInput() ?>

    <?= $form->field($model, 'stok_barang')->textInput() ?>

    <?= $form->field($model, 'produsen')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
