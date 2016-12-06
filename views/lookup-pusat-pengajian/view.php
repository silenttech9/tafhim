<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\LookupPusatPengajian */

$this->title = $model->pusat_pengajian;
$this->params['breadcrumbs'][] = ['label' => 'Senarai Pusat Pengajian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-pusat-pengajian-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pusat_pengajian',
        ],
    ]) ?>
    <h2>Senarai Kelas</h2>

    <p>
    <?= Html::a('Jana',FALSE, ['value'=>Url::to(['lookup-kelas/create','id_pusat_pengajian'=>$model->id]),'class' => 'btn grey-mint btn-outline sbold lookupCreate','id'=>'lookupCreate']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'kelas',
            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}   {edit}   {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('Lihat',FALSE, $url, [
                                        'title' => Yii::t('app', 'Lihat'),
                            ]);

                        },

                        'edit' => function ($url, $model) {
                            return Html::a('Kemaskini',FALSE, $url, [
                                        'title' => Yii::t('app', 'Kemaskini'),
                            ]);
                        },

                        'delete' => function ($url, $model) {
                            return Html::a('Hapus', $url, [
                                        'data-confirm'=>"Anda Pasti Untuk Membuang Kelas Ini ?",
                                        'data-method' => 'post',
                                        'title' => Yii::t('app', 'Hapus'),'class'=>'btn grey-mint btn-outline sbold uppercase'
                            ]);

                        },

                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = ['value'=>Url::to(['lookup-kelas/view','id'=>$model->id]),'class'=>'btn grey-mint btn-outline sbold uppercase lookupView'];
                            return $url;
                        }
                        if ($action === 'edit') {
                            $url = ['value'=>Url::to(['lookup-kelas/update','id'=>$model->id,'id_pusat_pengajian'=>$model->id_pusat_pengajian]),'class'=>'btn grey-mint btn-outline sbold uppercase lookupUpdate'];
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = ['lookup-kelas/delete','id'=>$model->id,'id_pusat_pengajian'=>$model->id_pusat_pengajian];
                            return $url;
                        }
                    }
                ],

        ],
    ]); ?>
</div>
