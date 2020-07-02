<?php

namespace frontend\controllers;

use Yii;
use app\models\User;
use app\models\Uploadbackup;
use app\models\UploadbackupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * UploadbackupController implements the CRUD actions for Uploadbackup model.
 */
class UploadbackupController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['create','update','delete','download'],
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
     * Lists all Uploadbackup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UploadbackupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpload()
    {
/*        $model = new Uploadolah();
        //nama acak
        if ($model->load(Yii::$app->request->post())) {
            $acak = rand(0,99999999);
            $fileUpload = UploadedFile::getInstance($model, 'filesplit');
            $fileName = "{$acak}";
            if (isset($fileUpload->size)) {
                $fileUpload->saveAs('uploadfile/' . 'spo_' . $fileName . '.' . $fileUpload->extension);
            }
            $model->filesplit = 'spo_' . $fileName . '.' . $fileUpload->extension;
            $model->save(false);
            return $this->redirect(['tampil', 'id' => $model->id]);
        }*/

        //sesuai nama file upload
        $model = new Uploadbackup();
         
        if ($model->load(Yii::$app->request->post())){
            // ambil foto
            $fileUpload = UploadedFile::getInstance($model, 'filebackup');
            $path = 'folderbackup/' . md5($fileUpload->baseName) . '.' . $fileUpload->extension;
            if(isset($fileUpload->size)){
                $fileUpload->saveAs('folderbackup/' . $fileUpload->baseName . '.' . $fileUpload->extension);
            }
            $model->filebackup = $fileUpload->baseName . '.' . $fileUpload->extension;
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

        $data = Uploadbackup::find()->all();
        return $this->render('tampil', ['uploadbackups'=>$data]);

    }

    public function actionDownload($filebackup)
    {

        $path = Yii::getAlias('@webroot') . '/folderbackup/'. $filebackup;

        if (file_exists($path)) {

            return Yii::$app->response->sendFile($path);


          }/*else{
            $this->render('download404');
          }  
     */
    }

    public function actionDeletefoto($id)
    {
        $data = Uploadbackup::findOne($id);
        unlink(Yii::$app->basePath . '/web/' . $data->keterangan);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Displays a single Uploadbackup model.
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
     * Creates a new Uploadbackup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Uploadbackup();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpost]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Uploadbackup model.
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
     * Deletes an existing Uploadbackup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        /*$this->findModel($id)->delete();

        return $this->redirect(['index']);*/

        $data = Uploadbackup::findOne($id);
        $data->delete();
        unlink(Yii::$app->basePath . '/web/folderbackup/' . $data->filebackup);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Uploadbackup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uploadbackup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uploadbackup::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
