<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mrekam */

// $this->title = 'Update Mrekam: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mrekams', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mrekam-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelPasien' => $modelPasien,
        'modelRajal' => $modelRajal,
        'modelRanap' => $modelRanap,
        'nomorRanap' => $nomorRanap,
        'nomorRajal' => $nomorRajal,
    ]) ?>

</div>
