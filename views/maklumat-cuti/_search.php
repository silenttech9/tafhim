<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatCutiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maklumat-cuti-search">

    <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'GET',
                'options' => [
                'class' => 'form-horizontal'
             ]
    ]); ?>
    
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Tahun</label>
                    <div class="col-md-6">
                        <select class="form-control" name="MaklumatCutiSearch[tahun]">
                        <?php
                            $tahun = date("Y",time());
                                for($y=$tahun;$y>=2012;$y--)
                                { 
                                     // $options[$y] = $y;
                        ?>
                            <option value="<?= $y ?>"><?= $y ?></option>
                        <?php 
                                }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Bulan</label>
                    <div class="col-md-6">
                        <select class="form-control" name="MaklumatCutiSearch[bulan]">
                        <?php
                            $bulan = date("n",time());
                                for($m=1;$m<=12;$m++)
                                { 
                                     // $options[$m] = $m;
                        ?>
                            <option value="<?= $m ?>" <?php if ($bulan == $m){ echo 'selected';} ?> ><?= $m ?></option>
                        <?php 
                                }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                        <div class="col-md-3">
                             <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('<span class="hidden-xs">Reset </span>', ['index'], ['class' => 'btn btn-default']) ?>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
