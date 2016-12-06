<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKwsp11 */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript">

</script>
<div class="lookup-kwsp11-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<a href="javascript:;" id="cancel" class="btn red" style="display:none;"> Remove </a>
    <img id="image_upload_preview" src="<?php echo Yii::$app->request->baseUrl; ?>/image/no-image.png?>" alt="your image" height='300' width='300' />
    <br>
    <label id="muat" class="custom-file-input file-blue">

        <input type="hidden" name="MaklumatKakitangan[file]" value="">
        <input type="file" id="uploadBtn" class="inputFile" name="MaklumatKakitangan[file]">
        <input id="uploadFile" placeholder="0 files selected" disabled="disabled" value='' />
        <br>
        <br>
    </label>
    <!-- <label id="change" class="change-file-input change-blue" style="display:none">
        <input type="hidden" name="MaklumatKakitangan[file]" value="">
        <input type="file" id="uploadBtn" class="inputFile" name="MaklumatKakitangan[file]">
        <input id="uploadFile" placeholder="0 files selected" disabled="disabled" value='' />
        <br>
        <br>
    </label> -->
        
    <!-- <div class="fileUpload btn btn-primary">
        <span>Upload</span>
        <input type="hidden" name="MaklumatKakitangan[file]" value="">
        <input type="file" id="inputFile" class="upload" name="MaklumatKakitangan[file]">
    </div> -->
    <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

