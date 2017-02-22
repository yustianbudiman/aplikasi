<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MrekamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekam Medis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mrekam-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Rekam Medis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['id' => 'rekam-grid', 'timeout' => false,'formSelector' => '#searchForm','enablePushState' => false]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['header'=>'No',
            'class' => 'yii\grid\SerialColumn'],

            'id_rekam',
            'id_pasien',
            'nama',
            'tanggal',
            'keluhan_awal',
            'id_pasien',

            // ['class' => 'yii\grid\ActionColumn'],
            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{ubah} {hapus}',
                    'buttons' => [
                        'ubah' => function ($url, $model,$key) use ($param){
                            return Html::a('<span class="btn btn-primary btn-xs"> <i class="fa fa-pencil"></i>  Ubah </span>', ['update','id' => $model['id_rekam']]);
                        },
                        'hapus'=>function ($url, $model,$key) use ($param){
                            return Html::button('<i class="fa fa-trash"></i>  hapus ', ['class' => 'btn btn-primary btn-xs hapus','rel'=>$model['id_rekam']]);
                        },
                    ]
                ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

<?php $this->registerJs("      
$(document).ready(function(){
$('.hapus').click(function(){
    var nilai=$(this).attr('rel');
    bootbox.confirm('Apakah anda Akan Menghapus Rekamedis '+nilai+' ?', function(result){ 
        if(result==true){
            $.ajax({
                    type:'POST',
                    url:'delete',
                    data:'id='+nilai,
                    success:function(data){
                        alert(data);
                    }
                    });
        }
        
         });
});
}); ", \yii\web\View::POS_END);
?>


