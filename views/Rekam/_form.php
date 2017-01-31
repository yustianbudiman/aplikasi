<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mrekam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mrekam-form">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
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

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Id</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'id')->textInput()->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-4">No Rekam Medis</label>
                        <div class="col-md-8">          
                            <?= $form->field($model, 'id_order')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">keluhan</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'keluhan')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-4">No Rekam Medis</label>
                        <div class="col-md-8">          
                            <?= $form->field($model, 'resep')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Tanggal</label>
                        <div class="col-md-9">
                            <div id="datetimepicker5" class="input-group date">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>          
                            <?= $form->field($model, 'tanggal')->textInput()->label(false) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Id Pasien</label>
                        <div class="col-md-9">
                            <?= $form->field($model, 'id_pasien')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Id Dokter</label>
                        <div class="col-md-9">
                            <?= $form->field($model, 'id_dokter')->textInput()->label(false) ?>
                        </div>
                    </div>
                </div>








    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

            </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.ui-datepicker {
  background: #fff !important;
  z-index: 10000;
}
</style>
<script type="text/javascript">
<?php $this->registerJs("      
$(document).ready(function(){
$('#mrekam-tanggal').datepicker();
       
}); ", \yii\web\View::POS_END);
?>
</script>
