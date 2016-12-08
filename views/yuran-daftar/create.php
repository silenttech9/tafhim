<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YuranDaftar */

$this->title = 'Pembayaran Yuran Daftar';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Pelajar', 'url' => ['pilihan']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="yuran-daftar-create">
    <h3 class="page-title">Yuran Daftar <small> <?= $model3->nama_pelajar ?></small></h3>
    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
        'model3'=>$model3,
        'umur' => $umur,
    ]) ?>

</div>
