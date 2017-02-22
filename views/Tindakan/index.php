<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MtindakanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mtindakans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtindakan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mtindakan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_rekam',
            'tanggal',
            'id_tindakan',
            'harga_satuan',
            // 'jumlah',
            // 'total_harga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
