<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatPelajarPenjagaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Pelajar Pending';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maklumat-pelajar-penjaga-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
                'template'=>'{status}',
                'buttons' => [
                    'status' => function ($url, $model) {
                        return Html::a('Status', 
                            $url,['title'=> Yii::t('app','Status'),'class'=>'btn grey-mint btn-outline sbold uppercase']);

                    },


                ],
            ],


        ],
    ]); ?>
<?php Pjax::end(); ?></div>
