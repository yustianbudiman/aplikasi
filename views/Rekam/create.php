<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mrekam */

$this->title = 'Buat Rekam Medis';
$this->params['breadcrumbs'][] = ['label' => 'Rekam Medis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mrekam-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelPasien' => $modelPasien,
        'nomor' => $nomor,
        'nomorRanap' => $nomorRanap,
        'nomorRajal' => $nomorRajal,
    ]) ?>

</div>
