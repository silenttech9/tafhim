<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatPelajarPenjagaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Pelajar : '.$model2->kelas;
$this->params['breadcrumbs'][] = ['label' => 'Senarai Pelajar Mengikut Pusat Tahfiz', 'url' => ['tahfiz']];
$this->params['breadcrumbs'][] = ['label' => 'Senarai Pelajar : ', 'url' => ['senarai_tahfiz']];
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
            'pusat_pengajian_id',
            'kelas',
            'no_mykid',

        ],
    ]); ?>
<?php Pjax::end(); ?>



</div>
