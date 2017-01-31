<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MmenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mmenu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'id'=>'searchForm', 
        'options'=>['name'=>'searchForm']
    ]); ?>
<div class="col-lg-4">
    <?= $form->field($model, 'name')->label(false) ?>
</div>    

    <?//= $form->field($model, 'name') ?>

    <?//= $form->field($model, 'role') ?>

    <?//= $form->field($model, 'url') ?>

    <?//= $form->field($model, 'aktif') ?>

    <?php // echo $form->field($model, 'urut') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
