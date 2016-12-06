<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YuranDaftarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yuran-daftar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pelajar') ?>

    <?= $form->field($model, 'tarikh_bayaran') ?>

    <?= $form->field($model, 'no_resit') ?>

    <?= $form->field($model, 'jumlah_yuran') ?>

    <?php // echo $form->field($model, 'jenis_yuran') ?>

    <?php // echo $form->field($model, 'yuran_tertunggak') ?>

    <?php // echo $form->field($model, 'bulan') ?>

    <?php // echo $form->field($model, 'tahap_pelajar') ?>

    <?php // echo $form->field($model, 'guru_kelas') ?>

    <?php // echo $form->field($model, 'status_yuran') ?>

    <?php // echo $form->field($model, 'tahun') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
