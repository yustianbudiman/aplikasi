<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MUser */

$this->title = 'Create user';
$this->params['breadcrumbs'][] = ['label' => 'users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muser-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
