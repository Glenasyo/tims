<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Trainer */

$this->title = 'Update Trainer: ' . $model->trainer_id;
$this->params['breadcrumbs'][] = ['label' => 'Trainers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->trainer_id, 'url' => ['view', 'id' => $model->trainer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trainer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
