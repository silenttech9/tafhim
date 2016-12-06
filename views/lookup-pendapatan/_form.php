<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupPendapatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-pendapatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pendapatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Jana' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
