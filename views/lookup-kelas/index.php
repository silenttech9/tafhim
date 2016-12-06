<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lookup Kelas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-kelas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lookup Kelas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kelas',
            'id_pusat_pengajian',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
