<?php

namespace app\controllers;

use Yii;
use app\models\YuranDaftar;
use app\models\YuranDaftarSearch;
use app\models\LookupYuran;
use app\models\LookupPusatPengajian;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MaklumatPelajarPenjaga;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use kartik\growl\Growl;
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

    public function actionPilihan()
    {
        // $model = LookupPusatPengajian::find()
        //         ->all();
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT p.pusat_pengajian,COUNT(m.id) AS total,p.id
            from maklumat_pelajar_penjaga m
            left join lookup_pusat_pengajian p on p.id = m.pusat_pengajian_id
            GROUP by p.id
            ORDER by total asc');

        $model = $sql->queryAll();

        return $this->render('pilihan',[
            'model'=>$model,
        ]);
    }

    public function actionYurandaftar($tahun,$umur,$id_pengajian)
    {   
        $model2 = LookupPusatPengajian::find()
                ->where(['id'=>$id_pengajian])
                ->one();

        $query = new Query;
        $query->select(['id','nama_pelajar','no_mykid','YEAR(CURDATE()) - YEAR(STR_TO_DATE(tarikh_lahir, "%d/%m/%Y")) AS umur'])  
              ->from('maklumat_pelajar_penjaga')
              ->where(['YEAR(CURDATE()) - YEAR(STR_TO_DATE(tarikh_lahir, "%d/%m/%Y"))'=>$umur])
              ->andWhere(['pusat_pengajian_id'=>$id_pengajian]);
      
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $query->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('yurandaftar', [
             'models' => $models,
             'pages' => $pages,
             'model2'=>$model2,
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
        
        $model3 = MaklumatPelajarPenjaga::find()
                ->where(['id'=>$id])
                ->one();

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
                $nama = $model3->nama_pelajar;
                $msg = 'Yuran Daftar '.$nama.' Berjaya Di Simpan.';
                
                $model->save();
                $this->getAddsuccess($msg);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'model3'=>$model3,
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
                $nama = $model3->nama_pelajar;
                $msg = 'Yuran Daftar '.$nama.' Berjaya Di Simpan.';
                
                $model->save();
                $this->getAddsuccess($msg);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'model3'=>$model3,
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
                $nama = $model3->nama_pelajar;
                $msg = 'Yuran Daftar '.$nama.' Berjaya Di Simpan.';
                
                $model->save();
                $this->getAddsuccess($msg);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'model3'=>$model3,
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
                $nama = $model3->nama_pelajar;
                $msg = 'Yuran Daftar '.$nama.' Berjaya Di Simpan.';
                
                $model->save();
                $this->getAddsuccess($msg);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'model3'=>$model3,
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
                $nama = $model3->nama_pelajar;
                $msg = 'Yuran Daftar '.$nama.' Berjaya Di Simpan.';
                
                $model->save();
                $this->getAddsuccess($msg);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'model3'=>$model3,
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

            if ($model->load(Yii::$app->request->post()) ) {
                $nama = $model3->nama_pelajar;
                // $model->jenis_yuran = 'Yuran Daftar';
                // $model->bulan = $bulan;
                // $model->tahap_pelajar = 6;
                // $model->tahun = $tahun;

                $msg = 'Yuran Daftar '.$nama.' Berjaya Di Simpan.';

                $model->save();
                $this->getAddsuccess($msg);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'model3'=>$model3,
                    'umur' => $umur,
                ]);
            }
        }
        
    }

    public function getAddsuccess($msg)
    {
        Yii::$app->getSession()->setFlash('success', [
             'type' => Growl::TYPE_CUSTOM,
             'duration' => 5000,
             'icon' => 'glyphicon glyphicon-ok-sign',
             'message' => $msg,
             'title' => 'Status',
             'positonY' => 'top',
             'positonX' => 'right',
             'options'=>['class'=>'note note-success'],
             // 'progressBarOptions' =>['class'=>'progress-bar progress-bar-success'],
         ]);
    }

}
