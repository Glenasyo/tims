<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Participant */

$this->title = 'Update Participant: ' . $model->par_id;
$this->params['breadcrumbs'][] = ['label' => 'Participants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->par_id, 'url' => ['view', 'id' => $model->par_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="participant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
