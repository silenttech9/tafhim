<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajarPenjaga */

$this->title = 'Jana Maklumat Pelajar';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Maklumat Pelajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maklumat-pelajar-penjaga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
