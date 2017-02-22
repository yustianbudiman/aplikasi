<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mtindakan */

$this->title = 'Create Mtindakan';
$this->params['breadcrumbs'][] = ['label' => 'Mtindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtindakan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
