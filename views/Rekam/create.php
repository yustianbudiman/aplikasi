<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mrekam */

$this->title = 'Create Rekam';
$this->params['breadcrumbs'][] = ['label' => 'Rekams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mrekam-create">

    <h1><?//= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
