<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MOtoritas */

$this->title = 'View detail';
$this->params['breadcrumbs'][] = ['label' => 'otoritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motoritas-view">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-comments fa-1x"></i>This Is conten</div>
                <div class="clearfix" style="padding:10px">

    <h1><?//= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?//= Html::a('Delete', ['delete', 'id' => $model->id], [
           // 'class' => 'btn btn-danger',
           // 'data' => [
          //      'confirm' => 'Are you sure you want to delete this item?',
          //      'method' => 'post',
          //  ],
       // ]) ?>
    </p>
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-2">Role :</label>
                        <div class="col-md-9">  
                            <strong><?= $modelRole['role'];?></strong>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Menu</th>
                                <th>Url</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                             $no=1;
                                foreach ($model as $key) {
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $key['name']; ?></td>
                                <td><?= $key['url']; ?></td>
                                <td><?= $key['aktif']; ?></td>
                            </tr>
                            <?php
                            $no++;
                            }
                             ?>
                        </tbody>
                    </table>
                </div>

            </div>
            </div>
        </div>
    </div>
</div>
