<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajarPenjagaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maklumat-pelajar-penjaga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nama_pelajar') ?>

    <?= $form->field($model, 'jantina') ?>

    <?= $form->field($model, 'no_mykid') ?>

    <?= $form->field($model, 'pusat_pengajian_id') ?>



    <div class="form-group">
        <?= Html::submitButton('Carian', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
