<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Mrole;

/* @var $this yii\web\View */
/* @var $model app\models\MUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muser-form">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-dark">
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
                        <label class="control-label col-md-3">Nik</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'nik')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Status</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'status')->textInput()->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">User Name</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Role</label>
                        <div class="col-md-9">          
                            <?php
                                echo $form->field($model, 'role')->dropDownList(
                                         ArrayHelper::map(Mrole::find()->all(), 'id', 'role'), ['prompt' => '-- Role --'],['width'=>'40%']
                                        
                               )->label(false);   
                             ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Nama Pegawai</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label(false) ?>
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
