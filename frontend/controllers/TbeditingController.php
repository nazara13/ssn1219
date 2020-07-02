<?php

namespace frontend\controllers;

use Yii;
use app\models\Tbediting;
use app\models\TbeditingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\CsvForm;

/**
 * TbeditingController implements the CRUD actions for Tbediting model.
 */
class TbeditingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['upload','create','delete'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tbediting models.
     * @return mixed
     */
    public function actionUpload(){
        $model = new CsvForm;
   
        if($model->load(Yii::$app->request->post())){
            $file = UploadedFile::getInstance($model,'file');
            $filename = 'Data.'.$file->extension;
            $upload = $file->saveAs('uploadcsv/'.$filename);
            if($upload){
                define('CSV_PATH','uploadcsv/');
                $csv_file = CSV_PATH . $filename; 
                $filecsv = file($csv_file);
                //print_r($filecsv);
                foreach($filecsv as $data){
                    $modelnew = new Tbediting;
                    $hasil = explode(";",$data);
                    $kodepml = $hasil[0];
                    $kodepcl = $hasil[1];
                    $nks = $hasil[2];
                    $ruta1 = $hasil[3];
                    $ruta2 = $hasil[4];
                    $ruta3 = $hasil[5];
                    $ruta4 = $hasil[6];
                    $ruta5 = $hasil[7];
                    $ruta6 = $hasil[8];
                    $ruta7 = $hasil[9];
                    $ruta8 = $hasil[10];
                    $ruta9 = $hasil[11];
                    $ruta10 = $hasil[12];
                    $Total = $hasil[13];
                    $modelnew->kodepml = $kodepml;
                    $modelnew->kodepcl = $kodepcl;
                    $modelnew->nks = $nks;
                    $modelnew->ruta1 = $ruta1;
                    $modelnew->ruta2 = $ruta2;
                    $modelnew->ruta3 = $ruta3;
                    $modelnew->ruta4 = $ruta4;
                    $modelnew->ruta5 = $ruta5;
                    $modelnew->ruta6 = $ruta6;
                    $modelnew->ruta7 = $ruta7;
                    $modelnew->ruta8 = $ruta8;
                    $modelnew->ruta9 = $ruta9;
                    $modelnew->ruta10 = $ruta10;
                    $modelnew->Total = $Total;
                    $modelnew->save();
                }
                unlink('uploadcsv/'.$filename);
                Yii::$app->session->setFlash("success", "File berhasil diimport.");
                return $this->redirect(['tbediting/index']);
            }
        }else{
            return $this->render('upload',['model'=>$model]);
        }
    }

    public function actionIndex()
    {
        $searchModel = new TbeditingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbediting model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tbediting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tbediting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("success", "NKS berhasil ditambahkan.");
            return $this->redirect(['view', 'id' => $model->nks]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tbediting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("success", "Kondisi NKS berhasil diperbaharui.");
            return $this->redirect(['view', 'id' => $model->nks]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tbediting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tbediting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Tbediting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbediting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
