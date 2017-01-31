<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MRole */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mrole-form">
	<div class="row">
    	<div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-comments fa-1x"></i>This Is conten</div>
                <div class="clearfix" style="padding:10px">

    <?php $form = ActiveForm::begin([
    				'enableAjaxValidation' => false,
                    'fieldConfig' => [
                    ],
                    'options'=>['enctype'=>'multipart/form-data'] ,
			    ]); ?>

			     <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Id</label>
                        <div class="col-md-9">          
    						<?= $form->field($model, 'id')->textInput()->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Nama Role</label>
                        <div class="col-md-9">          
    						<?= $form->field($model, 'role')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3"></label>
                        <div class="col-md-9">          
        					<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        					<?= Html::submitButton($model->isNewRecord ? 'Batal' : 'Batal', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>

    <?php ActiveForm::end(); ?>

			</div>
			</div>	
		</div>
	</div>
</div>
