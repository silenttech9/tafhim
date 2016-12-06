<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupYuran */

$this->title = 'Update Lookup Yuran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Yurans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-yuran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
