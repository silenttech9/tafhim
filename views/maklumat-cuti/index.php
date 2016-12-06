<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatCutiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maklumat Cuti';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Pengurusan Kakitangan <small>Maklumat Cuti</small></h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">

                    <span class="caption-subject bold uppercase">Carian</span>
                </div>
                
            </div>
            <div class="portlet-body" >

            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-calendar"></i>Senarai Maklumat Cuti
                </div>
                <div class="tools actions">
                    <div class="btn-group">
                        <a class="btn dark btn-outline btn-sm dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Tindakan
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <?= Html::a('Tambah Baru', ['create'], ['class' => '#']) ?>
                            </li>
                        </ul>
                    </div>
                    <a href="" class="collapse"> </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <?php if(Yii::$app->session->hasFlash('maklumatcuti-success')):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"></button>
                     <?php echo  Yii::$app->session->getFlash('maklumatcuti-success'); ?>
                </div>
            <?php endif; ?>
            <div class="portlet-body">
                <div class="maklumat-cuti-index">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                       // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'nama_kakitangan.nama',
                            'cuti.jenis_cuti',
                            'tahun',
                            'bulan',
                            // 'bilangan_cuti',
                            [
                                'header' => 'Tindakan',
                                'class' => 'yii\grid\ActionColumn',
                                'template'=>' {view} {update} {delete}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a('<i class="fa fa fa-file-o"></i>', 
                                            $url,['title'=> Yii::t('app','Lihat'),'class'=>'btn btn-circle btn-icon-only green-meadow']);

                                    },
                                    'update' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-pencil"></i>', 
                                            $url,['title'=> Yii::t('app','Kemaskini'),'class'=>'btn btn-circle btn-icon-only btn-primary']);

                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-trash"></i>', 
                                            $url,['title'=> Yii::t('app','Hapus'),'class'=>'btn btn-circle btn-icon-only btn-danger','data-confirm'=>"Adakah Anda Pasti Mahu Hapuskan Item Ini ?",'data-method' => 'post']);

                                    },

                                ],
                            ],

                            //['class' => 'yii\grid\ActionColumn'],
                        ],
                        'tableOptions' =>['class' => 'table table-striped table-hover'],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

