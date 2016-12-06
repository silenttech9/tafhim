<?php

namespace app\controllers;

use Yii;
use app\models\YuranDaftar;
use app\models\YuranDaftarSearch;
use app\models\LookupYuran;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MaklumatPelajarPenjaga;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\db\Query;
/**
 * YuranDaftarController implements the CRUD actions for YuranDaftar model.
 */
class YuranDaftarController extends Controller
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
            ]
        ];
    }

    /**
     * Lists all YuranDaftar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new YuranDaftarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YuranDaftar model.
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
     * Creates a new YuranDaftar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    

    /**
     * Updates an existing YuranDaftar model.
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
     * Deletes an existing YuranDaftar model.
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
     * Finds the YuranDaftar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YuranDaftar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = YuranDaftar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionYurandaftar()
    {
        $query = new Query;
        $query->select(['id','nama_pelajar','no_mykid','YEAR(CURDATE()) - YEAR(STR_TO_DATE(tarikh_lahir, "%d/%m/%Y")) AS umur'])  
              ->from('maklumat_pelajar_penjaga')
              ->where(['YEAR(CURDATE()) - YEAR(STR_TO_DATE(tarikh_lahir, "%d/%m/%Y"))'=>7]);
      
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $query->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('yurandaftar', [
             'models' => $models,
             'pages' => $pages,
        ]);
        
    }

    public function actionCreate($id,$umur)
    {
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT id,YEAR(CURDATE()) - YEAR(STR_TO_DATE(tarikh_masuk, "%d/%m/%Y")) AS diffstd
        FROM maklumat_pelajar_penjaga 
        WHERE id = "'.$id.'"');
        $std = $sql->queryAll();
        
        foreach ($std as $key => $value) {
            $tahunmasuk = $value['diffstd'];
        }
        // print($tahunmasuk);
        // exit();
        if ($umur == 7) {
            $model = new YuranDaftar();
            //if tahunmasuk 0 = student baru
            if ($tahunmasuk == 0) {
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>1])
                    ->andWhere(['jenis_pelajar'=>1])
                    ->all();
            }
            else{
                
            }

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'umur' => $umur,
                ]);
            }
        }
        else if($umur == 8){
            $model = new YuranDaftar();
            //if tahunmasuk 0 = student baru
            if ($tahunmasuk == 0) {
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>2])
                    ->andWhere(['jenis_pelajar'=>3])
                    ->all();

            }
            else{
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>2])
                    ->andWhere(['jenis_pelajar'=>2])
                    ->all();
            }

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'umur' => $umur,
                ]);
            }
        }
        else if($umur == 9){
            $model = new YuranDaftar();
            //if tahunmasuk 0 = student baru
            if ($tahunmasuk == 0) {
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>3])
                    ->andWhere(['jenis_pelajar'=>3])
                    ->all();

            }
            else{
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>3])
                    ->andWhere(['jenis_pelajar'=>2])
                    ->all();
            }

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'umur' => $umur,
                ]);
            }
        }
        else if($umur == 10){
            $model = new YuranDaftar();
            //if tahunmasuk 0 = student baru
            if ($tahunmasuk == 0) {
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>4])
                    ->andWhere(['jenis_pelajar'=>3]) //special case. tahun lewat
                    ->all();

            }
            else{
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>4])
                    ->andWhere(['jenis_pelajar'=>2]) //pelajar lama
                    ->all();
            }

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'umur' => $umur,
                ]);
            }
        }
        else if($umur == 11){
            $model = new YuranDaftar();
            //if tahunmasuk 0 = student baru
            if ($tahunmasuk == 0) {
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>5])
                    ->andWhere(['jenis_pelajar'=>3]) //special case. tahun lewat
                    ->all();

            }
            else{
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>5])
                    ->andWhere(['jenis_pelajar'=>2]) //pelajar lama
                    ->all();
            }

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'umur' => $umur,
                ]);
            }
        }
        else if($umur == 12){
            $model = new YuranDaftar();
            //if tahunmasuk 0 = student baru
            if ($tahunmasuk == 0) {
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>6])
                    ->andWhere(['jenis_pelajar'=>3]) //special case. tahun lewat
                    ->all();

            }
            else{
                $model2 = LookupYuran::find()
                    ->where(['tahap'=>6])
                    ->andWhere(['jenis_pelajar'=>2]) //pelajar lama
                    ->all();
            }

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'umur' => $umur,
                ]);
            }
        }
        
    }

}
