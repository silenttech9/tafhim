<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pendapatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-pendapatan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Jana',FALSE, ['value'=>Url::to(['lookup-pendapatan/create']),'class' => 'btn grey-mint btn-outline sbold lookupCreate','id'=>'lookupCreate']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'pendapatan',
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
                            $url = ['value'=>Url::to(['lookup-pendapatan/view','id'=>$model->id]),'class'=>'btn grey-mint btn-outline sbold lookupView'];
                            return $url;
                        }
                        if ($action === 'edit') {
                            $url = ['value'=>Url::to(['lookup-pendapatan/update','id'=>$model->id]),'class'=>'btn grey-mint btn-outline sbold lookupUpdate'];
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = ['lookup-pendapatan/delete','id'=>$model->id];
                            return $url;
                        }
                    }
                ],

        ],
    ]); ?>
</div>
