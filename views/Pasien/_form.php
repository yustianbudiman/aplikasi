<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Mpasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mpasien-form">
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
                <!-- for header transaction -->
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Rekam Medis</label>
                            <div class="col-md-9">          
                                <?php if($model->isNewRecord){ ?>
                                <input class="form-control" placeholder="REC00000000" type="text" name="no_rekam" value="<?= $nomor?>">
                                <?php }else{ ?>
                                <input class="form-control" placeholder="REC00000000" type="text" name="no_rekam" value="">
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Id Pasien</label>
                            <div class="col-md-9">        
                                <div class="form-group input-group">
                                <!-- <input class="form-control" placeholder="BPJS/JAMSOSTEK/PERUSAHAAN" type="text" value="<?= $model->nama_penjamin ?>"> -->
                                <?= $form->field($model, 'id_order')->textInput(['maxlength' => true])->label(false) ?>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#PasienLama" data-placement="left" title="Cari Ruangan/kamar"> browse </button>
                                </span>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-6 col-xs-12">
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

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pasien</label>
                            <div class="col-md-9">          
                                <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">          
                                <?= $form->field($model, 'alamat')->textArea(['maxlength' => true,'rows'=>'3'])->label(false) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Atribut</label>
                            <div class="col-md-3">      
                                    <?php 
                                        $list_atribut = [0 => 'Bayi',
                                             1 => 'Anak', 
                                             2 => 'Ny',
                                             3 => 'Bapa',
                                             4 => 'Nona',
                                             5 => 'Tuan'];
                                             
                                             echo $form->field($model, 'atribut')->dropDownList($list_atribut)->label(false);
                                    ?>       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:20px;">
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">          
                                <input id="jenis_kelamin1" name="jenis_kelamin" value="1" <?= ($model->jenis_kelamin=='1' ? 'checked' : '') ?> type="radio">
                                Laki Laki
                                <input id="jenis_kelamin2" name="jenis_kelamin" value="2" <?= ($model->jenis_kelamin=='2' ? 'checked' : '') ?> type="radio">
                                Perempuan
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">No Telepon</label>
                            <div class="col-md-6">          
                                <?= $form->field($model, 'no_telepon')->textInput()->label(false) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Indentitas</label>
                            <div class="col-md-4">  
                                    <?php 
                                        $list = [0 => 'Atribut',
                                             1 => 'KTP', 
                                             2 => 'SIM',
                                             3 => 'Kartu Keluarga',
                                             4 =>'Kartu siswa',
                                             5 =>'Pasport'];
                                             
                                             echo $form->field($model, 'identitas')->dropDownList($list)->label(false);
                                    ?>        
                            </div>
                            <div class="col-md-5">          
                                <?= $form->field($model, 'no_identitas')->textInput(['placeholder'=>'Nomor identitas'])->label(false) ?>
                            </div>
                        </div>
                            
                    </div>
                </div>

                <div class="col-md-12 col-sm-6 col-xs-12" style="margin-bottom:0px;">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                               <label class="control-label col-md-3">Jenis Pasien</label>
                            <div class="col-md-9">          
                                <input id="jenis_pasien1" name="jenis_pasien" value="1" <?= ($model->jenis_pasien=='1' ? 'checked' : '') ?> type="radio">
                                Umum
                                <input id="jenis_pasien2" name="jenis_pasien" value="2" <?= ($model->jenis_pasien=='2' ? 'checked' : '') ?> type="radio">
                                Penjamin
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Keluhan Awal</label>
                            <div class="col-md-9">          
                                <?= $form->field($model, 'keluhan_awal')->textInput()->label(false) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Oleh</label>
                            <div class="col-md-9">          
                                <div class="form-group input-group">
                                <input class="form-control" placeholder="BPJS/JAMSOSTEK/PERUSAHAAN" type="text" value="<?= $model->nama_penjamin ?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"> browse </button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Oleh</label>
                            <div class="col-md-9">          
                                <div class="form-group input-group">
                                <?php if($model->isNewRecord) {?>
                                <input class="form-control" type="text" placeholder="Jenis rawat" id="id_jenis" name="jenis_rawat" value="1">
                                <?php }else{ ?>
                                <input class="form-control" type="text" placeholder="Jenis rawat" id="id_jenis" name="jenis_rawat">
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- for detail transaction -->
                <div class="col-lg-12" style="margin-top:20px;">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home" id="rajal" rel="1">Rawat Jalan</a></li>
                    <li><a data-toggle="tab" href="#menu1" id="ranap" rel="2">Rawat Inap</a></li>
                </ul>

                <div class="tab-content">
                    <!-- tab1 rawat jalan -->
                    <div id="home" class="tab-pane fade in active">
                      <h3>Rawat Jalan</h3>
                        
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Transaksi</label>
                                    <div class="col-md-5">          
                                       <input class="form-control" placeholder="RJL20170204" type="text" name="notransaksi_rajal">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Poli/Tujuan</label>
                                    <div class="col-md-4">          
                                       <select id="trans-tujuan_rajal" name="tujuan_rajal" class="form-control">
                                            <option value="0">UGD</option>
                                            <option value="1">POLI ANAK</option>
                                       </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12" style="margin-top:10px;">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Dokter</label>
                                    <div class="col-md-8">          
                                       <select id="trans-dokter_rajal" name="dokter_rajal" class="form-control">
                                            <option value="0">Andy</option>
                                            <option value="1">Ari</option>
                                       </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- tab2 Rawat Inap -->
                    <div id="menu1" class="tab-pane fade">
                      <h3>Rawat Inap</h3>
                        <div class="col-md-12 col-sm-6 col-xs-12" style="margin-top:10px;">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Transaksi</label>
                                    <div class="col-md-5">          
                                        <!-- <input class="form-control" placeholder="RNP20170204" type="text" name="notransaksi_ranap"> -->
                                         <?php if($model->isNewRecord){ ?>
                                        <input class="form-control" placeholder="REC00000000" type="text" name="notransaksi_ranap" value="<?= $nomorRanap?>">
                                        <?php }else{ ?>
                                        <input class="form-control" placeholder="REC00000000" type="text" name="notransaksi_ranap" value="">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Ruangan/Kamar</label>
                                    <div class="col-md-9">          
                                        <div class="form-group input-group">
                                        <input class="form-control" placeholder="Ruangan(kamar)" type="text" name="kamar_bed">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#KamarBed" data-placement="left" title="Cari Ruangan/kamar"> browse </button>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Dokter</label>
                                    <div class="col-md-8">          
                                       <select id="trans-dokter_ranap" name="dokter_ranap" class="form-control">
                                            <option value="0">Andy</option>
                                            <option value="1">Ari</option>
                                       </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Kelas</label>
                                    <div class="col-md-8">          
                                       <input class="form-control" placeholder="Kelas" type="text" name="kelas" readonly="true">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                  </div>

                </div>

                <!-- for action button -->
                <div class="col-lg-12">
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>



    

    

            </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<div class="modal fade" id="KamarBed" tabindex="-1" role="dialog" aria-labelledby="KamarBedLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="KamarBedLabel">Daftar Ruangan Dan Bed</h4>
            </div>
            <div class="modal-body">
                <!-- <div class="col-lg-12"> -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ruangan/Kamar
                        </div>
                        <div class="panel-body">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                                <span class="top-label label label-danger">1</span>
                                <i class="fa fa-building fa-3x " data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">2</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">3</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">4</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">5</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">6</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">7</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">8</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">9</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">10</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">11</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="top-label label label-danger">12</span>
                                <i class="fa fa-building fa-3x" data-placement="left" title="Terisi"></i>
                            </a>&nbsp&nbsp&nbsp&nbsp
                        </div>
                    </div>
            

               
            </div>

            <!-- <div class="col-lg-12"> -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Tambah</button>
            </div>
            <!-- </div> -->

        </div>
    </div>
</div>

<div class="modal fade" id="PasienLama" tabindex="-1" role="dialog" aria-labelledby="PasienLamaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="PasienLamaLabel">Daftar Pasien</h4>
            </div>
            <div class="modal-body">
               
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Tambah</button>
            </div>

        </div>
    </div>
</div>


<style type="text/css">
.ui-datepicker {
  background: #fff !important;
  z-index: 10000;
}
.top-label{
    position: absolute;
    margin-top:20px;
}
.fa-3x{
    margin-top:20px;
}
</style>

<?php $this->registerJs("      
$(document).ready(function(){
$('#mpasien-tanggal').datepicker();

$('#rajal').click(function(){
    var nilai=$(this).attr('rel');
    $('#id_jenis').val(nilai);
});
$('#ranap').click(function(){
    var nilai=$(this).attr('rel');
    $('#id_jenis').val(nilai);
});  
}); ", \yii\web\View::POS_END);
?>


