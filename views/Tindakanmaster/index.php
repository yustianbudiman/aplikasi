<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MtindakanmasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mtindakanmasters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtindakanmaster-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mtindakanmaster', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tindakan',
            'nama_tindakan',
            'harga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
