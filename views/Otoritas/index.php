<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MOtoritasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Otoritas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motoritas-index">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-dark">
                <div class="panel-heading"><i class="fa fa-comments fa-1x"></i>This Is conten</div>
                <div class="clearfix" style="padding:10px">

    <h1><?//= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="btn-toolbar">
          <a class="btn btn-success btn-sm pull-right disabled" id="edit"><i class="fa fa-pencil"></i> Edit </a> 
          <a class="btn btn-success btn-sm pull-right disabled" id="hapus"><i class="fa fa-trash"></i> Hapus </a>
          <?= Html::a('Tambah user', ['create'], ['class' => 'btn btn-success btn-sm pull-right']) ?>
        </div>

    <p>
    </p>
    <?php Pjax::begin(['id' => 'user-grid', 'timeout' => false,'formSelector' => '#searchForm','enablePushState' => false]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            'nomor'=>[
                        'headerOptions'=>['style'=>'width:3%', 'class'=>'text-center'],
                        'class'=>'yii\grid\SerialColumn',
                        'header'=>'No',
                        'contentOptions'=>['class'=>'text-center'],
                    ],
            'role'=>[
                        'headerOptions'=>['style'=>'width:30%'],
                        'format'=>'raw',
                        'header'=>'Role',
                        'value'=>function ($data) {
                        return $data['role'];
                        },
                    ],
            'view detail'=>[
                        'headerOptions'=>['style'=>'width:5%'],
                        'format'=>'raw',
                        'header'=>'View Detail',
                        'value'=>function ($data) {
                        return '<a href="view?id='.$data['id'].'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail </a>';
                        },
                    ],


            ['class' => 'yii\grid\CheckboxColumn',
                'headerOptions'=>['class'=>'text-center','style'=>'width: 4%;'],
                    'checkboxOptions' => function ($data) {
                        return ['value' => $data['id'],'class'=>'selection_one'];
                        },
                ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
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
  <script>
<?php $this->registerJs("
    $(document).ready(function(){
       $('#user-grid').on('pjax:beforeSend', function(a, b, c){
            $('#filter-link').text(c.url);
        }).on('pjax:send', function(){
             $('body').addClass('loading');
        }).on('pjax:complete', function(){
             $('body').removeClass('loading');
            // $('input[type=\"checkbox\"]:not(.simple)').iCheck({checkboxClass: 'icheckbox_square-blue'});
            // $('.selection_one').trigger('ifChecked');
            $('#edit, #hapus').addClass('disabled');
        });
 
        $('#edit').click(function(){
            var id  = $('.selection_one:checked').val();
            var url = window.location.protocol + '//' + window.location.host + '/myproject/web/otoritas/update?id='+id;
            $(location).attr('href', url);
        });
        $('#hapus').click(function(){
            bootbox.confirm('This is the default confirm!', function(result){ 
                 var x=$('.selection_one:checked').length;
                 var checkValues = $('.selection_one:checked').map(function()
                                {
                                    return $(this).val();
                                }).get();
                                    $.ajax({
                                        type:'POST',
                                        url:'/myproject/web/otoritas/delete',
                                        data:'id='+checkValues+'&jml='+x,
                                        success:function(data){
                                            alert(data);
                                        }
                                        });  
                 
                console.log('This was logged in the callback: ' + checkValues); 
            });
        });
}); 

window.onload=function(){
     $(document).on('change', '.select-on-check-all', function () {
            var c = this.checked ? '#f00' : '#09f';
            var x=$('.selection_one:checked').length;
            ConditionOfButton(x);
        });
        
        $(document).on('change', '.selection_one', function () {
            var c = this.checked ? '#f00' : '#09f';
            var x=$('.selection_one:checked').length;
            ConditionOfButton(x);
        });
};
function ConditionOfButton(n){
            if(n == 1){
               $('#edit, #hapus').removeClass('disabled');
            } else if(n > 1){
               $('#hapus').removeClass('disabled');
               $('#edit').addClass('disabled');
            } else{
               $('#edit, #hapus').addClass('disabled');
            }
        }

", \yii\web\View::POS_END);
?>
</script>

