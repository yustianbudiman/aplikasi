<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MrekamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mrekam-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_order') ?>

    <?= $form->field($model, 'keluhan') ?>

    <?= $form->field($model, 'resep') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'id_pasien') ?>

    <?php // echo $form->field($model, 'id_dokter') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
