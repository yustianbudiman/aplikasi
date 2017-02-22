<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mtindakanmaster */

$this->title = $model->id_tindakan;
$this->params['breadcrumbs'][] = ['label' => 'Mtindakanmasters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtindakanmaster-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tindakan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tindakan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tindakan',
            'nama_tindakan',
            'harga',
        ],
    ]) ?>

</div>
