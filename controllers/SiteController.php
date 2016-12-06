<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MaklumatPelajar;
use app\models\MaklumatPelajarPenjaga;
use app\models\MaklumatPilihanPusatPengajian;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT COUNT(maklumat_pelajar_penjaga.id)AS total,lookup_pusat_pengajian.pusat_pengajian
FROM maklumat_pelajar_penjaga 
LEFT JOIN lookup_pusat_pengajian ON maklumat_pelajar_penjaga.pusat_pengajian_id = lookup_pusat_pengajian.id
GROUP BY maklumat_pelajar_penjaga.pusat_pengajian_id");

        $model = $sql->queryAll();

        return $this->render('index',[
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
         $this->layout = 'login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $this->layout = 'signup';
        $model = new MaklumatPelajarPenjaga();
        $model2 = new MaklumatPilihanPusatPengajian();

        if($model->load(Yii::$app->request->post()) && $model->validate() && $model2->load(Yii::$app->request->post()))
        {
            $model->status="Pending";
            $model->date_create = date('Y/m/d');

            if($model->save()){

                $last_id = Yii::$app->db->getLastInsertID();
                
                $model2->id_pelajar = $last_id;

                $model2->save();

            }
            Yii::$app->getSession()->setFlash('create', 'Maklumat Pelajar <b>('.$model->nama_pelajar.')</b> Berjaya Di Simpan');
            return $this->redirect(['signup']);
        } else {
            return $this->render('signup', [
                'model' => $model,
                'model2' => $model2,
            ]);
        }
        
    
    }



    
}
