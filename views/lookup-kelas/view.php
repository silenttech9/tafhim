<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKelas */

$this->title = $model->kelas;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-kelas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kelas',
        ],
    ]) ?>

</div>
