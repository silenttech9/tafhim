<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Senarai Pelajar Mengikut Pusat Tahfiz';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-pusat-pengajian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'pusat_pengajian',
            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{senarai}',
                    'buttons' => [
                        'senarai' => function ($url, $model) {
                            return Html::a('Senarai Pelajar : '.$model->pusat_pengajian,$url, [
                                        'title' => Yii::t('app', 'Senarai Pelajar'),'class'=>'btn grey-mint btn-outline sbold uppercase'

                            ]);

                        },

                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'senarai') {
                            $url = ['maklumat-pelajar-penjaga/senarai_tahfiz','id'=>$model->id];
                            return $url;
                        }

                    }
                ],
        ],
    ]); ?>
</div>
