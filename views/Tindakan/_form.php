<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Mtindakan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mtindakan-form">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-dark">
                <div class="panel-heading"><i class="fa fa-comments fa-1x"></i>&nbsp;Rekam Medis</div>
                <div class="clearfix" style="padding:10px">

    <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
                    'fieldConfig' => [
                    'options' => [
                        'tag' => false,
                        ],
                    ],
                    'options'=>['enctype'=>'multipart/form-data'] ,
    ]); ?>

    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-md-3">Rekam Medis</label>
                <div class="col-md-9">          
                    <?= $form->field($model, 'id_rekam')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-md-3">Tanggal</label>
                <div class="col-md-5">
                    <div id="datetimepicker5" class="input-group date">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>           
                    <?= $form->field($model, 'tanggal')->textInput()->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-md-3">Rekam Medis</label>
                <div class="col-md-9">          
                    <div class="form-group input-group">
                    <input class="form-control" placeholder="BPJS/JAMSOSTEK/PERUSAHAAN" type="text" value="">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"> browse </button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-md-3">Tanggal</label>
                <div class="col-md-5">
                    <div id="datetimepicker5" class="input-group date">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>           
                    <?= $form->field($model, 'tanggal')->textInput()->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="col-md-12 col-sm-6 col-xs-12">
<!-- <div class="container"> -->
    <div class="btn-toolbar pull-right" role="toolbar">
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tindakan" data-placement="left" title="Cari Ruangan/kamar"><i class="fa fa-plus"> Add </i></button>
    </div>
<!-- </div> -->
</div>
<div class="col-md-12 col-sm-6 col-xs-12" style="margin-top:10px;">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tindakan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>total</th>
                </tr>
            </thead>
            <tbody class="trx_tindakan">
            </tbody>
        </table>
    </div>



    <?= $form->field($model, 'id_tindakan')->textInput() ?>

    <?= $form->field($model, 'harga_satuan')->textInput() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'total_harga')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- modal -->

<div class="modal fade" id="tindakan" tabindex="-1" role="dialog" aria-labelledby="PasienLamaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="PasienLamaLabel">Daftar Tindakan</h4>
            </div>
            <div class="modal-body">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                            Tindakan
                        </div>
                        <div class="panel-body">
                            <div class='clearfix' style='padding:10px'>
                                <?php $form = ActiveForm::begin([
                                    'action' => ['create'],
                                    'method' => 'get',
                                    'id'=>'searchForm', 
                                    'options'=>['name'=>'searchForm']
                                ]); ?>
                                <div class="col-sm-6">
                                    <div class="form-group input-group">
                                    <input class="form-control" placeholder="Cari Tindakan" type="text" value="" name="cari_tindakan">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </span>
                                    </div>
                               </div>
                               <?php ActiveForm::end(); ?>
                               <div class="col-sm-12">
                                <?php Pjax::begin(['id' => 'tindakanmaster-grid', 'timeout' => false,'formSelector' => '#searchForm','enablePushState' => false]) ?>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    // 'filterModel' => $searchModel,
                                    'columns' => [
                                        ['header'=>'No',
                                        'class' => 'yii\grid\SerialColumn'],

                                        'id_tindakan',
                                        'nama_tindakan',
                                        'harga',
                                        [
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '{add}',
                                                'buttons' => [
                                                    'add'=>function ($url, $model,$key) use ($param){
                                                        return Html::button('<i class="fa fa-save"></i>  Add ', ['class' => 'btn btn-primary btn-xs add','rel'=>$model['id_tindakan'],'enama'=>$model['nama_tindakan'],'eharga'=>$model['harga']]);
                                                    },
                                                ]
                                            ],
                                    ],
                                ]); ?>
                                <?php Pjax::end(); ?>
                               </div>
                            </div>
                        </div>
                </div>
            </div>
            

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Tambah</button>
            </div>

            </div>
        </div>
    </div>
</div>


<?php $this->registerJs("      
$(document).ready(function(){
$('#mtindakan-tanggal').datepicker();
$('.add').click(function(){
    var nilai=$(this).attr('rel');
    var enama=$(this).attr('enama');
    var eharga=$(this).attr('eharga');

$('.trx_tindakan').append('<tr><td>'+nilai+'</td><td>'+enama+'</td><td>'+eharga+'</td><td></td><td></td></tr>');

    
});
}); ", \yii\web\View::POS_END);
?>