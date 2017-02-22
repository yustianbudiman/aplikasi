<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mtindakanmaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mtindakanmaster-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_tindakan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
