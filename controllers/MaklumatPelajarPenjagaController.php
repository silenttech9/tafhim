<?php

namespace app\controllers;

use Yii;
use app\models\MaklumatPelajarPenjaga;
use app\models\MaklumatPelajarPenjagaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MaklumatPilihanPusatPengajian;
use app\models\LookupKelas;
use app\models\LookupPusatPengajian;
use yii\data\ActiveDataProvider;
/**
 * MaklumatPelajarPenjagaController implements the CRUD actions for MaklumatPelajarPenjaga model.
 */
class MaklumatPelajarPenjagaController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all MaklumatPelajarPenjaga models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaklumatPelajarPenjagaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionPending()
    {
        $searchModel = new MaklumatPelajarPenjagaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status'=>'Pending']);

        return $this->render('pending', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTahfiz()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => LookupPusatPengajian::find(),
        ]);

        return $this->render('tahfiz', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionSenarai_tahfiz($id)
    {
        $model2 = LookupPusatPengajian::find()->where(['id'=>$id])->one();

        $searchModel = new MaklumatPelajarPenjagaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['pusat_pengajian_id'=>$id]);


        $dataProvider2 = new ActiveDataProvider([
            'query' => LookupKelas::find()->where(['id_pusat_pengajian'=>$id]),
        ]);


        return $this->render('senarai_tahfiz', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProvider2' => $dataProvider2,
            'model2' => $model2,
        ]);


    }

    public function actionSenarai_kelas($id)
    {
        $model2 = LookupKelas::find()->where(['id'=>$id])->one();

        $searchModel = new MaklumatPelajarPenjagaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['kelas'=>$id]);

        return $this->render('senarai_kelas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model2' => $model2,


        ]);


    }



    
    /**
     * Displays a single MaklumatPelajarPenjaga model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MaklumatPelajarPenjaga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaklumatPelajarPenjaga();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaklumatPelajarPenjaga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaklumatPelajarPenjaga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaklumatPelajarPenjaga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaklumatPelajarPenjaga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaklumatPelajarPenjaga::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionStatus($id)
    {
        $model = $this->findModel($id);
        $model_pusat = MaklumatPilihanPusatPengajian::find()->where(['id_pelajar'=>$id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['pending']);
        } else {
            return $this->render('status', [
                'model' => $model,
                'model_pusat' => $model_pusat,
            ]);
        }
    }

    public function actionKelas($id){

        $countPosts = LookupKelas::find()
        ->where(['id_pusat_pengajian'=>$id])
        ->count();
        $posts = LookupKelas::find()
        ->where(['id_pusat_pengajian'=>$id])
        ->all();

        if ($countPosts>0) {
           echo "<option value=''>Sila Pilih</option>";
           foreach ($posts as $post) {
               echo "<option value='".$post->id."'>".$post->kelas."</option>";
           }

        } else {

            echo "<option value=''>-</option>";
        }

    } 




    
}
