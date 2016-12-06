<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YuranDaftar */

$this->title = 'Update Yuran Daftar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Yuran Daftars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="yuran-daftar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
