<?php

namespace frontend\controllers;

use Yii;
use app\models\Userspo;
use app\models\UserspoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * UserspoController implements the CRUD actions for Userspo model.
 */
class UserspoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['update','delete'],
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
     * Lists all Userspo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserspoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Userspo model.
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
     * Creates a new Userspo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userspo();

        if ($model->load(Yii::$app->request->post())) {
           /* $model->save();*/

            /*https://www.youtube.com/watch?v=lY2-luDjef0*/
            
/*            if (Yii::$app->request->isPost) {
                $model->file = UploadedFile::getInstance($model,'logo');
                if ($model->file && $model->validate()) {
                    $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                }*/
            
            $rnd = rand(0,9999999);
            //$imagesId = $model->id;
            
            $imageFile = UploadedFile::getInstance($model,'logo');
            $fileName = "{$rnd}";
            
            if(isset($imageFile->size)){
            $imageFile->saveAs('uploads/' . 'spo_' . $fileName . '.' . $imageFile->extension);
            }
            $model->logo = 'spo_' . $fileName . '.' . $imageFile->extension;
            $model->save(false);

            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Userspo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
/*            $model->save();*/


/*

$uploadDir = Yii::getAlias('@web/web/uploads');
            $uploadPath = Yii::getAlias('@web/web/uploads');

            $model->save();
            $imageProject = $model->id;

            //Main Image
            $image = UploadedFile::getInstance($model, 'logo');

            if ($image) {
                $imgProject = 'project_' . $imageProject . '.' . $image->getExtension();
                $image->saveAs($uploadDir . '/' . $imgProject);
                $model->main_image = $uploadPath . '/' . $imgProject;
            }

            if ($model->upload()) {
                $model->save();
*/



            $rnd = rand(0,9999999);
            //$imagesId = $model->id;
            
            $imageFile = UploadedFile::getInstance($model,'logo');
            $fileName = "{$rnd}";
            
            if(isset($imageFile->size)){
            $imageFile->saveAs('uploads/' . 'spo_' . $fileName . '.' . $imageFile->extension);
            }
            $model->logo = 'spo_' . $fileName . '.' . $imageFile->extension;
            $model->save(false);


/*            $imageNama = $model->nama;
            $imageId = $model->id;
            $image = UploadedFile::getInstance($model,'logo');
            $imgName = 'spo' . $imageId . $imageNama . '.' . $image->getExtension();
            $image->saveAs( Yii::getAlias('@imgPath') . '/' . $imgName);
            $model->logo = $imgName;
            $model->save();*/

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Userspo model.
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
     * Finds the Userspo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userspo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userspo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
