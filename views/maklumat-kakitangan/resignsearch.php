<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitanganSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
        'action' => ['resign'],
        'method' => 'get',
    ]); ?>
    <div class="col-md-9" style="margin-left:30px;">
        <div class="input-group">
            <input type="text" id="maklumatkakitangansearch-globalstaff" class="form-control" name="MaklumatKakitanganSearch[globalStaff]" placeholder="Carian nama, nombor pekerja dll .. ">
            <span class="input-group-btn">
                <button class="btn green-soft uppercase bold" type="submit">Carian</button>
            </span>
        </div>
    </div>
    <div class="col-sm-2 extra-buttons">
        <!-- <button class="btn grey-steel uppercase bold" type="button">Reset Search</button> -->
        
        <?= Html::a('<button class="btn dark btn-outline uppercase bold" type="button">Reset</button>', ['resign'], ['class' => '']) ?>
        
    </div>
<?php ActiveForm::end(); ?>