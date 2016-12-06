<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatPelajarPenjagaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Pelajar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maklumat-pelajar-penjaga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Jana', ['create'], ['class' => 'btn grey-mint btn-outline sbold uppercase']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama_pelajar',
            'jantina',
            'tarikh_lahir',
            'no_surat_beranak',
            'no_mykid',
            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}  {update}  {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('Lihat', 
                            $url,['title'=> Yii::t('app','Lihat'),'class'=>'btn grey-mint btn-outline sbold uppercase']);

                    },
                    'update' => function ($url, $model) {
                        return Html::a('Kemaskini', 
                            $url,['title'=> Yii::t('app','Kemaskini'),'class'=>'btn grey-mint btn-outline sbold uppercase']);

                    },
                    'delete' => function ($url, $model) {
                        return Html::a('Hapus', 
                            $url,['title'=> Yii::t('app','Hapus'),'class'=>'btn grey-mint btn-outline sbold uppercase','data-confirm'=>"Adakah Anda Pasti Mahu Hapuskan Item Ini ?",'data-method' => 'post']);

                    },




                ],
            ],

        ],
    ]); ?>
<?php Pjax::end(); ?></div>
