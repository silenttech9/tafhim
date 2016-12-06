<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Senarai Pusat Pengajian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-pusat-pengajian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('Jana',FALSE, ['value'=>Url::to(['lookup-pusat-pengajian/create']),'class' => 'btn grey-mint btn-outline sbold uppercase lookupCreate','id'=>'lookupCreate']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'pusat_pengajian',
            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}   {edit}   {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('Kelas : '.$model->pusat_pengajian,$url, [
                                        'title' => Yii::t('app', 'Kelas'),'class'=>'btn grey-mint btn-outline sbold uppercase'

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
                            $url = ['lookup-pusat-pengajian/view','id'=>$model->id];
                            return $url;
                        }
                        if ($action === 'edit') {
                            $url = ['value'=>Url::to(['lookup-pusat-pengajian/update','id'=>$model->id]),'class'=>'btn grey-mint btn-outline sbold uppercase lookupUpdate'];
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = ['lookup-pusat-pengajian/delete','id'=>$model->id];
                            return $url;
                        }
                    }
                ],
        ],
    ]); ?>
</div>
