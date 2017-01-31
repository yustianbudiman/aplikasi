<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MUser */

$this->title = 'Update user: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'users', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="muser-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
