<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Mmenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mmenu-form">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-comments fa-1x"></i>This Is conten</div>
                <div class="clearfix" style="padding:10px">

    <?php $form = ActiveForm::begin(); ?>
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
                        <label class="control-label col-md-3">Name</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Role</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'role')->textInput()->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Url</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'url')->textInput(['maxlength' => true])->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Status</label>
                        <div class="col-md-9">          
                            <?//= $form->field($model, 'aktif')->textInput()->label(false) ?>
                            <?php
                            $array=['Non Aktif','Aktif'];
                                echo $form->field($model, 'aktif')->dropDownList($array)->label(false);
                               //           ArrayHelper::map($array,'1', 'role'), ['prompt' => '-- Role --'],['width'=>'40%']
                                        
                               // )->label(false);   
                             ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3">Urut</label>
                        <div class="col-md-9">          
                            <?= $form->field($model, 'urut')->textInput()->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-3"></label>
                        <div class="col-md-9">          
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>

    <div class="form-group">
    </div>

    <?php ActiveForm::end(); ?>

            </div>
            </div>
        </div>
    </div>
</div>
