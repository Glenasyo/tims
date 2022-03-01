<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Trainingdatabank */

$this->title = 'Update Training Databank: ' . $model->databank_id;
$this->params['breadcrumbs'][] = ['label' => 'Trainingdatabanks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->databank_id, 'url' => ['view', 'id' => $model->databank_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trainingdatabank-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
