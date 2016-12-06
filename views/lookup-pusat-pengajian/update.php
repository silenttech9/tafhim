<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupPusatPengajian */

$this->title = 'Kemaskini Pusat Pengajian: ' . $model->pusat_pengajian;
$this->params['breadcrumbs'][] = ['label' => 'Senarai Pusat Pengajian', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pusat_pengajian, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-pusat-pengajian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
