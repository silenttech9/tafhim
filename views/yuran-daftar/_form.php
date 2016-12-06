<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YuranDaftar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-credit-card font-green-haze"></i>
                    <span class="caption-subject font-green-haze bold uppercase"> Pembayaran
                    </span>
                </div>
            </div>
            <div class="portlet-body form">
                <?php $form = ActiveForm::begin(
                    [
                        'options' => [
                            'class' => 'form-horizontal',
                            'id' => 'submit_form',
                        ],
                    ]
                ); ?>
                <div class="form-wizard">
                    <div class="form-body">
                        <ul class="nav nav-pills nav-justified steps">
                            <li>
                                <a href="#tab1" data-toggle="tab" class="step">
                                    <span class="number"> 1 </span>
                                    <span class="desc">
                                        <i class="fa fa-check"></i> Butiran Yuran </span>
                                </a>
                            </li>
                            <li>
                                <a href="#tab2" data-toggle="tab" class="step">
                                    <span class="number"> 2 </span>
                                    <span class="desc">
                                    <i class="fa fa-check"></i> Pembayaran </span>
                                </a>
                            </li>
                        </ul>
                        <div id="bar" class="progress progress-striped" role="progressbar">
                            <div class="progress-bar progress-bar-success"> </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <h3 class="block">Butiran Yuran</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered">
                                            <?php
                                                $totalyuran = 0;
                                                foreach ($model2 as $yurandetail) {
                                            ?>
                                                <tr>
                                                    <td><?= $yurandetail->jenis_bayaran ?></td>
                                                    <td><?php $totalyuran += $yurandetail->jumlah; ?>RM <?= $yurandetail->jumlah ?></td>
                                                </tr>
                                            <?php } ?>
                                                <tfoot>
                                                    <tr>
                                                        <td>Jumlah Yuran</td>
                                                        <td>RM <?= $totalyuran; ?></td>

                                                    </tr>
                                                </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="tab2">
                                <div class="yuran-daftar-form">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nombor Resit</label>
                                        <div class="col-md-8">
                                            <?= $form->field($model, 'no_resit')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tarikh Bayaran</label>
                                        <div class="col-md-8">
                                            <?= $form->field($model, 'tarikh_bayaran')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Jumlah Yuran</label>
                                        <div class="col-md-8">
                                            <strong>RM <?= $totalyuran; ?><input id="yuran" type="hidden" value='<?= $totalyuran; ?>' /></strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Jumlah Bayaran</label>
                                        <div class="col-md-8">
                                            <?= $form->field($model, 'jumlah_yuran')->textInput(['maxlength' => true,'class'=>'form-control','id'=>"jumlahbayaran"])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3"></label>
                                        <div class="col-md-8">
                                            <?= $form->field($model, 'yuran_tertunggak')->hiddenInput(['maxlength' => true,'class'=>'form-control','id'=>'sum','value'=>'0'])->label(false) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <a href="javascript:;" class="btn default button-previous">
                                        <i class="fa fa-angle-left"></i> Kembali </a>
                                    <a href="javascript:;" class="btn btn-outline green button-next"> Seterusnya
                                        <i class="fa fa-angle-right"></i>
                                    </a><!-- 
                                    <a href="javascript:;" class="btn green button-submit"> Submit
                                        <i class="fa fa-check"></i>
                                    </a> -->
                                    <?= Html::submitButton($model->isNewRecord ? 'Simpan <i class="fa fa-check"></i>' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success button-submit' : 'btn btn-primary']) ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

</div>

