<?php

namespace app\controllers;

use Yii;
use app\models\MaklumatKakitangan;
use app\models\MaklumatKakitanganSearch;

use app\models\MaklumatKakitanganResign;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\UploadedFile;
use kartik\mpdf\Pdf;
use kartik\growl\Growl;

/**
 * MaklumatKakitanganController implements the CRUD actions for MaklumatKakitangan model.
 */
class MaklumatKakitanganController extends Controller
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
     * Lists all MaklumatKakitangan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaklumatKakitanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status_pekerjaan'=>1]);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaklumatKakitangan model.
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
     * Creates a new MaklumatKakitangan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaklumatKakitangan();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model,'file');
            $nama = $model->nama;

            if (!empty($model->file)) {
                // $model->file = UploadedFile::getInstance($model,'file');

                $model->file->saveAs('uploads/'.$model->file->baseName.'.'.$model->file->extension);

                $model->foto = $model->file->baseName.'.'.$model->file->extension;
                
            }
            else{
                
                $model->foto = 'default-image.png';
                // Image::thumbnail('@webroot/uploads/'.$model->foto, 300, 300)
                //         ->save(Yii::getAlias('@webroot/uploads/'.$model->foto), ['quality' => 90]);

            }
            $model->status_pekerjaan = 1;
            
            $model->save();

            $msg = 'Maklumat '.$nama.' Berjaya Di Simpan';
            $this->getAddsuccess($msg);
            // Yii::$app->getSession()->setFlash('maklumatstaff-success', 'Tambah kakitangan berjaya');
            return $this->redirect(['index']);
            // return $this->redirect(['view', 'id' => $model->id_staf]);
        } else {
            return $this->render('_form', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaklumatKakitangan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $nama = $model->nama;
            $msg = 'Kemaskini Maklumat '.$nama.' Berjaya';
            $this->getAddsuccess($msg);
            return $this->redirect(['view', 'id' => $model->id_staf]);
        } else {
            return $this->render('_edit', [
                'model' => $model,
            ]);
        }
    }

     public function actionUpdateimg($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model,'file');
            $nama = $model->nama;

            if (!empty($model->file)) {
                // $model->file = UploadedFile::getInstance($model,'file');

                $model->file->saveAs('uploads/'.$model->file->baseName.'.'.$model->file->extension);

                $model->foto = $model->file->baseName.'.'.$model->file->extension;
                
            }
            else{
                $model->foto = 'default-image.png';
            }
            
            $msg = 'Kemaskini Gambar '.$nama.' Berjaya.';
            $model->save();
            $this->getAddsuccess($msg);

            return $this->redirect(['view', 'id' => $model->id_staf]);
        } else {
            return $this->render('_edit', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Deletes an existing MaklumatKakitangan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        // ->delete();Yii::getAlias('@webroot/uploads/'.
        $pic = $model->foto;
        $nama = $model->nama;
        
        if ($pic === 'default-image.png') {
            $model->delete();
            $this->getDeletemsg($nama);
        }
        else{
            $model->delete();
            unlink(Yii::getAlias('@webroot/uploads/'.$pic));
            $this->getDeletemsg($nama);
        }
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaklumatKakitangan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaklumatKakitangan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaklumatKakitangan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /* Display maklumak kakitangan yang dah resign */
    public function actionResign()
    {
        $searchModel = new MaklumatKakitanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->query->andWhere(['status_pekerjaan'=>2]);
        return $this->render('resign', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd_resign($id)
    {   
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['view', 'id' => $model->id_staf]);
        } else {
            return $this->render('add_resign', [
                'model' => $model,
            ]);
        }
    }

    public function actionSurat()
    {
        $searchModel = new MaklumatKakitanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status_pekerjaan'=>1]);

        return $this->render('surat', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSurat_tawaran($id)
    {
        // return $this->renderPartial('surat_tawaran', [
        //     'model' => $this->findModel($id),
        // ]);
        $content = $this->renderPartial('surat_tawaran', ['model'=>$this->findModel($id)]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'content' => $content,
        //     'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // // any css to be embedded if required
        //     'cssInline' => '.kv-heading-1{font-size:9px}', 
            'options' => ['title' => 'Maklumat Kakitangan'],
            'methods' => [
                'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render();
    }

    public function actionSurat_tawaran_pentadbiran($id)
    {
        $content = $this->renderPartial('surat_tawaran_pentadbiran', ['model'=>$this->findModel($id)]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'content' => $content, 
            'options' => ['title' => 'Maklumat Kakitangan'],
            'methods' => [
                'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render();
    }

    public function actionSurat_perjanjian($id)
    {
        $content = $this->renderPartial('surat_perjanjian', ['model'=>$this->findModel($id)]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'content' => $content, 
            'options' => ['title' => 'Maklumat Kakitangan'],
            'methods' => [
                'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render();
    }

    // //Payroll Modul - Pengurusan Gaji
    // public function actionPengurusan_gaji()
    // {
    //     $searchModel = new PengurusanGajiSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('pengurusan_gaji', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    // public function actionPayroll_view($id)
    // {
    
    //     return $this->render('payroll_view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    // public function actionPayroll_update($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['payroll_view', 'id' => $model->id_staf]);
    //     } else {
    //         return $this->render('payroll_update', [
    //             'model' => $model,
    //         ]);
    //     }
    // }
    public function actionUploadpic()
    {
        $model = new MaklumatKakitangan();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model,'file');

            $model->file->saveAs('uploads/'.$model->file->baseName.'.'.$model->file->extension);

            $model->foto = $model->file->baseName.'.'.$model->file->extension;

            Image::thumbnail('@webroot/uploads/'.$model->foto, 300, 300)
                    ->save(Yii::getAlias('@webroot/uploads/'.$model->foto), ['quality' => 90]);
            $model->save();

            return $this->redirect(['view', 'id' => $model->id_staf]);
        } else {
            return $this->render('upload', [
                'model' => $model,
            ]);
        }
    }

    public function actionForm_wizard()
    {   Image::thumbnail('@webroot/image/default-image.png', 300, 300)
        // Image::crop(Yii::getAlias('tahfiz/web/uploads/5f2c3feabea5669672dc0eb358a21b7f1ed29021.jpg'))
                ->save(Yii::getAlias('@webroot/image/default-image.png'), ['quality' => 90]);
        // $model = new MaklumatKakitangan();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id_staf]);
        // } else {
        //     return $this->render('form_wizard', [
        //         'model' => $model,
        //     ]);
        // }
    }

    public function actionPrintstaff()
    {// {   $model = MaklumatKakitangan::find()
    //         ->joinWith(['nama_tahfiz']);

    //         $items = $model
    //             ->select([
    //                 'nama',
    //                 'no_kp',
    //                 'no_pekerja',
    //                 'jawatan_sekarang',
    //                 'lookup_pusat_pengajian.pusat_pengajian'])
    //             ->orderBy(['nama'=>SORT_ASC])
    //             ->where(['status_pekerjaan'=>1])
    //             ->all();
    //     print_r($items);
    //     exit();
        $model = MaklumatKakitangan::find()
                ->with('nama_tahfiz')
                ->orderBy(['nama'=>SORT_ASC])
                ->where(['status_pekerjaan'=>1])
                ->all();
    
        // return $this->renderPartial('printstaff', [
        //         'model' => $model,
        //     ]);
        $content = $this->renderPartial('printstaff', ['model'=>$model]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'content' => $content,
        //     'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // // any css to be embedded if required
        //     'cssInline' => '.kv-heading-1{font-size:9px}', 
            'options' => ['title' => 'Maklumat Kakitangan'],
            'methods' => [
                'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render();
    }

    public function actionPrintstaff_resign()
    {
        $model = MaklumatKakitangan::find()
                ->with('nama_tahfiz')
                ->orderBy(['nama'=>SORT_ASC])
                ->where(['status_pekerjaan'=>2])
                ->all();
    
        // return $this->renderPartial('printstaff', [
        //         'model' => $model,
        //     ]);
        $content = $this->renderPartial('printstaff_resign', ['model'=>$model]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'content' => $content,
        //     'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // // any css to be embedded if required
        //     'cssInline' => '.kv-heading-1{font-size:9px}', 
            'options' => ['title' => 'Maklumat Kakitangan'],
            'methods' => [
                'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render();
    }
    public function actionPrintsurat_tawaranpage()
    {
        $model = MaklumatKakitangan::find()
                ->with('nama_tahfiz')
                ->orderBy(['nama'=>SORT_ASC])
                ->where(['status_pekerjaan'=>1])
                ->all();
    
        // return $this->renderPartial('printstaff', [
        //         'model' => $model,
        //     ]);
        $content = $this->renderPartial('printsurat_tawaranpage', ['model'=>$model]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'content' => $content,
            'filename' => 'senarai_rujukan_tawaran.pdf',
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
            'cssInline' => '.head{font-size:12px;font-family:Arial}', 
            'options' => ['title' => 'Maklumat Kakitangan'],
            'methods' => [
                'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render();
    }

    public function getDeletemsg($nama)
    {
        Yii::$app->getSession()->setFlash('success', [
             'type' => Growl::TYPE_CUSTOM,
             'duration' => 5000,
             'icon' => 'glyphicon glyphicon-ok-sign',
             'message' => 'Padam Maklumat '.$nama.' Berjaya',
             'title' => 'Status',
             'positonY' => 'top',
             'positonX' => 'right',
             'options'=>['class'=>'note note-success'],
             // 'progressBarOptions' =>['class'=>'progress-bar progress-bar-success'],
         ]);
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
