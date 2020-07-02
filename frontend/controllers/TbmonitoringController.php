<?php

namespace frontend\controllers;

use Yii;
use app\models\Tbmonitoring;
use app\models\TbmonitoringSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\CsvForm;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;

/**
 * TbmonitoringController implements the CRUD actions for Tbmonitoring model.
 */
class TbmonitoringController extends Controller
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
     * Lists all Tbmonitoring models.
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
                    $modelnew = new Tbmonitoring;
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
                return $this->redirect(['tbmonitoring/index']);
            }
        }else{
            return $this->render('upload',['model'=>$model]);
        }
    }
/*    public function getTotal()
    {

    }*/


    public function actionHitung()
    {
        //Menampilkan perhitungan enum hasil setiap baris
/*        $query = new \yii\db\Query();
        $results = $query->select('sum(ruta1=1) + sum(ruta2=1) + sum(ruta3=1) + sum(ruta4=1) + sum(ruta5=1) + sum(ruta6=1) + sum(ruta7=1) + sum(ruta8=1) + sum(ruta9=1) + sum(ruta10=1) as Total')
        ->from('{{%tbmonitoring}}')
        //->where('ruta1 = 1')
        ->groupBy('nks')
        ->all();
 
        print "<pre>";
        print_r($results);
        print "</pre>";
        exit();*/

       /* $testing = (new \yii\db\Query())
        ->select('*, sum(ruta1=1) + sum(ruta2=1) + sum(ruta3=1) + sum(ruta4=1) + sum(ruta5=1) + sum(ruta6=1) + sum(ruta7=1) + sum(ruta8=1) + sum(ruta9=1) + sum(ruta10=1) as totalruta')
        ->from('{{%tbmonitoring}}')
        ->groupBy('nks')
        ->all();*/

        //$query = Tbmonitoring::find();

/*        print "<pre>";
        print_r($testing);
        print "</pre>";
        exit();
*/      

        //$searchModel = new TbmonitoringSearch();
        //$testProvider = $searchModel->search(Yii::$app->request->queryParams);


        $dataProvider = new ArrayDataProvider([
            //'query' => $query,
            //'allModels' => $testing,
            'allModels' => Tbmonitoring::find()->select(['*', 'nks','sum(ruta1=1) + sum(ruta2=1) + sum(ruta3=1) + sum(ruta4=1) + sum(ruta5=1) + sum(ruta6=1) + sum(ruta7=1) + sum(ruta8=1) + sum(ruta9=1) + sum(ruta10=1) as totalruta', '(sum(ruta1=1) + sum(ruta2=1) + sum(ruta3=1) + sum(ruta4=1) + sum(ruta5=1) + sum(ruta6=1) + sum(ruta7=1) + sum(ruta8=1) + sum(ruta9=1) + sum(ruta10=1))*100 / target as persen'])->groupBy('nks')->all(), //melakukan query array sebagai alias
            'sort' => [
                'attributes' => ['fullname','kodepml', 'kodepcl', 'nks', 'ruta1', 'ruta2', 'ruta3', 'ruta4', 'ruta5', 'ruta6', 'ruta7', 'ruta8', 'ruta9', 'ruta10', 'totalruta', 'target', 'persen','Total'], //mengaktifkan sorting pada setiap kolom
            ],
            /*'pagination' => [
                'pageSize' => 66, //mengatur jumlah halaman pada index
            ],*/
            'key' => 'nks', //menambahkan action pada index
        ]);
        //$tbmonitorings = $dataProvider->getModels();

        return $this->render('datatabel', [
            'dataProvider' => $dataProvider,
        ]);



    }

    public function actionDetailTbbs($id)
    {
        $model = Tbbs::findOne($id);
        if($model!==null){
            echo $model->nmdesa." - ".$model->idbs." - ".$model->nks;
        }
        else{
            echo "Detail is empty";
        }
    }

    
    public function actionIndex()
    {

        $searchModel = new TbmonitoringSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbmonitoring model.
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
     * Creates a new Tbmonitoring model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tbmonitoring();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("success", "NKS berhasil ditambahkan.");
            return $this->redirect(['view', 'id' => $model->nks]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tbmonitoring model.
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
     * Deletes an existing Tbmonitoring model.
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
     * Finds the Tbmonitoring model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Tbmonitoring the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbmonitoring::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
