<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MrekamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mrekams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mrekam-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mrekam', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_order',
            'keluhan',
            'resep',
            'tanggal',
            'id_pasien',
            'id_dokter',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
