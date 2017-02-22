<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use yii\db\Command;


/* @var $this yii\web\View */
/* @var $model app\models\Mpasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mprekam-form">
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
                                <?= $form->field($model, 'id_rekam')->textInput(['maxlength' => true,'value'=>$nomor,'readonly'=>true ])->label(false) ?>
                                <?php }else{ ?>
                                <?= $form->field($model, 'id_rekam')->textInput(['maxlength' => true,'readonly'=>true])->label(false) ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Id Pasien</label>
                            <div class="col-md-9">        
                                <div class="form-group input-group">
                                <?= $form->field($model, 'id_order')->textInput(['maxlength' => true,'readonly'=>true])->label(false) ?>
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
                                <?= $form->field($modelPasien, 'nama')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">          
                                <?= $form->field($modelPasien, 'alamat')->textArea(['maxlength' => true,'rows'=>'3'])->label(false) ?>
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
                                             
                                             echo $form->field($modelPasien, 'atribut')->dropDownList($list_atribut)->label(false);
                                    ?>       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:20px;">
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">          
                                <input id="jenis_kelamin1" name="jenis_kelamin" value="1" <?= ($modelPasien->jenis_kelamin=='1' ? 'checked' : '') ?> type="radio">
                                Laki Laki
                                <input id="jenis_kelamin2" name="jenis_kelamin" value="2" <?= ($modelPasien->jenis_kelamin=='2' ? 'checked' : '') ?> type="radio">
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
                                <?= $form->field($modelPasien, 'no_telepon')->textInput()->label(false) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Identitas</label>
                            <div class="col-md-4">  
                                    <?php 
                                        $list = [0 => 'Atribut',
                                             1 => 'KTP', 
                                             2 => 'SIM',
                                             3 => 'Kartu Keluarga',
                                             4 =>'Kartu siswa',
                                             5 =>'Pasport'];
                                             
                                             echo $form->field($modelPasien, 'identitas')->dropDownList($list)->label(false);
                                    ?>        
                            </div>
                            <div class="col-md-5">          
                                <?= $form->field($modelPasien, 'no_identitas')->textInput(['placeholder'=>'Nomor identitas'])->label(false) ?>
                            </div>
                        </div>
                            
                    </div>
                </div>

                <div class="col-md-12 col-sm-6 col-xs-12" style="margin-bottom:0px;">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                               <label class="control-label col-md-3">Jenis Pasien</label>
                            <div class="col-md-9">          
                                <input id="jenis_pasien1" name="jenis_pasien" value="1" <?= ($modelPasien->jenis_pasien=='1' ? 'checked' : '') ?> type="radio">
                                Umum
                                <input id="jenis_pasien2" name="jenis_pasien" value="2" <?= ($modelPasien->jenis_pasien=='2' ? 'checked' : '') ?> type="radio">
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
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">          
                                <div class="form-group input-group">
                                <?php if($model->isNewRecord) {?>
                                <input class="form-control" type="hidden" placeholder="Jenis rawat" id="id_jenis" name="jenis_rawat" value="1">
                                <?php }else{ ?>
                                <input class="form-control" type="hidden" placeholder="Jenis rawat" id="id_jenis" name="jenis_rawat">
                                <?php } ?>
                                <div id="datetimepicker5" class="input-group date">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>           
                                <?= $form->field($modelPasien, 'tanggal')->textInput()->label(false) ?>
                                </div>
                                <?//= $form->field($modelPasien, 'tanggal')->textInput()->label(false) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $connection = \Yii::$app->db;
                $dokter=new Query();
                $sql="select*from master.dokter";
                $dokter= $connection->createCommand($sql)->queryAll();
                ?>

                <?php
                // $connection = \Yii::$app->db;
                $ruanganBed=new Query();
                $sqlBed="select a.*, b.kamar_bed as status from master.ruangan_bed a
left join rumah_sakit.rawat_inap b on a.id= b.kamar_bed order by a.id";
                $ruanganBed= $connection->createCommand($sqlBed)->queryAll();
                ?>
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
                                       <?php if($model->isNewRecord){ ?>
                                       <input class="form-control" placeholder="RJL20170204" type="text" name="notransaksi_rajal" value="<?= $nomorRajal ?>" readonly="true">
                                        <?php }else{ ?>
                                       <input class="form-control" placeholder="RJL20170204" type="text" name="notransaksi_rajal" value="<?= ($modelRajal['id_rawat_jalan']!=''?$modelRajal['id_rawat_jalan']:$nomorRajal) ?>" readonly="true">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Poli/Tujuan</label>
                                    <div class="col-md-4">          
                                       <select id="trans-tujuan_rajal" name="tujuan_rajal" class="form-control">
                                            <option value="0">--Pilih Tujuan--</option>
                                            <option value="1">UGD</option>
                                            <option value="2">POLI ANAK</option>
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
                                             <option value="0">--Pilih Dokter--</option>
                                        <?php
                                        foreach ($dokter as $result_dokter) {
                                            echo "<option value=".$result_dokter['id_dokter']." ".($modelRajal['id_dokter']==$result_dokter['id_dokter']?'selected':'').">".$result_dokter['nama_dokter']."</option>";
                                        }
                                       ?>
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
                                        <?php if($model->isNewRecord){ ?>
                                        <input class="form-control" placeholder="RNP20170204" type="text" name="notransaksi_ranap" value="<?= $nomor ?>" readonly="true">
                                        <?php }else{ ?>
                                        <input class="form-control" placeholder="RNP20170204" type="text" name="notransaksi_ranap" value="<?= ($modelRanap['id_rawat_inap']!=''?$modelRanap['id_rawat_inap']: $nomorRanap )?>" readonly="true">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Ruangan/Kamar</label>
                                    <div class="col-md-9">          
                                        <div class="form-group input-group">
                                        <input class="form-control" placeholder="Ruangan(kamar)" type="text" name="nama_kamar_bed" value="<?= $modelRanap['nama_ruangan']?>" id="nama_kamar_bed">
                                        <input class="form-control" placeholder="Ruangan(kamar)" type="hidden" name="kamar_bed" value="<?= $modelRanap['kamar_bed']?>" id="kamar_bed">
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
                                            <option value="0">--Pilih Dokter--</option>
                                       <?php
                                        foreach ($dokter as $result_dokter) {
                                            echo "<option value=".$result_dokter['id_dokter']." ".($modelRanap['id_dokter']==$result_dokter['id_dokter']?'selected':'').">".$result_dokter['nama_dokter']."</option>";
                                        }
                                       ?>
                                       </select>       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Kelas</label>
                                    <div class="col-md-8">          
                                       <input class="form-control" placeholder="Kelas" type="text" name="kelas" readonly="true" id="kelas" value="<?= $modelRanap['id_kelas']?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                  </div>

                </div>

                <!-- for action button -->
                <div class="col-lg-12" style="margin-top:20px;">
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Simpat' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?= Html::submitButton($model->isNewRecord ? 'Batal' : 'Batal', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
                            <div class='clearfix' style='padding:10px'>
                            <?php foreach ($ruanganBed as $rowRruanganbed) {

                          echo "
                                    <div class='col-md-3 col-sm-6 col-xs-12' style='cursor:pointer;'>
                                        <div class='alert alert-".($rowRruanganbed['status']==''? 'success':'danger')." text-center ruangan' id='".$rowRruanganbed['id']."' rel='".($rowRruanganbed['status']==''? $rowRruanganbed['id']:'')."' enama_kamarbed='".($rowRruanganbed['status']==''? $rowRruanganbed['nama_ruangan']:'')."' ekelas='".($rowRruanganbed['status']==''? $rowRruanganbed['id_kelas']:'')."'>
                                            <span class='top-label label label-".($rowRruanganbed['status']==''? 'success':'danger')."' title='".$rowRruanganbed['nama_ruangan']."'>".$rowRruanganbed['id_ruangan_bed']."</span><br>
                                            <i class='fa fa-building fa-1x' title='".$rowRruanganbed['nama_ruangan'].($rowRruanganbed['status']==''? '(Kosong)':'(Terisi)')."'></i>

                                        </div>
                                    </div>";
                                 
                            }?>
                            </div>
                             
                           
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
    /*position: absolute;
    margin-top:20px;
    margin-left:0px;*/
}
.fa-3x{
    /*margin-top:20px;*/
    /*margin-left:0px;*/
}
</style>

<?php $this->registerJs("      
$(document).ready(function(){
$('#mrekam-tanggal').datepicker();
$('#mpasien-tanggal').datepicker();

$('#rajal').click(function(){
    var nilai=$(this).attr('rel');
    $('#id_jenis').val(nilai);
});
$('#ranap').click(function(){
    var nilai=$(this).attr('rel');
    $('#id_jenis').val(nilai);
});  

$('.ruangan').click(function(){
    var nilai=$(this).attr('rel');
    var enama_kamar=$(this).attr('enama_kamarbed');
    var ekelas=$(this).attr('ekelas');
    // alert(nilai);
    $('#nama_kamar_bed').val(enama_kamar);
    $('#kelas').val(ekelas);
    $('#kamar_bed').val(nilai);
    $('#KamarBed').modal('hide');
});  
}); ", \yii\web\View::POS_END);
?>


