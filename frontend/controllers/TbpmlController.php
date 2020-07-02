<?php

namespace frontend\controllers;

use Yii;
use app\models\Tbpml;
use app\models\TbpmlSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CsvForm;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * TbpmlController implements the CRUD actions for Tbpml model.
 */
class TbpmlController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
             'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['upload','create','update','delete'],
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
     * Lists all Tbpml models.
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
                print_r($filecsv);
                foreach($filecsv as $data){
                    $modelnew = new Tbpml;
                    $hasil = explode(";",$data);
                    $semester = $hasil[0];
                    $prov = $hasil[1];
                    $kab = $hasil[2];
                    $kodepml = $hasil[3];
                    $namapml = $hasil[4];
                    $idjabatan = $hasil[5];
                    $nohp = $hasil[6];
                    $idedcod = $hasil[7];
                    $modelnew->semester = $semester;
                    $modelnew->prov = $prov;
                    $modelnew->kab = $kab;
                    $modelnew->kodepml = $kodepml;
                    $modelnew->namapml = $namapml;
                    $modelnew->idjabatan = $idjabatan;
                    $modelnew->nohp = $nohp;
                    $modelnew->idedcod = $idedcod;
                    $modelnew->save();
                }
                unlink('uploadcsv/'.$filename);
                Yii::$app->session->setFlash("success", "File berhasil diimport.");
                return $this->redirect(['tbpml/index']);
            }
        }else{
            return $this->render('upload',['model'=>$model]);
        }
    }

    public function actionIndex()
    {
        $searchModel = new TbpmlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbpml model.
     * @param integer $id
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
     * Creates a new Tbpml model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tbpml();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->kodepml]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tbpml model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->kodepml]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tbpml model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tbpml model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbpml the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbpml::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
