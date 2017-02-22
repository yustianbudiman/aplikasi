<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MtindakanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mtindakan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_rekam') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'id_tindakan') ?>

    <?= $form->field($model, 'harga_satuan') ?>

    <?php // echo $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'total_harga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
