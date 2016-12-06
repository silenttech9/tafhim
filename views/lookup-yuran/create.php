<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupYuran */

$this->title = 'Create Lookup Yuran';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Yurans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-yuran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
