<?php

namespace app\controllers;

use Yii;
use app\models\Mpasien;
use app\models\MpasienSearch;

use app\models\Mrekam;
use app\models\Mrawatjalan;
use app\models\Mrawatinap;
use app\components\fungsi;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\Command;

/**
 * PasienController implements the CRUD actions for Mpasien model.
 */
class PasienController extends Controller
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
     * Lists all Mpasien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MpasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mpasien model.
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
     * Creates a new Mpasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mpasien();
        $carinomor = new Fungsi();
        $nomor = $carinomor->getNomor();

        // $carinoRanap = new Fungsi();
        $nomorRanap = $carinomor->getRanap();
        print_r($nomorRanap);
        exit();

        if ($model->load(Yii::$app->request->post())){
            $connection = \Yii::$app->db;
            $transaction = $connection->beginTransaction();
          try{

            $model->tanggal=date('Y-m-d', strtotime($_POST['Mpasien']['tanggal']));
            $model->save();

            $modelRekam=new Mrekam();
            // $modelRekam->id=$_POST['no_rekam'];
            $modelRekam->id_rekam=$_POST['no_rekam'];
            $modelRekam->id_pasien=$_POST['Mpasien']['id_order'];
            $modelRekam->tanggal=date('Y-m-d');
            $modelRekam->save();

            if($_POST['jenis_rawat']=='1'){
            $modelRawatjalan=new Mrawatjalan();
            $modelRawatjalan->id_rawat_jalan=$_POST['notransaksi_rajal'];
            $modelRawatjalan->id_rekam=$_POST['no_rekam'];
            $modelRawatjalan->id_dokter=$_POST['dokter_rajal'];
            $modelRawatjalan->tujuan=$_POST['tujuan_rajal'];
            $modelRawatjalan->tanggal=date('Y-m-d');
            $modelRawatjalan->waktu=date('H:m');
            $modelRawatjalan->save();
          }else if($_POST['jenis_rawat']=='2'){
            $modelRawatinap=new Mrawatinap();
            $modelRawatinap->id_rawat_inap=$_POST['notransaksi_ranap'];
            $modelRawatinap->id_rekam=$_POST['no_rekam'];
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
                'nomor' => $nomor,
                'nomorRanap' => $nomorRanap,
            ]);
        }
    }

    /**
     * Updates an existing Mpasien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $Modeltransaksi=$this->findModeltransaksi($id);

        if ($model->load(Yii::$app->request->post())){
            $connection = \Yii::$app->db;
            $transaction = $connection->beginTransaction();
            try{
            $model->save();
            // $medelRekam=new Mrekam();
            // if($_POST['jenis_rawat']=='1'){
            //     $medelRekam->id='1';
            //     $medelRekam->id_order=$_POST['notransaksi_rajal'];
            //     $medelRekam->id_pasien=$_POST['Mpasien']['id_order'];
            //     $medelRekam->id_dokter=$_POST['dokter_rajal'];;
            //     $medelRekam->jenis_rawat=$_POST['jenis_rawat'];
            //     $medelRekam->tanggal=date('Y-m-d');
            //     $medelRekam->save();
            // }else if($_POST['jenis_rawat']=='2'){
            //     $medelRekam->id='1';
            //     $medelRekam->id_order=$_POST['notransaksi_ranap'];
            //     $medelRekam->id_pasien=$_POST['Mpasien']['id_order'];
            //     $medelRekam->id_dokter=$_POST['dokter_ranap'];;
            //     $medelRekam->jenis_rawat=$_POST['jenis_rawat'];
            //     $medelRekam->tanggal=date('Y-m-d');
            //     $medelRekam->save();
            // }
            $transaction->commit();
            }catch (Exception $e) {
                $transaction->rollback();
              }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'Modeltransaksi' => $Modeltransaksi,
            ]);
        }
    }

    /**
     * Deletes an existing Mpasien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mpasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mpasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mpasien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModeltransaksi($id)
    {
        if (($model = Mrekam::findOne(['id_rekam'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
