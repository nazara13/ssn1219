<?php

namespace frontend\controllers;

use Yii;
use app\models\Instansi;
use app\models\InstansiSearch;
use app\models\Userspo;
use app\models\UserspoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;
use yii\widgets\LinkPager;

/**
 * UserspoController implements the CRUD actions for Userspo model.
 */
class TabelprogressController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Userspo models.
     * @return mixed
     */
    public function actionIndex()
    {

/*        $data = $this->queryData();
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        exit;

        return $this->printTable($data);*/

        
        $searchModel = new UserspoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = Userspo::find();
        $countQuery = clone $query;

        $pages = new Pagination(['totalCount' => $countQuery->count()]);

        $models = $query->offset($pages->offset)

                ->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'models' => $models,
            'pages' => $pages,
        ]);


/*        $tabelProgress = (new \yii\db\Query())
            ->select(['*'])
            ->from('userspo')
            ->all();

            dump($tabelProgress);*/
            //$tabelProgress = Instansi::find()->where(['id_instansi'=>1])->all();



  /*          $tabelProgress = new ActiveDataProvider(['query'=>Instansi::find()->where(['id_instansi'=>1])->orderBy('nama_instansi DESC'),
            'pagination' =>['pageSize'=>40,
        ]
    ]);*/
            //return $this->render('index',['tabelProgress'=>$tabelProgress]);

    }


    public function actionProgress(){
    

/*                    $query1 = (new \yii\db\Query())
                    ->select(['nama_instansi','id_instansi', 'count(nama_instansi) as "instans"'])
                    ->from('instansi')
                    ->groupBy('id_instansi')                
                    ->orderBy(['instans' => SORT_DESC])
                    ->all();

                    $query2 = (new \yii\db\Query())
                    ->select(['id_instansi', 'count(nama) as "total"'])
                    ->from('userspo')
                    ->groupBy('id_instansi')                
                    ->orderBy(['total' => SORT_DESC])
                    ->all();


                    $query3 = (new \yii\db\Query())
                    ->select(['id_instansi', 'count(nama) as "grandtotal"'])
                    ->from('userspo')          
                    ->orderBy(['grandtotal' => SORT_DESC])
                    ->all();


                    $query4 = (new \yii\db\Query())
                    ->select(['userspo.id_instansi*, instansi.*'])
                    ->leftJoin('instansi', 'instansi.id_instansi = userspo.id_instansi')        
                    ->with(['userspo')
                    ->all();
*/
/*SELECT Userspo.id_instansi, Instansi.nama_instansi, Userspo.count(nama)
FROM Userspo
INNER JOIN Instansi ON Userspo.id_instansi=Instansi.id_instansi;*/

                    //return $this->render('progress',['query1'=>$query1, 'query2'=>$query2, 'query3'=>$query3, 'query4'=>$query4,]);


        $query = new \yii\db\Query();
        $query = $query->select('u.id_instansi, i.nama_instansi, count(u.nama) as test')->from(['{{%userspo}} u'])->groupBy('id_instansi')->orderBy('test DESC,');
        $query->join('INNER JOIN', '{{%instansi}} i', 'u.id_instansi = i.id_instansi');
        $results = $query->all();
       /* print "<pre>";
        print_r($results);
        print "</pre>";
        exit();*/
        
        /*Userspo::find()->joinWith('instansi',true,'RIGHT JOIN')->where(['userspo.id_instansi'=>'instansi.id_instansi'])->count();
         print "<pre>";
        print_r($data);
        print "</pre>";
        exit();*/

                    $query1 = (new \yii\db\Query())
                    ->select(['nama_instansi','id_instansi', 'count(nama_instansi) as "instans"'])
                    ->from('instansi')
                    ->groupBy('id_instansi')                
                    ->orderBy(['instans' => SORT_DESC])
                    ->all();

                    $query2 = (new \yii\db\Query())
                    ->select(['id_instansi', 'count(nama) as "total"'])
                    ->from('userspo')
                    ->groupBy('id_instansi')      
                    ->orderBy(['total' => SORT_DESC])
                    ->all();


                    $query3 = (new \yii\db\Query())
                    ->select(['id_instansi', 'count(nama) as "grandtotal"'])
                    ->from('userspo')          
                    ->orderBy(['grandtotal' => SORT_DESC])
                    ->all();


        return $this->render('progress',['results'=>$results, 'query1'=>$query1, 'query2'=>$query2, 'query3'=>$query3,]);
                    
    }

    public function actionAll()
    {
        $results = \Yii::$app->db->createCommand("SELECT * FROM {{%userspo}}")->queryAll();
        print "<pre>";
        print_r($results);
        print "</pre>";
    }

    public function actionAllyii()
    {
        $query = new \yii\db\Query();
        $results = $query->select(['id_instansi','nama'])->from('{{%userspo}}')->all();
        print "<pre>";
        print_r($results);
        print "</pre>";
        exit();
    }

    public function actionOne()
    {
        $results = \Yii::$app->db->createCommand("SELECT * FROM instansi WHERE id_instansi = :id_instansi", [':id_instansi' => 5])->queryOne();
        print "<pre>";
        print_r($results);
        print "</pre>";
    }

    public function actionOneyii()
    {
        $query = new \yii\db\Query();
        $results = $query->select(['*'])->from('{{%instansi}}')->where('id_instansi = :id_instansi', [':id_instansi' => 5])->one();
        print "<pre>";
        print_r($results);
        print "</pre>";
        exit();
    }

    public function actionColumnyii()
    {
        $query = new \yii\db\Query();
        $results = $query->select(['*'])->from('{{%userspo}}')->column();
        print "<pre>";
        print_r($results);
        print "</pre>";
        exit();
    }

    public function actionScalaryii()
    {
        $query = new \yii\db\Query();
        $results = $query->select(['*'])->from('{{%userspo}}')->scalar();
        print "<pre>";
        print_r($results);
        print "</pre>";
        exit();
    }

    public function actionCountyii()
    {
        $query = new \yii\db\Query();
        $results = $query->select(['*'])->from('{{%instansi}}')->count();
        print "<pre>";
        print_r($results);
        print "</pre>";
        exit();
    }

    public function actionJoinyii()
    {
        $query = new \yii\db\Query();
        $query = $query->select('u.*, i.nama_instansi as namaInstansi')->from(['{{%userspo}} u']);
        $query->join('INNER JOIN', '{{%instansi}} i', 'u.id_instansi = i.id_instansi');
        $results = $query->all();
        print "<pre>";
        print_r($results);
        print "</pre>";
        exit();

        return $this->render('joinyii',['results'=>$results,]);
    }

     public function actionDistinctyii()
    {
        $query = new \yii\db\Query();
        $query = $query->select('u.*, i.nama_instansi as namaInstansi')->from(['{{%userspo}} u']);
        $query->join('LEFT JOIN', '{{%instansi}} i', 'u.id_instansi = i.id_instansi');
        $results = $query->all();
        print "<pre>";
        print_r($results);
        print "</pre>";
        exit();

        return $this->render('joinyii',['results'=>$results,]);
    }

    public function actionDatatabel()
    {

        $query = new \yii\db\Query();
        $query = $query->select('u.id_instansi, i.nama_instansi, count(u.nama) as test')->from(['{{%userspo}} u'])->groupBy('id_instansi')->orderBy('test DESC,');
        $query->join('INNER JOIN', '{{%instansi}} i', 'u.id_instansi = i.id_instansi');
        $results = $query->all();

        $query1 = (new \yii\db\Query())
                ->select(['nama_instansi','id_instansi', 'count(nama_instansi) as "instans"'])
                ->from('instansi')
                ->groupBy('id_instansi')                
                ->orderBy(['instans' => SORT_DESC])
                ->all();

        $query2 = (new \yii\db\Query())
                ->select(['id_instansi', 'count(nama) as "total"'])
                ->from('userspo')
                ->groupBy('id_instansi')                
                ->orderBy(['total' => SORT_DESC])
                ->all();


        $query3 = (new \yii\db\Query())
                ->select(['id_instansi', 'count(nama) as "grandtotal"'])
                ->from('userspo')          
                ->orderBy(['grandtotal' => SORT_DESC])
                ->all();         

        return $this->render('datatabel',['results'=>$results, 'query1'=>$query1, 'query2'=>$query2, 'query3'=>$query3,]);

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
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
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
            $model->save();

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
