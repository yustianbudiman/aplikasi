<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mpasien */

$this->title = 'Create Mpasien';
$this->params['breadcrumbs'][] = ['label' => 'Mpasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpasien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
