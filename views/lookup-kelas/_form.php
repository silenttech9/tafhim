<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKelas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-kelas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kelas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
