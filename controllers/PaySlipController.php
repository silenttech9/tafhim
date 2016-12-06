<?php

namespace app\controllers;

use Yii;
use app\models\PaySlip;
use app\models\LookupKwsp11;
use app\models\LookupKwsp8;
use app\models\Perkeso;
use app\models\PaySlipSearch;
use app\models\MaklumatKakitanganSearch;
use app\models\MaklumatKakitangan;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use kartik\growl\Growl;
/**
 * PaySlipController implements the CRUD actions for PaySlip model.
 */
class PaySlipController extends Controller
{
    private $kwsp11;
    private $kwsp8;
    private $perkeso;
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
     * Lists all PaySlip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaySlipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PaySlip model.
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
     * Creates a new PaySlip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PaySlip();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pay_slip_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PaySlip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pay_slip_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PaySlip model.
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
     * Finds the PaySlip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PaySlip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaySlip::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLaporan_gaji()
    {
        return $this->render('laporan_gaji');
    }

    public function actionLaporan_epf()
    {
        return $this->render('laporan_epf');
    }

    public function actionLaporan_socso()
    {
        return $this->render('laporan_socso');
    }

    public function actionLaporan_tabung_kebajikan()
    {
        return $this->render('laporan_tabung_kebajikan');
    }

    public function actionLaporan_tabung_guru()
    {
        return $this->render('laporan_tabung_guru');
    }

    public function actionLaporan_ctg()
    {
        return $this->render('laporan_ctg');
    }

    public function actionLaporan_sewa()
    {
        return $this->render('laporan_sewa');
    }

    public function actionLaporan_kksk()
    {
        return $this->render('laporan_kksk');
    }

    public function actionLaporan_tbghaji()
    {
        return $this->render('laporan_tbghaji');
    }

    public function actionLaporan_bank()
    {
        return $this->render('laporan_bank');
    }

    public function getKwsp11()
    {
        $this->kwsp11 = LookupKwsp11::find()
                      ->all();

        return $this->kwsp11;
    }

    public function getKwsp8()
    {
        $this->kwsp8 = LookupKwsp8::find()
                      ->all();

        return $this->kwsp8;
    }

    public function getPerkeso()
    {
        $this->perkeso = Perkeso::find()
                        ->all();

        return $this->perkeso;
    }

