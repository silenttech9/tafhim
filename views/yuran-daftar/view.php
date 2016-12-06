<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YuranDaftar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Yuran Daftars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yuran-daftar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_pelajar',
            'tarikh_bayaran',
            'no_resit',
            'jumlah_yuran',
            'jenis_yuran',
            'yuran_tertunggak',
            'bulan',
            'tahap_pelajar',
            'guru_kelas',
            'status_yuran',
            'tahun',
        ],
    ]) ?>

</div>
