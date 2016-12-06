<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitanganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maklumat-kakitangan-search">
    <div class="note note-danger">
        <p>NOTA: Carian boleh di lakukan dengan mencari "Nama dan KWSP" atau salah satu.  </p>
    </div>
    <?php $form = ActiveForm::begin([
        'action' => ['pengurusan_gaji'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'globalsearch') ?>
    <!-- <?= $form->field($model, 'no_kwsp') ?> -->
    <br>

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="hidden-xs">Reset </span>', ['pengurusan_gaji'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
