<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupPendapatan */

$this->title = 'Kemaskini Pendapatan: ' . $model->pendapatan;
$this->params['breadcrumbs'][] = ['label' => 'Senarai Pendapatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pendapatan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-pendapatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
