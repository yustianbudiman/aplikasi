<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MRoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mrole-search">

    <?php $form = ActiveForm::begin([
         'action' => ['index'],
        'method' => 'get',
        'id'=>'searchForm', 
        'options'=>['name'=>'searchForm']
    ]); ?>
 <div class="col-lg-4">
    <?= $form->field($model, 'role')->label(false); ?>
 </div>

    

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
