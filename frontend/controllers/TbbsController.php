<?php

namespace frontend\controllers;

use Yii;
use app\models\Tbbs;
use app\models\TbbsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CsvForm;
use yii\web\UploadedFile;
use yii\filters\AccessControl;


/**
 * TbbsController implements the CRUD actions for Tbbs model.
 */
class TbbsController extends Controller
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
     * Lists all Tbbs models.
     * @return mixed
     */

    public function actionUpload()
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
                     while (($fileop = fgetcsv($handle, 1000000, ";")) !== false) 
                     {
                        $prov = $fileop[0];
                        $kab = $fileop[1];
                        $kec = $fileop[2];
                        $desa = $fileop[3];
                        $bs = $fileop[4];
                        $nmprov = $fileop[5];
                        $nmkab = $fileop[6];
                        $nmkec = $fileop[7];
                        $nmdesa = $fileop[8];
                        $idbs = $fileop[9];
                        $nks = $fileop[10];
                        //print_r($fileop);exit();
                        $sql = "INSERT INTO Tbbs(prov, kab, kec, desa, bs, nmprov, nmkab, nmkec, nmdesa, idbs, nks) VALUES ('$prov', '$kab', '$kec', '$desa', '$bs', '$nmprov', '$nmkab', '$nmkec', '$nmdesa', '$idbs', '$nks')";
                        $query = Yii::$app->db->createCommand($sql)->execute();
                     }

                     if ($query) 
                     {
                        echo "data upload successfully";
                     }

                }

            //$model->save();
            return $this->redirect(['tbbs/index']);
        } else {
            return $this->render('upload', [
                'model' => $model,
            ]);
        }
    }


    public function actionIndex()
    {
        $searchModel = new TbbsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbbs model.
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
     * Creates a new Tbbs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tbbs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nks]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tbbs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nks]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tbbs model.
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
     * Finds the Tbbs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Tbbs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbbs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
