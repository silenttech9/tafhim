<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LookupPendapatan */

$this->title = $model->pendapatan;
$this->params['breadcrumbs'][] = ['label' => 'Senarai Pendapatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-pendapatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pendapatan',
        ],
    ]) ?>

</div>
