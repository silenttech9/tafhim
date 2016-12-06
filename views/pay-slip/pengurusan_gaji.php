<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatKakitanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengurusan Gaji';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Pengurusan Gaji <small>Maklumat Kakitangan</small></h3>
<div class="search-page search-content-4">
    <div class="search-bar bordered" >
        <div class="row">
            <?php  echo $this->render('pengurusan_gajiSearch', ['model' => $searchModel]); ?>
        </div>
    </div>
</div>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-users"></i>Senarai Kakitangan
                </div>
                <div class="tools actions">
                    <!-- <div class="btn-group">
                        <a class="btn dark btn-outline btn-sm dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Tindakan
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <?= Html::a('Tambah Baru', ['maklumat_kewangan'], ['class' => '#']) ?>
                            </li>
                        </ul>
                    </div> -->
                    <a href="" class="collapse"> </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <?php if(Yii::$app->session->hasFlash('kewangan-success')):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"></button>
                     <p style="color:black"><?php echo  Yii::$app->session->getFlash('kewangan-success'); ?></p>
                </div>
            <?php endif; ?>
            <div class="portlet-body">
                <div class="maklumat-kakitangan-index">
                <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'nama',
                            'no_pekerja',
                            'no_kwsp',
                            [
                                'header' => 'Tindakan',
                                'class' => 'yii\grid\ActionColumn',
                                'template'=>' {payroll_view} {payroll_update} {delete}',
                                'buttons' => [
                                    'payroll_view' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-file-o"></i>', 
                                            $url,['title'=> Yii::t('app','Lihat'),'class'=>'btn btn-circle btn-icon-only green-meadow']);

                                    },
                                    'payroll_update' => function ($url, $model) {
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

