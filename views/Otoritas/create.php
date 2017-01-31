<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MOtoritas */

$this->title = 'Create otoritas';
$this->params['breadcrumbs'][] = ['label' => 'otoritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motoritas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
