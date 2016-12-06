<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupPendapatan */

$this->title = 'Jana Pendapatan';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Pendapatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-pendapatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
