<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Trainingdatabank */

$this->title = 'Create Training Databank';
$this->params['breadcrumbs'][] = ['label' => 'Trainingdatabanks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainingdatabank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
