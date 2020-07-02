<?php

namespace frontend\controllers;

use Yii;
use app\models\User;
use app\models\Exportdata;
use app\models\ExportdataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * ExportdataController implements the CRUD actions for Exportdata model.
 */
class ExportdataController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['create','update','delete','upload'],
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
     * Lists all Exportdata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExportdataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionUpload()
    {
        //sesuai nama file upload
        $model = new Exportdata();
         
        if ($model->load(Yii::$app->request->post())){
            // ambil foto
            $fileUpload = UploadedFile::getInstance($model, 'fileexport');
            $path = 'folderexport/' . md5($fileUpload->baseName) . '.' . $fileUpload->extension;
            if(isset($fileUpload->size)){
                $fileUpload->saveAs('folderexport/' . $fileUpload->baseName . '.' . $fileUpload->extension);
            }
            $model->fileexport = $fileUpload->baseName . '.' . $fileUpload->extension;
            $model->keterangan = $path;
            $model->save();
            //Yii::$app->session->setFlash("success", "File berhasil diupload.");
            return $this->redirect(['index', 'id' => $model->id]);
        } 
        return $this->renderAjax('upload', [
            'model' => $model,
        ]);
    }

    
    public function actionTampil()
    {

        $data = Exportdata::find()->all();
        return $this->render('tampil', ['exportdatas'=>$data]);

    }

    public function actionDownload($fileexport)
    {

        $path = Yii::getAlias('@webroot') . '/folderexport/'. $fileexport;

        if (file_exists($path)) {

            return Yii::$app->response->sendFile($path);


          }/*else{
            $this->render('download404');
          }  
     */
    }
    /**
     * Displays a single Exportdata model.
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
     * Creates a new Exportdata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Exportdata();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpost]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Exportdata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpost]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Exportdata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        /*$this->findModel($id)->delete();

        return $this->redirect(['index']);*/
        $data = Exportdata::findOne($id);
        $data->delete();
        unlink(Yii::$app->basePath . '/web/folderexport/' . $data->fileexport);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Exportdata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Exportdata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Exportdata::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