    public function getNotify()
    {
         echo Growl::widget([
                'type' => Growl::TYPE_CUSTOM,
                'title' => ' Ralat !',
                'icon' => 'glyphicon glyphicon-remove-sign',
                'body' => 'Harap Maaf ! Tiada Maklumat Dijumpai.',
                'showSeparator' => true,
                'options'=>['class'=>'note note-warning'],
                'delay' => 100,
                'pluginOptions' => [
                    
                    'showProgressbar' => false,
                    'offset'=>['x'=>20,'y'=>250],
                    'animate' => [
                    'enter'=> 'animated bounceInDown',
                    'exit'=> 'animated bounceOutUp'
                ],
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ],
                ],
                
            ]);
        //return $this->notify;
    }

    public function getCustomflash($nama)
    {
        Yii::$app->getSession()->setFlash('success', [
             'type' => Growl::TYPE_CUSTOM,
             'duration' => 5000,
             'icon' => 'glyphicon glyphicon-ok-sign',
             'message' => 'Jana Gaji '.$nama.' Berjaya',
             'title' => 'Status',
             'positonY' => 'top',
             'positonX' => 'right',
             'options'=>['class'=>'note note-success'],
             // 'progressBarOptions' =>['class'=>'progress-bar progress-bar-success'],
         ]);
    }

    public function getDeleteflash($nama)
    {
        Yii::$app->getSession()->setFlash('success', [
             'type' => Growl::TYPE_CUSTOM,
             'duration' => 5000,
             'icon' => 'glyphicon glyphicon-ok-sign',
             'message' => 'Padam Slip Gaji '.$nama.' Berjaya',
             'title' => 'Status',
             'positonY' => 'top',
             'positonX' => 'right',
             'options'=>['class'=>'note note-success'],
             // 'progressBarOptions' =>['class'=>'progress-bar progress-bar-success'],
         ]);
    }

    public function actionGaji_bersih($tahun, $bulan)
    {

        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.peratus_kwsp'])  
                ->from('pay_slip')
                ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;
        if (empty($data)) {
           
            $this->getNotify(); //call function getNotify
            return $this->render('laporan_gaji');
        }
        else{
            foreach ($data as $key => $value) {
                $nama[$key] = $value['nama'];
                $gaji_asas[$key] = $value['gaji_asas'];
                $elaun_asas[$key] = $value['elaun_asas'];
                $elaun_rumah[$key] = $value['elaun_rumah'];
                $sewa_rumah[$key] = $value['sewa_rumah'];
                $tabung_haji[$key] = $value['tabung_haji'];
                $ctg[$key] = $value['ctg'];
                $kksk[$key] = $value['kksk'];
                $loan[$key] = $value['loan'];
                $peratus_kwsp[$key] = $value['peratus_kwsp'];
                $bonus[$key] = $value['bonus'];
                $staff_id[$key] = $value['staff_id'];

                if ($value['peratus_kwsp'] == 8) {
                    $kwsp = $this->getKwsp8();
                }
                else{
                    $kwsp = $this->getKwsp11();
                }

                $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

                //determine kwsp
                foreach ($kwsp as $value2) {
                    if(($gaji_kasar + $value['bonus']) >= $value2['dari'] && ($gaji_kasar + $value['bonus']) <= $value2['hingga'])
                    {
                        
                        $oleh_pekerja = $value2['oleh_pekerja'];
                        $oleh_majikan = $value2['oleh_majikan'];
                    }
                }

                $perkeso = $this->getPerkeso();
                //determine socso
                foreach ($perkeso as $value3)
                {
                    if ($gaji_kasar >= $value3['dari'] && $gaji_kasar <= $value3['hingga']) {
                        $syer_pekerja = $value3['syer_pekerja'];
                    }
                }

                 $epf[$key] = $oleh_pekerja;
                 $socso[$key] = $syer_pekerja;

                $tarikhmasa = $value['tarikhmasa'];
                $total_days = date("t",strtotime($value['tarikhmasa']));
                $total_gaji[$key] = $gaji_kasar;
                //$data['oleh_majikan'][$i] = 0-$oleh_majikan;
                $tabung_guru[$key] = $value['tabung_guru'];
                // $tempat_kerja[$key] = strtoupper(0-$value['tah']);
                $gaji_tahan[$key] = $value['gaji_tahan'];
                $hibah[$key] = $value['hibah'];
                $bonus[$key] = $value['bonus'];
                $lain[$key] = $value['lain'];
                $lain_tambahan[$key] = $value['lain_tambahan'];

                if($value['memo_ctg'] == "")
                {
                    $memo_ctg[$key] = "";
                }else
                {
                    $memo_ctg[$key] = "<em>(".$value['memo_ctg'].")</em>";
                }
                $pelarasan[$key] =  ($value['hibah'] + $value['bonus'] + $value['lain_tambahan']) - ($value['tabung_haji'] + $value['tabung_guru'] + $value['sewa_rumah'] + $value['kksk'] + $value['gaji_tahan'] + $value['lain'] + $value['loan']);

                $lain_jumlah[$key] = $lain_tambahan[$key] - $lain[$key];
                $gaji_bersih[$key] = ($gaji_kasar + $pelarasan[$key] - $oleh_pekerja - $syer_pekerja - ((($total_gaji[$key] + $gaji_tahan[$key]) / $total_days) * $ctg[$key]));
                $i++;
            }
            //exit();
            $bil = $i;

            if (Yii::$app->request->get('cetak'))
            {
                $content = $this->renderPartial('cetak_gaji_bersih', [
                    'gaji_asas' => $gaji_asas,
                    'nama' => $nama,
                    'elaun_asas' => $elaun_asas,
                    'elaun_rumah' => $elaun_rumah,
                    'sewa_rumah' => $sewa_rumah,
                    'tabung_haji' => $tabung_haji,
                    'ctg' => $ctg,
                    'kksk' => $kksk,
                    'loan' => $loan,
                    'kwsp' =>$kwsp,
                    'gaji_kasar' => $gaji_kasar,
                    'epf'=>$epf,
                    'socso' => $socso,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'total_days' => $total_days,
                    'total_gaji' => $total_gaji,
                    'tabung_guru' => $tabung_guru,
                    'tabung_haji' => $tabung_haji,
                    'bonus' => $bonus,
                    'lain_jumlah' => $lain_jumlah,
                    'memo_ctg' =>$memo_ctg,
                    'gaji_bersih' => $gaji_bersih,
                    'gaji_tahan' => $gaji_tahan,
                    'bil' => $bil,
                ]);

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'content' => $content,
                    'filename' => 'laporan_gaji_bersih_'.date("F",strtotime($tarikhmasa)).'_'.date("Y",strtotime($tarikhmasa)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:12px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | Gaji Bersih'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
            else{

                return $this->render('gaji_bersih', [
                    'gaji_asas' => $gaji_asas,
                    'nama' => $nama,
                    'elaun_asas' => $elaun_asas,
                    'elaun_rumah' => $elaun_rumah,
                    'sewa_rumah' => $sewa_rumah,
                    'tabung_haji' => $tabung_haji,
                    'ctg' => $ctg,
                    'kksk' => $kksk,
                    'loan' => $loan,
                    'kwsp' =>$kwsp,
                    'gaji_kasar' => $gaji_kasar,
                    'epf'=>$epf,
                    'socso' => $socso,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'total_days' => $total_days,
                    'total_gaji' => $total_gaji,
                    'tabung_guru' => $tabung_guru,
                    'tabung_haji' => $tabung_haji,
                    'bonus' => $bonus,
                    'lain_jumlah' => $lain_jumlah,
                    'memo_ctg' =>$memo_ctg,
                    'gaji_bersih' => $gaji_bersih,
                    'gaji_tahan' => $gaji_tahan,
                    'bil' => $bil,
                ]);
            }
        }
        
    }

    public function actionLihat_laporan_epf($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.peratus_kwsp','maklumat_kakitangan.no_kp','maklumat_kakitangan.no_kwsp'])  
                ->from('pay_slip')
                ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        if (empty($data)) {
           $this->getNotify(); //call function getNotify     
           return $this->render('laporan_epf');

        }
        else{
            foreach ($data as $key => $value) {
                $nama[$key] = $value['nama'];
                $no_kp[$key] = $value['no_kp'];
                $gaji_asas[$key] = $value['gaji_asas'];
                $elaun_asas[$key] = $value['elaun_asas'];
                $elaun_rumah[$key] = $value['elaun_rumah'];
                $peratus_kwsp[$key] = $value['peratus_kwsp'];
                $no_kwsp[$key] = $value['no_kwsp'];
                $bonus[$key] = $value['bonus'];
                $tarikhmasa = $value['tarikhmasa'];

                if ($value['peratus_kwsp'] == 8) {
                    $kwsp = $this->getKwsp8();
                }
                else{
                    $kwsp = $this->getKwsp11();
                }

                $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

                //determine kwsp
                foreach ($kwsp as $value2) {
                    if(($gaji_kasar + $value['bonus']) >= $value2['dari'] && ($gaji_kasar + $value['bonus']) <= $value2['hingga'])
                    {
                        
                        $oleh_pekerja = $value2['oleh_pekerja'];
                        $oleh_majikan = $value2['oleh_majikan'];
                        $jumlah_caruman = $value2['jumlah_caruman'];
                    }
                }

                $epf[$key] = $oleh_pekerja;
                $contribution[$key] = $oleh_majikan;
                $jumlah[$key] = $jumlah_caruman;
                $gaji[$key] = $gaji_kasar;

                $i++;
            }
            $bil = $i;

            if (Yii::$app->request->get('cetak')){
                $content = $this->renderPartial('cetak_laporanepf', [
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'no_kwsp' => $no_kwsp,
                    'epf'=>$epf,
                    'contribution' => $contribution,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'jumlah' => $jumlah,
                    'gaji' => $gaji,
                    'bil' => $bil,
                ]);

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'content' => $content,
                    'filename' => 'laporan_epf_'.date("F",strtotime($tarikhmasa)).'_'.date("Y",strtotime($tarikhmasa)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:10px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | EPF'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
            else{
                return $this->render('lihat_laporan_epf', [
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'no_kwsp' => $no_kwsp,
                    'epf'=>$epf,
                    'contribution' => $contribution,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'jumlah' => $jumlah,
                    'gaji' => $gaji,
                    'bil' => $bil,
                ]);
            }
        }
        
    }

    public function actionLihat_laporan_socso($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>date("Y-n-t",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"))])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        if (empty($data)) {
           $this->getNotify(); //call function getNotify  
           return $this->render('laporan_socso');

        }
        else{
            foreach ($data as $key => $value) {
                $nama[$key] = $value['nama'];
                $no_kp[$key] = $value['no_kp'];
                $gaji_asas[$key] = $value['gaji_asas'];
                $elaun_asas[$key] = $value['elaun_asas'];
                $elaun_rumah[$key] = $value['elaun_rumah'];
                $tarikhmasa = $value['tarikhmasa'];

                $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

                $perkeso = $this->getPerkeso();
                //determine socso
                foreach ($perkeso as $value3)
                {
                    if ($gaji_kasar >= $value3['dari'] && $gaji_kasar <= $value3['hingga']) {
                        $syer_pekerja = $value3['syer_pekerja'];
                        $syer_majikan = $value3['syer_majikan'];
                        $jumlah_caruman = $value3['jumlah_caruman'];
                    }
                }

                $socso[$key] = $syer_pekerja;
                $contribution[$key] = $syer_majikan;
                $jumlah[$key] = $jumlah_caruman;
                $gaji[$key] = $gaji_kasar;

                $i++;
            }
            $bil = $i;


            if (Yii::$app->request->get('cetak'))
            {
                $content = $this->renderPartial('cetak_laporansocso', [
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'socso'=>$socso,
                    'contribution' => $contribution,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'jumlah' => $jumlah,
                    'gaji' => $gaji,
                    'bil' => $bil,
                ]);

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'content' => $content,
                    'filename' => 'laporan_socso_'.date("F",strtotime($tarikhmasa)).'_'.date("Y",strtotime($tarikhmasa)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:10px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | SOCSO'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
            else{
               return $this->render('lihat_laporan_socso', [
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'socso'=>$socso,
                    'contribution' => $contribution,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'jumlah' => $jumlah,
                    'gaji' => $gaji,
                    'bil' => $bil,
                ]); 
            }
        }

    }

    public function actionLihat_laporan_tabung_kebajikan($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.loan','pay_slip.tarikhmasa', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.loan',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;
        if (empty($data)) {
           $this->getNotify(); //call function getNotify        
           return $this->render('laporan_tabung_kebajikan');

        }
        else{
            foreach ($data as $key => $value) {
                $nama[$key] = $value['nama'];
                $no_kp[$key] = $value['no_kp'];
                $loan[$key] = $value['loan'];
                $tarikhmasa = $value['tarikhmasa'];

                $i++;
            }

            $bil = $i;

            if (Yii::$app->request->get('cetak')){
                $content = $this->renderPartial('cetak_laporantabung_kebajikan', [
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'loan'=>$loan,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'bil' =>$bil,
                ]);

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'content' => $content,
                    'filename' => 'laporan_tabung_kebajikan_'.date("F",strtotime($tarikhmasa)).'_'.date("Y",strtotime($tarikhmasa)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:10px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | Tabung Kebajikan'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
            else{
                return $this->render('lihat_laporan_tabung_kebajikan',[
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'loan'=>$loan,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'bil' =>$bil,

                ]);
            }
        }
        
    }

    public function actionLihat_laporan_tabung_guru($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.tabung_guru','pay_slip.tarikhmasa', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.tabung_guru',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        if (empty($data)) {
           $this->getNotify(); //call function getNotify        
           return $this->render('laporan_tabung_guru');

        }
        else{
            foreach ($data as $key => $value) {
                $nama[$key] = $value['nama'];
                $no_kp[$key] = $value['no_kp'];
                $tabung_guru[$key] = $value['tabung_guru'];
                $tarikhmasa = $value['tarikhmasa'];

                $i++;
            }

            $bil = $i;

            if (Yii::$app->request->get('cetak')){
                $content = $this->renderPartial('cetak_laporantabung_guru', [
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'tabung_guru'=>$tabung_guru,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'bil' =>$bil,
                ]);

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'content' => $content,
                    'filename' => 'laporan_tabung_guru_'.date("F",strtotime($tarikhmasa)).'_'.date("Y",strtotime($tarikhmasa)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:10px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | Tabung Guru'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
            else{
                return $this->render('lihat_laporan_tabung_guru',[
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'tabung_guru'=>$tabung_guru,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'bil' =>$bil,

                ]);
            }
        }
        
    }

    public function actionLihat_laporan_ctg($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.ctg',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        if (empty($data)) {
           $this->getNotify(); //call function getNotify        
           return $this->render('laporan_ctg');

        }
        else{
            foreach ($data as $key => $value) {
                $nama[$key] = $value['nama'];
                $no_kp[$key] = $value['no_kp'];
                $tarikhmasa = $value['tarikhmasa'];
                $gaji_asas[$key] = $value['gaji_asas'];
                $elaun_asas[$key] = $value['elaun_asas'];
                $elaun_rumah[$key] = $value['elaun_rumah'];
                $total_days = date("t",strtotime($value['tarikhmasa']));

                $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

                $ctg[$key] = (($gaji_kasar - $value['gaji_tahan'])/ $total_days) * $value['ctg'];

                $i++;
            }

            $bil = $i;

            if (Yii::$app->request->get('cetak')){
                $content = $this->renderPartial('cetak_laporan_ctg', [
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'ctg'=>$ctg,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'bil' =>$bil,
                ]);

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'content' => $content,
                    'filename' => 'laporan_cuti_tanpa_gaji_'.date("F",strtotime($tarikhmasa)).'_'.date("Y",strtotime($tarikhmasa)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:10px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | Cuti Tanpa Gaji'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
            else{
                return $this->render('lihat_laporan_ctg',[
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'ctg'=>$ctg,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'bil' =>$bil,

                ]);
            }
        }
        
    }

    public function actionLihat_laporan_sewa($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.sewa_rumah',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        if (empty($data)) {
           $this->getNotify(); //call function getNotify        
           return $this->render('laporan_sewa');

        }
        else{
           foreach ($data as $key => $value) {
                $nama[$key] = $value['nama'];
                $no_kp[$key] = $value['no_kp'];
                $tarikhmasa = $value['tarikhmasa'];
                $sewa_rumah[$key] = $value['sewa_rumah'];
                $total_days = date("t",strtotime($value['tarikhmasa']));

                $i++;
            }

            $bil = $i;

            if (Yii::$app->request->get('cetak')){
                $content = $this->renderPartial('cetak_laporan_sewa', [
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'sewa_rumah' => $sewa_rumah,
                    'tarikhmasa' => $tarikhmasa,
                    'bil' => $bil,
                ]);

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    'content' => $content,
                    'filename' => 'laporan_sewa_rumah_'.date("F",strtotime($tarikhmasa)).'_'.date("Y",strtotime($tarikhmasa)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:10px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | Sewa Rumah'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
            else{
                return $this->render('lihat_laporan_sewa',[
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'sewa_rumah' => $sewa_rumah,
                    'tarikhmasa' => $tarikhmasa,
                    'bil' => $bil,
                ]);
            } 
        }
        
    }

    public function actionLihat_laporan_kksk($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.kksk',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        if (empty($data)) {
           $this->getNotify(); //call function getNotify        
           return $this->render('laporan_kksk');

        }
        else{
            foreach ($data as $key => $value) {
                $nama[$key] = $value['nama'];
                $no_kp[$key] = $value['no_kp'];
                $tarikhmasa = $value['tarikhmasa'];
                $kksk[$key] = $value['kksk'];
                $total_days = date("t",strtotime($value['tarikhmasa']));

                $i++;
            }

            $bil = $i;

            if (Yii::$app->request->get('cetak')){
                $content = $this->renderPartial('cetak_laporan_kksk', [
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'kksk' => $kksk,
                    'tarikhmasa' => $tarikhmasa,
                    'bil' => $bil,
                ]);

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    // 'destination' => D, 
                    'content' => $content,
                    'filename' => 'laporan_KKSK_'.date("F",strtotime($tarikhmasa)).'_'.date("Y",strtotime($tarikhmasa)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:10px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | KKSK'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
            else{
                return $this->render('lihat_laporan_kksk',[
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'kksk' => $kksk,
                    'tarikhmasa' => $tarikhmasa,
                    'bil' => $bil,
                ]);
            }
        }
        
    }

    public function actionLihat_laporan_tbghaji($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp','maklumat_kakitangan.acc_tabung_haji'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.tabung_haji',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        if (empty($data)) {
           $this->getNotify(); //call function getNotify        
           return $this->render('laporan_tbghaji');

        }
        else{
            foreach ($data as $key => $value) {
                $nama[$key] = $value['nama'];
                $no_kp[$key] = $value['no_kp'];
                $tarikhmasa = $value['tarikhmasa'];
                $tbghaji[$key] = $value['tabung_haji'];
                $acchaji[$key] = $value['acc_tabung_haji'];
                $total_days = date("t",strtotime($value['tarikhmasa']));

                $i++;
            }

            $bil = $i;

            if (Yii::$app->request->get('cetak')){
                $content = $this->renderPartial('cetak_laporan_tbghaji', [
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tbghaji' => $tbghaji,
                    'tarikhmasa' => $tarikhmasa,
                    'acchaji' => $acchaji,
                    'bil' => $bil,
                ]);

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    // 'destination' => D, 
                    'content' => $content,
                    'filename' => 'laporan_Tabung_Haji_'.date("F",strtotime($tarikhmasa)).'_'.date("Y",strtotime($tarikhmasa)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:10px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | Tabung Haji'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
            else{
                return $this->render('lihat_laporan_tbghaji',[
                    'nama' => $nama,
                    'no_kp' => $no_kp,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tbghaji' => $tbghaji,
                    'tarikhmasa' => $tarikhmasa,
                    'acchaji' => $acchaji,
                    'bil' => $bil,
                ]);
            }
        }
        
    }

    public function actionLihat_laporan_bank($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.peratus_kwsp','maklumat_kakitangan.acc_bimb','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        if (empty($data)) {
           $this->getNotify(); //call function getNotify        
           return $this->render('laporan_bank');

        }
        else{
            foreach ($data as $key => $value) {
                $nama[$key] = $value['nama'];
                $no_kp[$key] = $value['no_kp'];
                $acc_bimb[$key] = $value['acc_bimb'];
                $gaji_asas[$key] = $value['gaji_asas'];
                $elaun_asas[$key] = $value['elaun_asas'];
                $elaun_rumah[$key] = $value['elaun_rumah'];
                $sewa_rumah[$key] = $value['sewa_rumah'];
                $tabung_haji[$key] = $value['tabung_haji'];
                $ctg[$key] = $value['ctg'];
                $kksk[$key] = $value['kksk'];
                $loan[$key] = $value['loan'];
                $peratus_kwsp[$key] = $value['peratus_kwsp'];
                $bonus[$key] = $value['bonus'];
                $staff_id[$key] = $value['staff_id'];

                if ($value['peratus_kwsp'] == 8) {
                    $kwsp = $this->getKwsp8();
                }
                else{
                    $kwsp = $this->getKwsp11();
                }

                $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

                //determine kwsp
                foreach ($kwsp as $value2) {
                    if(($gaji_kasar + $value['bonus']) >= $value2['dari'] && ($gaji_kasar + $value['bonus']) <= $value2['hingga'])
                    {
                        
                        $oleh_pekerja = $value2['oleh_pekerja'];
                        $oleh_majikan = $value2['oleh_majikan'];
                    }
                }

                $perkeso = $this->getPerkeso();
                //determine socso
                foreach ($perkeso as $value3)
                {
                    if ($gaji_kasar >= $value3['dari'] && $gaji_kasar <= $value3['hingga']) {
                        $syer_pekerja = $value3['syer_pekerja'];
                    }
                }

                 $epf[$key] = $oleh_pekerja;
                 $socso[$key] = $syer_pekerja;

                $tarikhmasa = $value['tarikhmasa'];
                $total_days = date("t",strtotime($value['tarikhmasa']));
                $total_gaji[$key] = $gaji_kasar;
                //$data['oleh_majikan'][$i] = 0-$oleh_majikan;
                $tabung_guru[$key] = $value['tabung_guru'];
                // $tempat_kerja[$key] = strtoupper(0-$value['tah']);
                $gaji_tahan[$key] = $value['gaji_tahan'];
                $hibah[$key] = $value['hibah'];
                $bonus[$key] = $value['bonus'];
                $lain[$key] = $value['lain'];
                $lain_tambahan[$key] = $value['lain_tambahan'];

                if($value['memo_ctg'] == "")
                {
                    $memo_ctg[$key] = "";
                }else
                {
                    $memo_ctg[$key] = "<em>(".$value['memo_ctg'].")</em>";
                }
                $pelarasan[$key] =  ($value['hibah'] + $value['bonus'] + $value['lain_tambahan']) - ($value['tabung_haji'] + $value['tabung_guru'] + $value['sewa_rumah'] + $value['kksk'] + $value['gaji_tahan'] + $value['lain'] + $value['loan']);

                $lain_jumlah[$key] = $lain_tambahan[$key] - $lain[$key];
                $gaji_bersih[$key] = ($gaji_kasar + $pelarasan[$key] - $oleh_pekerja - $syer_pekerja - ((($total_gaji[$key] + $gaji_tahan[$key]) / $total_days) * $ctg[$key]));
                $i++;
            }

            $bil = $i;
            

            if (Yii::$app->request->get('cetak')){
                $content = $this->renderPartial('cetak_laporan_bank', [
                    'gaji_asas' => $gaji_asas,
                    'nama' => $nama,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'total_days' => $total_days,
                    'gaji_bersih' => $gaji_bersih,
                    'acc_bimb' => $acc_bimb,
                    'no_kp' => $no_kp,
                    'bil' => $bil,
                ]);

                $pdf = new Pdf([
                    'mode' => Pdf::MODE_UTF8,
                    // 'destination' => D, 
                    'content' => $content,
                    'filename' => 'laporan_bank_'.date("F",strtotime($tarikhmasa)).'_'.date("Y",strtotime($tarikhmasa)).'.pdf',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                    'cssInline' => '.main{font-size:10px;font-family:courier}.head{font-size:15px;font-family:courier}',
                    'options' => ['title' => 'Laporan | Bank'],
                    'methods' => [
                        'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                        'SetFooter'=>['{PAGENO}'],
                    ]
                ]);
                return $pdf->render();
            }
            else{
                return $this->render('lihat_laporan_bank', [
                    'gaji_asas' => $gaji_asas,
                    'nama' => $nama,
                    'tahun' => $_GET['tahun'],
                    'bulan' => $_GET['bulan'],
                    'tarikhmasa' => $tarikhmasa,
                    'total_days' => $total_days,
                    'gaji_bersih' => $gaji_bersih,
                    'acc_bimb' => $acc_bimb,
                    'no_kp' => $no_kp,
                    'bil' => $bil,
                ]);
            }
        }

        
    }

    public function actionProses_gaji()
    {
        // $tahun = date("Y",time());
        // $bulan = date("m",time());
        // // $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));
        // //     $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan));
        // // print($tarikh);
        // // exit();

        // if (Yii::$app->request->get('bulan')) {
        //     $tarikh = date("Y-n-t",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
        //     $bulansemasa = $_GET['bulan'];
        //     $tahunsemasa = $_GET['tahun'];


        // }
        // else{
        //     $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan));
        //     $bulansemasa = $bulan;
        //     $tahunsemasa = $tahun;
        // }
        // $query = new Query;
        // $query->select(['maklumat_kakitangan.id_staf','maklumat_kakitangan.nama','maklumat_kakitangan.no_pekerja','pay_slip.pay_slip_id'])  
        //         ->from('pay_slip')
        //         ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
        //         ->where(['pay_slip.tarikhmasa'=>$tarikh])
        //         //->andWhere(['maklumat_kakitangan.status_pekerjaan' => 1])
        //         ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
        // $command = $query->createCommand();
        // $data = $command->queryAll();

        // $staff = MaklumatKakitangan::find()
        //         ->where(['status_pekerjaan' => "1"])
        //         ->orderBy(['nama'=>SORT_ASC])
        //         ->all();
        // $payslip = PaySlip::find()
        //          ->where(['tarikhmasa'=>$tarikh])
        //          ->count();
        // $total = count($staff);

        // return $this->render('proses_gaji', [
        //     'data' => $data,
        //     'tarikh' => $tarikh,
        //     'bulansemasa' => $bulansemasa,
        //     'tahunsemasa' => $tahunsemasa,
        //     'total' => $total,
        //     'payslip' => $payslip,
        // ]);
        $tahun = date("Y",time());
        $bulan = date("m",time());

        if (Yii::$app->request->get('bulan')) {
            $tarikh = date("Y-n-t",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
            $tarikhbulan = date("Y-m",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
            $bulansemasa = $_GET['bulan'];
            $tahunsemasa = $_GET['tahun'];

        }
        else{
            $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan));
            $tarikhbulan = date("Y-m",strtotime($tahun."-".$bulan));
            $bulansemasa = $bulan;
            $tahunsemasa = $tahun;


        }

        $model = MaklumatKakitangan::find()
                ->where(['status_pekerjaan'=>1])
                ->orderBy(['nama'=>SORT_ASC])
                ->all();
        return $this->render('proses_gaji', [
                'model' => $model,
                'bulansemasa' => $bulansemasa,
                'tahunsemasa' => $tahunsemasa,
                'tarikh' => $tarikh,
                'tarikhbulan' => $tarikhbulan,
            ]);

    }

    public function actionProses_gaji_carian()
    {
        // print('adad');
        // exit();
        $tahun = date("Y",time());
        $bulan = date("m",time());

        if (Yii::$app->request->get('bulan')) {
            $tarikh = date("Y-n-t",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
            $tarikhbulan = date("Y-m",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
            $bulansemasa = $_GET['bulan'];
            $tahunsemasa = $_GET['tahun'];

            if (Yii::$app->request->get('nama')) {
                $model = MaklumatKakitangan::find()
                ->where(['status_pekerjaan'=>1])
                ->andWhere(['nama'=>$_GET['nama']])
                ->orderBy(['nama'=>SORT_ASC])
                ->all();
            }
            else if (Yii::$app->request->get('no_kp')) {
                $model = MaklumatKakitangan::find()
                ->where(['status_pekerjaan'=>1])
                ->andWhere(['no_kp'=>$_GET['no_kp']])
                ->orderBy(['nama'=>SORT_ASC])
                ->all();
            }
            else if (Yii::$app->request->get('no_pekerja')) {
                $model = MaklumatKakitangan::find()
                ->where(['status_pekerjaan'=>1])
                ->andWhere(['no_pekerja'=>$_GET['no_pekerja']])
                ->orderBy(['nama'=>SORT_ASC])
                ->all();
            }
            else{
                $model = MaklumatKakitangan::find()
                ->where(['status_pekerjaan'=>1])
                ->orderBy(['nama'=>SORT_ASC])
                ->all();
            }

        }
        else{
            $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan));
            $tarikhbulan = date("Y-m",strtotime($tahun."-".$bulan));
            $bulansemasa = $bulan;
            $tahunsemasa = $tahun;

            $model = MaklumatKakitangan::find()
                ->where(['status_pekerjaan'=>1])
                ->orderBy(['nama'=>SORT_ASC])
                ->all();

        }


        return $this->render('proses_gaji', [
                'model' => $model,
                'bulansemasa' => $bulansemasa,
                'tahunsemasa' => $tahunsemasa,
                'tarikh' => $tarikh,
                'tarikhbulan' => $tarikhbulan,
            ]);
    }

    public function actionCetak_payslip($id)
    {   
        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.peratus_kwsp','maklumat_kakitangan.no_pekerja','maklumat_kakitangan.no_kp','lookup_pusat_pengajian.pusat_pengajian'])  
                ->from('pay_slip')
                ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->leftJoin('lookup_pusat_pengajian','maklumat_kakitangan.tahfiz = lookup_pusat_pengajian.id')
                ->where(['pay_slip.pay_slip_id'=>$id]);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $oleh_pekerja = 0;
            $syer_pekerja = 0;
            $no_pekerja = $value["no_pekerja"]; 
            $nama = $value["nama"];    
            $no_kp = $value["no_kp"];
            $pusat_pengajian = $value['pusat_pengajian']; 
            $gaji_asas = $value["gaji_asas"];
            $elaun_asas = $value["elaun_asas"];
            $elaun_rumah = $value["elaun_rumah"];
            $sewa_rumah = $value['sewa_rumah'];
            $tabung_haji = $value['tabung_haji'];
            $tarikhmasa = $value['tarikhmasa'];
            $kksk = $value['kksk'];
            $ctg = $value['ctg'];
            $loan = $value['loan'];
            $cuti_ehsan = $value['cuti_ehsan'];
            $cuti_sakit = $value['cuti_sakit'];

            if($value['peratus_kwsp'] == 8)
            {
                $kwsp = $this->getKwsp8();
            }
            else
            {
                $kwsp = $this->getKwsp11();
            }
            $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

            //determine kwsp
            foreach ($kwsp as $value2) {
                if(($gaji_kasar + $value['bonus']) >= $value2['dari'] && ($gaji_kasar + $value['bonus']) <= $value2['hingga'])
                {
                    
                    $oleh_pekerja = $value2['oleh_pekerja'];
                    $oleh_majikan = $value2['oleh_majikan'];
                }
            }
            $perkeso = $this->getPerkeso();
            //determine socso
            foreach ($perkeso as $value3)
            {
                if ($gaji_kasar >= $value3['dari'] && $gaji_kasar <= $value3['hingga']) {
                    $syer_pekerja = $value3['syer_pekerja'];
                }
            }

            $total_gaji = $gaji_kasar;
            $epf = $oleh_pekerja;
            $carumanmajikan = $oleh_majikan;
            $socso = $syer_pekerja;
            $tabung_guru = $value['tabung_guru'];
            $tahfiz = strtoupper($value['pusat_pengajian']);
            $gaji_tahan = $value['gaji_tahan'];
            $hibah = $value['hibah'];
            $bonus = $value['bonus'];
            $lain = $value['lain'];
            $lain_tambahan = $value['lain_tambahan'];
            if($value['memo_ctg'] == "")
            {
                $memo_ctg = "";
            }
            else
            {
                $memo_ctg = "<em>(".$value['memo_ctg'].")</em>";
            }
            $pelarasan =  ($value['hibah'] + $value['bonus'] + $value['lain_tambahan']) - ($value['tabung_haji'] + $value['tabung_guru'] + $value['sewa_rumah'] + $value['kksk'] + $value['gaji_tahan']+ $value['lain']+$value['loan']);
            $gaji_bersih = ($gaji_kasar + $value['hibah'] + $value['bonus'] + $value['lain_tambahan']) - ($value['tabung_haji'] + $value['tabung_guru'] + $value['sewa_rumah'] + $value['kksk'] + $value['gaji_tahan']+ $value['lain']+$value['loan']);
            $i++;
        }

        $bil = $i;

        $content = $this->renderPartial('cetak_payslip', [
            'gaji_asas' => $gaji_asas,
            'nama' => $nama,
            // 'tahun' => $_GET['tahun'],
            // 'bulan' => $_GET['bulan'],
            'tarikhmasa' => $tarikhmasa,
            // 'total_days' => $total_days,
            'gaji_bersih' => $gaji_bersih,
            // 'acc_bimb' => $acc_bimb,
            'no_kp' => $no_kp,
            'bil' => $bil,
            'tahfiz' => $tahfiz,
            'no_pekerja' => $no_pekerja,
            'total_gaji' => $total_gaji,
            'hibah' => $hibah,
            'bonus' => $bonus,
            'lain_tambahan' => $lain_tambahan,
            'tabung_guru' => $tabung_guru,
            'gaji_tahan' => $gaji_tahan,
            'lain' => $lain,
            'memo_ctg' => $memo_ctg,
            'pelarasan' => $pelarasan,
            'kksk' => $kksk,
            'tabung_haji' => $tabung_haji,
            'cuti_ehsan' => $cuti_ehsan,
            'cuti_sakit' => $cuti_sakit,
            'ctg' => $ctg,
            'loan' => $loan,
            'sewa_rumah' => $sewa_rumah,
            'carumanmajikan' => $carumanmajikan,
            'epf' => $epf,
            'socso' => $socso,
            'gaji_kasar' => $gaji_kasar,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'content' => $content,
            'filename' => 'slip_gaji_'.$nama.'.pdf',
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
            'cssInline' => '.main{font-size:11px;font-family:courier}.head{font-size:15px;font-family:courier}',
            'options' => ['title' => 'Slip Gaji | '.$nama],
            'methods' => [
                'SetHeader'=>['Tarikh Cetakan '.date("d/m/Y")],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render();

        // return $this->renderPartial('cetak_payslip', [
            
        // ]);
    }

    public function actionDelete_payslip($id,$tahun,$bulan)
    {
        if (Yii::$app->request->get('page') == 'staf_aktif') {
            $model = $this->findModel($id);
            $model2 = MaklumatKakitangan::find()
                    ->where(['id_staf'=>$model->staff_id])
                    ->one();

            $model->delete();

            $this->getDeleteflash($model2->nama); // call function getCustomflash
            return $this->redirect(['proses_gaji','tahun'=>$tahun,'bulan'=>$bulan]);
        }
        else if (Yii::$app->request->get('page') == 'staf_tidak_aktif') {
            $model = $this->findModel($id);
            $model2 = MaklumatKakitangan::find()
                    ->where(['id_staf'=>$model->staff_id])
                    ->one();

            $model->delete();

            $this->getDeleteflash($model2->nama); // call function getCustomflash
            return $this->redirect(['payslip_tidak_aktif','tahun'=>$tahun,'bulan'=>$bulan]);
        }
        // else{
        //     $this->findModel($id)->delete();

        //     return $this->redirect(['proses_gaji','tahun'=>$tahun,'bulan'=>$bulan]);
        // }
        
    }

    public function actionJana_payslip()
    {   
        $tahun = date("Y",time());
        $bulan = date("m",time());

        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan));

        $staff = MaklumatKakitangan::find()
                ->where(['status_pekerjaan' => "1"])
                ->orderBy(['nama'=>SORT_ASC])
                ->all();
        $payslip = PaySlip::find()
                 ->where(['tarikhmasa'=>$tarikh])
                 ->count();
        $total = count($staff);

        return $this->render('jana_payslip',[
                'staff' => $staff,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'tarikh' => $tarikh,
                'payslip' => $payslip,
                'total' => $total,
            ]);
    }

    public function actionGenerate_gajiform($id,$tahun,$bulan)
    {
        $tarikhmasa = date("Y-m-t",strtotime($tahun."-".$bulan));
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan));
        $referer = $_GET['referer'];

        $model2 = new PaySlip();
        $model = MaklumatKakitangan::find()
                ->where(['id_staf'=>$id])
                ->one();
        
        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post())) {

            if ($model->save()) {
                $model2->staff_id = $_POST['payslip']['staff_id'];
                $model2->gaji_asas = $model->gaji_asas;
                $model2->elaun_rumah = $model->elaun_rumah;
                $model2->elaun_asas = $model->elaun_asas;
                $model2->sewa_rumah = $model->sewa_rumah;
                $model2->gaji_tahan = $model->gaji_tahan;
                $model2->tabung_haji = $model->tabung_gaji;
                $model2->tabung_guru = $model->tabung_guru;
                $model2->kksk = $model->kksk;
                $model2->loan = $model->loan;
                $model2->tarikhmasa = $tarikhmasa;

                $model2->save();
            }

            if ($referer == 'staf_aktif') {
                
                $this->getCustomflash($model->nama); // call function getCustomflash
                return $this->redirect(['proses_gaji','tahun'=>$tahun,'bulan'=>$bulan]);
            }
            else if ($referer == 'bulansemasa'){
                $this->getCustomflash($model->nama); // call function getCustomflash
                return $this->redirect(['jana_payslip', 'tahun' => $tahun,'bulan'=>$bulan]);
            }
            else{
                $this->getCustomflash($model->nama); // call function getCustomflash
                return $this->redirect(['payslip_tidak_aktif', 'tahun' => $tahun,'bulan'=>$bulan]);
            }
            
        } else {
            return $this->render('generate_gajiform',[
                'model' => $model,
                'model2' => $model2,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'tarikh' => $tarikh,
            ]);
        }
    }

    public function actionPayslip_tidak_aktif()
    {
        $tahun = date("Y",time());
        $bulan = date("m",time());

        if (Yii::$app->request->get('bulan')) {
            $tarikh = date("Y-n-t",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
            $tarikhbulan = date("Y-m",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"));
            $bulansemasa = $_GET['bulan'];
            $tahunsemasa = $_GET['tahun'];

        }
        else{
            $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan));
            $tarikhbulan = date("Y-m",strtotime($tahun."-".$bulan));
            $bulansemasa = $bulan;
            $tahunsemasa = $tahun;


        }

        $model = MaklumatKakitangan::find()
                ->where(["like",'tarikh_resign',$tarikhbulan])
                ->andWhere(['status_pekerjaan'=>2])
                ->all();
        return $this->render('payslip_tidak_aktif', [
                'model' => $model,
                'bulansemasa' => $bulansemasa,
                'tahunsemasa' => $tahunsemasa,
                'tarikh' => $tarikh,
            ]);
    }

    //Payroll Modul - Pengurusan Gaji
    public function actionPengurusan_gaji()
    {
        $searchModel = new MaklumatKakitanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status_pekerjaan'=>1]);

        return $this->render('pengurusan_gaji', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPayroll_view($id)
    {
        $model = MaklumatKakitangan::find()
                ->where(['id_staf'=> $id])
                ->one();
    
        return $this->render('payroll_view', [
            'model' => $model,
        ]);
    }

    public function actionPayroll_update($id)
    {
        $model = MaklumatKakitangan::find()
                ->where(['id_staf'=> $id])
                ->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('kewangan-success', 'Kemaskini Maklumat Kewangan Kakitangan Berjaya');
            return $this->redirect(['pengurusan_gaji', 'id' => $model->id_staf]);
        } else {
            return $this->render('payroll_update', [
                'model' => $model,
            ]);
        }
    }

    public function actionMaklumat_kewangan()
    {
        $model = MaklumatKakitangan::find()
                ->where(['status_pekerjaan'=> 1])
                ->all();

        if (!empty($_POST['nama'])) {
            $staf = MaklumatKakitangan::find()
                    ->where(['id_staf'=> $_POST['nama']])
                    ->one();
            $staf->gaji_asas = $_POST['gaji_asas'];

            print($staf->gaji_asas);
            exit();
        }
        else{
            return $this->render('maklumat_kewangan', [
                    'model' => $model,
                ]);
        }
    }

}

