<?php

namespace frontend\controllers;

use Yii;
use app\models\Tbprov;
use app\models\CsvForm;
use frontend\models\TbprovSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * TbprovController implements the CRUD actions for Tbprov model.
 */
class TbprovController extends Controller
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
     * Lists all Tbprov models.
     * @return mixed
     */
    
    //kode upload csv versi 1
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
                    $modelnew = new Tbprov;
                    $hasil = explode(";",$data);
                    $id = $hasil[0];
                    $idprov = $hasil[1];
                    $namaprov = $hasil[2];
                    $modelnew->id = $id;
                    $modelnew->idprov = $idprov;
                    $modelnew->namaprov = $namaprov;
                    $modelnew->save();
                }
                unlink('uploadcsv/'.$filename);
                return $this->redirect(['tbprov/index']);
            }
        }else{
            return $this->render('upload',['model'=>$model]);
        }
    }

    //kode upload csv versi 2
    /*public function actionUpload()
    {
        $model = new CsvForm();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->file = UploadedFile::getInstance($model, 'file');

            if ( $model->file )
                {
                    $time = time();
                    $model->file->saveAs('uploadcsv/' .$time. '.' . $model->file->extension);
                    $model->file = 'uploadcsv/' .$time. '.' . $model->file->extension;

                     $handle = fopen($model->file, "r");
                     while (($fileop = fgetcsv($handle, 1000, ";")) !== false) 
                     {
                        $id = $fileop[0];
                        $idprov = $fileop[1];
                        $namaprov = $fileop[2];
                        //print_r($fileop);exit();
                        $sql = "INSERT INTO Tbprov(id, idprov, namaprov) VALUES ('$id', '$idprov', '$namaprov')";
                        $query = Yii::$app->db->createCommand($sql)->execute();
                     }

                     if ($query) 
                     {
                        echo "data upload successfully";
                     }

                }

            //$model->save();
            return $this->redirect(['tbprov/index']);
        } else {
            return $this->render('upload', [
                'model' => $model,
            ]);
        }
    }*/


    public function actionIndex()
    {
        $searchModel = new TbprovSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbprov model.
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
     * Creates a new Tbprov model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tbprov();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tbprov model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tbprov model.
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
     * Finds the Tbprov model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbprov the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbprov::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
