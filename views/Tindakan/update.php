<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mtindakan */

$this->title = 'Update Mtindakan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mtindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mtindakan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
