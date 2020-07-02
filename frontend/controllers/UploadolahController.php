<?php

namespace frontend\controllers;

use Yii;
use app\models\User;
use app\models\Uploadolah;
use app\models\UploadolahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * UploadolahController implements the CRUD actions for Uploadolah model.
 */
class UploadolahController extends Controller
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
     * Lists all Uploadolah models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UploadolahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

        //return $this->render('index');
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
        $model = new Uploadolah();
         
        if ($model->load(Yii::$app->request->post())){
            // ambil foto
            $fileUpload = UploadedFile::getInstance($model, 'filesplit');
            $path = 'uploadfile/' . md5($fileUpload->baseName) . '.' . $fileUpload->extension;
            if(isset($fileUpload->size)){
                $fileUpload->saveAs('uploadfile/' . $fileUpload->baseName . '.' . $fileUpload->extension);
            }
            $model->filesplit = $fileUpload->baseName . '.' . $fileUpload->extension;
            $model->keterangan = $path;
            $model->save(false);
            Yii::$app->session->setFlash("success", "File berhasil diupload.");
            return $this->redirect(['index', 'id' => $model->id]);
        } 
        return $this->renderAjax('upload', [
            'model' => $model,
        ]);
    }


    

    public function actionDownload($filesplit)
    {

        $path = Yii::getAlias('@webroot') . '/uploadfile/'. $filesplit;

        if (file_exists($path)) {

            return Yii::$app->response->sendFile($path);


          }/*else{
            $this->render('download404');
          }  
     */
    }

    public function actionDeletefoto($id)
    {
        $data = Uploadolah::findOne($id);
        unlink(Yii::$app->basePath . '/web/' . $data->keterangan);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Displays a single Uploadolah model.
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
     * Creates a new Uploadolah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Uploadolah();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpost]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Uploadolah model.
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
     * Deletes an existing Uploadolah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       /* $this->findModel($id)->delete();

        return $this->redirect(['index']);*/

        $data = Uploadolah::findOne($id);
        $data->delete();
        unlink(Yii::$app->basePath . '/web/uploadfile/' . $data->filesplit);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Uploadolah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uploadolah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uploadolah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
