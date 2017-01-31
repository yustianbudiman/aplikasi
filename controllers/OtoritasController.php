<?php

namespace app\controllers;

use Yii;
use app\models\Motoritas;
use app\models\MotoritasSearch;
use app\models\Mmenu;
use app\models\MmenuSearch;
use app\models\Mrole;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OtoritasController implements the CRUD actions for Motoritas model.
 */
class OtoritasController extends Controller
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
     * Lists all Motoritas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MotoritasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=5;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Motoritas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
  
        $modelRole=$this->findModelRole($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelRole' => $modelRole,
        ]);
    }

    /**
     * Creates a new Motoritas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Motoritas();
        $searchModel = new MmenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())){
            $menu=$_POST['selection'];
            for ($i=0; $i <count($menu); $i++) { 
                $modelSave = new Motoritas();
                $modelSave->role=$_POST['Motoritas']['id'];
                $modelSave->menu=$_POST['selection'][$i];
                $modelSave->save();
            }
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Updates an existing Motoritas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModelRole($id);
        $searchModel = new MmenuSearch();
        $dataProvider = $searchModel->searchMenu(Yii::$app->request->queryParams,$id);

        if ($model->load(Yii::$app->request->post())){
            $menu=$_POST['selection'];
            Motoritas::deleteAll("role = ".$_POST['Mrole']['id']."");
            for ($i=0; $i <count($menu); $i++) { 
                $modelSave = new Motoritas();
                $modelSave->role=$_POST['Mrole']['id'];
                $modelSave->menu=$_POST['selection'][$i];
                $modelSave->save();
            }
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Deletes an existing Motoritas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $id=$_POST['id'];
        $jml=$_POST['jml'];
        $check=explode(",",$id);
        for ($i=0; $i < $jml; $i++) { 
            Motoritas::deleteAll("role = '".$check[$i]."'");
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Motoritas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Motoritas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Motoritas::findBySql('select b.name,b.url,b.aktif from "user".t_otoritas a inner join "user".t_menu b on a.menu=b.id where a.role=1')->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Motoritas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Motoritas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    // protected function findModel($id)
    // {
    //     if (($model = Motoritas::findOne($id)) !== null) {
    //         return $model;
    //     } else {
    //         throw new NotFoundHttpException('The requested page does not exist.');
    //     }
    // }

     /**
     * Finds the Motoritas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Motoritas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelRole($id)
    {
        if (($model = Mrole::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
