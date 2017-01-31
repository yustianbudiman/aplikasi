<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Mrole;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\MOtoritas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="motoritas-form">
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-comments fa-1x"></i>This Is conten</div>
                <div class="clearfix" style="padding:10px">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-7 col-sm-6 col-xs-12">
	    <div class="form-group">
	        <label class="control-label col-md-3">Nama Role</label>
	        <div class="col-md-9">          
				<?php
                    echo $form->field($model, 'id')->dropDownList(
                             ArrayHelper::map(Mrole::find()->all(), 'id', 'role'), ['prompt' => '-- Role --'],['width'=>'40%']
                            
                   )->label(false);   
                ?>
	        </div>
	    </div>
	</div>

    <div class="col-md-12 col-sm-6 col-xs-12">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            'nomor'=>[
                        'headerOptions'=>['style'=>'width:8%', 'class'=>'text-center'],
                        'class'=>'yii\grid\SerialColumn',
                        'header'=>'No',
                        'contentOptions'=>['class'=>'text-center'],
                    ],
            'menu'=>[
                        'headerOptions'=>['style'=>'width:30%'],
                        'format'=>'raw',
                        'header'=>'Menu',
                        'value'=>function ($data) {
                        return $data['name'];
                        },
                    ],
            'url'=>[
                        'headerOptions'=>['style'=>'width:30%'],
                        'format'=>'raw',
                        'header'=>'Url',
                        'value'=>function ($data) {
                        return $data['url'];
                        },
                    ],
            'status'=>[
                        'headerOptions'=>['style'=>'width:30%'],
                        'format'=>'raw',
                        'header'=>'Status',
                        'value'=>function ($data) {
                        return $data['aktif'];
                        },
                    ],

            ['class' => 'yii\grid\CheckboxColumn',
             'headerOptions'=>['class'=>'text-center','style'=>'width: 8%;'],
                    'checkboxOptions' => function ($data) {
                        if($data['id_otoritas']<>''){
                        $bolean=1;
                        }else{
                        $bolean=0;
                        }
                        return ['value' => $data['id'],'class'=>'selection_one','checked' => $bolean];
                        },
                ],
        ],
    ]); ?>
    </div>
	<div class="col-md-12 col-sm-6 col-xs-12">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <div class="form-group">
    </div>

    <?php ActiveForm::end(); ?>

			</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    text-align: center;
    vertical-align: top;
}
 </style>
