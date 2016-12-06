<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupYuran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-yuran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_bayaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahap')->textInput() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'jenis_pelajar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
