<?php

namespace app\controllers;

use Yii;
use app\models\MaklumatCuti;
use app\models\MaklumatCutiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use kartik\mpdf\Pdf;

/**
 * MaklumatCutiController implements the CRUD actions for MaklumatCuti model.
 */
class MaklumatCutiController extends Controller
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
     * Lists all MaklumatCuti models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaklumatCutiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaklumatCuti model.
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
     * Creates a new MaklumatCuti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaklumatCuti();

        if ($model->load(Yii::$app->request->post()) ) {
            $tarikh = date("Y",strtotime($_POST['MaklumatCuti']['tarikh_mula']));
            $bulan = date("m",strtotime($_POST['MaklumatCuti']['tarikh_mula']));

            $model->tahun = $tarikh;
            $model->bulan = $bulan;

            if ($model->save()) {
                Yii::$app->getSession()->setFlash('maklumatcuti-success', 'Tambah Maklumat Cuti Berjaya');
                return $this->redirect(['index']);
            }
            else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaklumatCuti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $tarikh = date("Y",strtotime($_POST['MaklumatCuti']['tarikh_mula']));
            $bulan = date("m",strtotime($_POST['MaklumatCuti']['tarikh_mula']));

            $model->tahun = $tarikh;
            $model->bulan = $bulan;

            if ($model->save()) {
                Yii::$app->getSession()->setFlash('maklumatcuti-success', 'Kemaskini Maklumat Cuti Berjaya');
                return $this->redirect(['index']);
            }
            else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaklumatCuti model.
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
     * Finds the MaklumatCuti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaklumatCuti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaklumatCuti::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLaporan_cuti()
    {
        if (Yii::$app->request->get('bulan')){
            $tarikh = date("Y-n-t",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
            $tarikhbulan = date("Y-m",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
            $tahun = $_GET['tahun'];
            $bulan = $_GET['bulan'];

            $query = new Query;
            $query  ->select(['maklumat_cuti.tahun','maklumat_cuti.bulan','maklumat_cuti.bilangan_cuti','maklumat_cuti.id','lookup_cuti.jenis_cuti', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_pekerja','maklumat_kakitangan.no_kp','lookup_pusat_pengajian.pusat_pengajian'])  
                    ->from('maklumat_cuti')
                    ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = maklumat_cuti.id_staff')
                    ->leftJoin('lookup_pusat_pengajian','maklumat_kakitangan.tahfiz = lookup_pusat_pengajian.id')
                    ->leftJoin('lookup_cuti','lookup_cuti.id = maklumat_cuti.jenis_cuti')
                    ->where(['maklumat_cuti.tahun'=>$_GET['tahun']])
                    ->andWhere(['maklumat_cuti.bulan'=>$_GET['bulan']]);
                    
            $command = $query->createCommand();
            $model = $command->queryAll();

            return $this->render('laporan_cuti', [
                'model' => $model,
                'tarikh' => $tarikh,
                'tahun' => $tahun,
                'bulan'=> $bulan,
                //'tarikhbulan' => $tarikhbulan,
            ]);
        }
        else{
            $tahun = date("Y",time());
            $bulan = date("m",time());
            $tarikh = date('Y-n-t',time());

            $query = new Query;
            $query  ->select(['maklumat_cuti.tahun','maklumat_cuti.bulan','maklumat_cuti.bilangan_cuti','maklumat_cuti.id','lookup_cuti.jenis_cuti', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_pekerja','maklumat_kakitangan.no_kp','lookup_pusat_pengajian.pusat_pengajian'])  
                    ->from('maklumat_cuti')
                    ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = maklumat_cuti.id_staff')
                    ->leftJoin('lookup_pusat_pengajian','maklumat_kakitangan.tahfiz = lookup_pusat_pengajian.id')
                    ->leftJoin('lookup_cuti','lookup_cuti.id = maklumat_cuti.jenis_cuti')
                    ->where(['maklumat_cuti.tahun'=>$tahun])
                    ->andWhere(['maklumat_cuti.bulan'=>$bulan]);
                    
            $command = $query->createCommand();
            $model = $command->queryAll();

            return $this->render('laporan_cuti', [
                'model' => $model,
                'tarikh' => $tarikh,
                'tahun' => $tahun,
                'bulan'=> $bulan,
            ]);
        }
    }

    public function actionCetak_laporan_cuti()
    {   
        if (Yii::$app->request->get('bulan')){
            $tarikh = date("Y-n-t",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
            $tarikhbulan = date("Y-m",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
            $tahun = $_GET['tahun'];
            $bulan = $_GET['bulan'];

            $query = new Query;
            $query  ->select(['maklumat_cuti.tahun','maklumat_cuti.bulan','maklumat_cuti.bilangan_cuti','maklumat_cuti.id','lookup_cuti.jenis_cuti', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_pekerja','maklumat_kakitangan.no_kp','lookup_pusat_pengajian.pusat_pengajian'])  
                    ->from('maklumat_cuti')
                    ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = maklumat_cuti.id_staff')
                    ->leftJoin('lookup_pusat_pengajian','maklumat_kakitangan.tahfiz = lookup_pusat_pengajian.id')
                    ->leftJoin('lookup_cuti','lookup_cuti.id = maklumat_cuti.jenis_cuti')
                    ->where(['maklumat_cuti.tahun'=>$_GET['tahun']])
                    ->andWhere(['maklumat_cuti.bulan'=>$_GET['bulan']]);
                    
            $command = $query->createCommand();
            $model = $command->queryAll();

            $content = $this->renderPartial('cetak_laporan_cuti', [
                'tarikhbulan'=>$tarikhbulan,
                'model'=>$model,
            ]);
                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'content' => $content,
                    'filename' => 'laporan_cuti_'.date("F",strtotime($tarikhbulan)).'_'.date("Y",strtotime($tarikhbulan)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:12px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | Cuti'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
        }
    }

}
