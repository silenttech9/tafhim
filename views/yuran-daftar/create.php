<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YuranDaftar */

$this->title = 'Pembayaran Yuran Daftar';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Pelajar', 'url' => ['yurandaftar']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="yuran-daftar-create">
    <h3 class="page-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
        'umur' => $umur,
    ]) ?>

</div>
