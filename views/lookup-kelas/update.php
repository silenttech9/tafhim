<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKelas */

$this->title = 'Kemaskini Kelas: ' . $model->kelas;

?>
<div class="lookup-kelas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
