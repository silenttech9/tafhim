<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupPusatPengajian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-pusat-pengajian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pusat_pengajian')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
