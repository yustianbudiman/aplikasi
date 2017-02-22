<?php

namespace app\controllers;

use Yii;
use app\models\Mrekam;
use app\models\MrekamSearch;

use app\models\Mpasien;
use app\models\MpasienSearch;
use app\models\Mrawatjalan;
use app\models\Mrawatinap;
use app\components\fungsi;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\Command;

/**
 * RekamController implements the CRUD actions for Mrekam model.
 */
class RekamController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Mrekam models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MrekamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mrekam model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mrekam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mrekam();
        $modelPasien = new Mpasien();

        $carinomor = new Fungsi();

        $nomor = $carinomor->getNomor();
        $nomorRanap = $carinomor->getRanap();
        $nomorRajal = $carinomor->getRajal();

        if ($model->load(Yii::$app->request->post())){
            $connection = \Yii::$app->db;
            $transaction = $connection->beginTransaction();
          try{

        $model->tanggal=date('Y-m-d', strtotime($_POST['Mrekam']['tanggal']));
        $model->save();

        /*save Pasien Jika Belum Daftar*/
        $modelPasien->no_telepon=$_POST['Mpasien']['no_telepon'];
        $modelPasien->identitas=$_POST['Mpasien']['identitas'];
        $modelPasien->no_identitas=$_POST['Mpasien']['no_identitas'];
        $modelPasien->atribut=$_POST['Mpasien']['atribut'];
        $modelPasien->jenis_pasien=$_POST['Mpasien']['jenis_pasien'];
        $modelPasien->tanggal=date('Y-m-d', strtotime($_POST['Mpasien']['tanggal']));
        $modelPasien->id_order=$_POST['Mpasien']['id_order'];
        $modelPasien->nama=$_POST['Mpasien']['nama'];
        $modelPasien->alamat=$_POST['Mpasien']['alamat'];
        $modelPasien->jenis_kelamin=$_POST['Mpasien']['jenis_kelamin'];
        $modelPasien->save();

        if($_POST['jenis_rawat']=='1'){
            $modelRawatjalan=new Mrawatjalan();
            $modelRawatjalan->id_rawat_jalan=$_POST['notransaksi_rajal'];
            $modelRawatjalan->id_rekam=$model->id_rekam;
            $modelRawatjalan->id_dokter=$_POST['dokter_rajal'];
            $modelRawatjalan->tujuan=$_POST['tujuan_rajal'];
            $modelRawatjalan->tanggal=date('Y-m-d');
            $modelRawatjalan->waktu=date('H:m');
            $modelRawatjalan->save();
          }else if($_POST['jenis_rawat']=='2'){
            $modelRawatinap=new Mrawatinap();
            $modelRawatinap->id_rawat_inap=$_POST['notransaksi_ranap'];
            $modelRawatinap->id_rekam=$model->id_rekam;
            $modelRawatinap->id_dokter=$_POST['dokter_ranap'];
            $modelRawatinap->kamar_bed=$_POST['kamar_bed'];
            $modelRawatinap->tanggal=date('Y-m-d');
            $modelRawatinap->waktu=date('H:m');
            $modelRawatinap->save();
          }


        $transaction->commit();
          }catch (Exception $e) {
                $transaction->rollback();
          }

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelPasien' => $modelPasien,
                'nomor' => $nomor,
                'nomorRanap' => $nomorRanap,
                'nomorRajal' => $nomorRajal,
            ]);
        }
    }

    /**
     * Updates an existing Mrekam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelPasien = $this->findModelpasien($model->id_order);

        $carinomor = new Fungsi();

        // $nomor = $carinomor->getNomor();
        $nomorRanap = $carinomor->getRanap();
        $nomorRajal = $carinomor->getRajal();

        $connection = \Yii::$app->db;
        $modelRajal=new Query();
        $sql="select*from rumah_sakit.rawat_jalan where id_rekam='".$model->id_rekam."'";
        $modelRajal= $connection->createCommand($sql)->queryOne();
        $modelRanap=new Query();
        $sql1="select a.*, b. nama_ruangan,b.id_kelas from rumah_sakit.rawat_inap a 
              inner join master.ruangan_bed b on a.kamar_bed=b.id where id_rekam='".$model->id_rekam."'";
        $modelRanap= $connection->createCommand($sql1)->queryOne();
        // $modelRanap = $this->findModelranap($model->id_rekam);
       

        if ($model->load(Yii::$app->request->post())){
            $transaction = $connection->beginTransaction();
          try{
            $model->save();

            $modelPasien->no_telepon=$_POST['Mpasien']['no_telepon'];
            $modelPasien->identitas=$_POST['Mpasien']['identitas'];
            $modelPasien->no_identitas=$_POST['Mpasien']['no_identitas'];
            $modelPasien->atribut=$_POST['Mpasien']['atribut'];
            $modelPasien->jenis_pasien=$_POST['Mpasien']['jenis_pasien'];
            $modelPasien->tanggal=date('Y-m-d', strtotime($_POST['Mpasien']['tanggal']));
            $modelPasien->id_order=$_POST['Mrekam']['id_order'];
            $modelPasien->nama=$_POST['Mpasien']['nama'];
            $modelPasien->alamat=$_POST['Mpasien']['alamat'];
            $modelPasien->jenis_kelamin=$_POST['Mpasien']['jenis_kelamin'];
            $modelPasien->update();
          
            /*jika psien masuk ke rawat jalan*/
            if(count($modelRajal['id_rekam'])>=1){
            $modelRajalUpdate = Mrawatjalan::find()->where("id_rawat_jalan='".$_POST['notransaksi_rajal']."'")->one();
            $modelRajalUpdate->id_rekam=$model->id_rekam;
            $modelRajalUpdate->id_dokter=$_POST['dokter_rajal'];
            $modelRajalUpdate->tujuan=$_POST['tujuan_rajal'];
            $modelRajalUpdate->tanggal=date('Y-m-d');
            $modelRajalUpdate->waktu=date('H:m');
            $modelRajalUpdate->update(false);
            }else if(count($modelRajal['id_rekam'])<=0 && $_POST['dokter_rajal']<>'0'){ /*jika insert pada saat update rekam*/
            $modelRawatjalan=new Mrawatjalan();
            $modelRawatjalan->id_rawat_jalan=$_POST['notransaksi_rajal'];
            $modelRawatjalan->id_rekam=$model->id_rekam;
            $modelRawatjalan->id_dokter=$_POST['dokter_rajal'];
            $modelRawatjalan->tujuan=$_POST['tujuan_rajal'];
            $modelRawatjalan->tanggal=date('Y-m-d');
            $modelRawatjalan->waktu=date('H:m');
            $modelRawatjalan->save();
            }
            /*jika pasdien masuk ke rawat inap*/
            if(count($modelRanap['id_rekam'])>=1){
            $modelRanapUpdate = Mrawatinap::find()->where("id_rawat_inap='".$_POST['notransaksi_ranap']."'")->one();
            $modelRanapUpdate->id_rekam=$modelRanap['id_rekam'];
            $modelRanapUpdate->id_dokter=$_POST['dokter_ranap'];
            $modelRanapUpdate->kamar_bed=$_POST['kamar_bed'];
            $modelRanapUpdate->tanggal=date('Y-m-d');
            $modelRanapUpdate->waktu=date('H:m');
            $modelRanapUpdate->update(false);
            }else if(count($modelRanap['id_rekam'])<=0 && $_POST['dokter_ranap']<>'0'){ /*jika insert pada saat update rekam*/
            $modelRawatinap=new Mrawatinap();
            $modelRawatinap->id_rawat_inap=$_POST['notransaksi_ranap'];
            $modelRawatinap->id_rekam=$model->id_rekam;
            $modelRawatinap->id_dokter=$_POST['dokter_ranap'];
            $modelRawatinap->kamar_bed=$_POST['kamar_bed'];
            $modelRawatinap->tanggal=date('Y-m-d');
            $modelRawatinap->waktu=date('H:m');
            $modelRawatinap->save();
            }

            $transaction->commit();
          }catch (Exception $e) {
                $transaction->rollback();
          }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelPasien' => $modelPasien,
                'modelRajal' => $modelRajal,
                'modelRanap' => $modelRanap,
                'nomorRanap' => $nomorRanap,
                'nomorRajal' => $nomorRajal,
            ]);
        }
    }

    /**
     * Deletes an existing Mrekam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $id=$_POST['id'];
            Mrekam::deleteAll("id_rekam = '".$id."'");
            Mrawatinap::deleteAll("id_rekam = '".$id."'");
            Mrawatjalan::deleteAll("id_rekam = '".$id."'");
        // echo $id;
        // $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mrekam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mrekam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mrekam::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelpasien($id)
    {
        if (($model = Mpasien::findOne(['id_order'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
            echo $id;
        }
    }

    protected function findModelrajal($id)
    {
        if (($model = Mrawatjalan::findOne(['id_rekam'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelranap($id)
    {
        if (($model = Mrawatinap::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
