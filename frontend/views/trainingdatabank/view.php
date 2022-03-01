<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Trainingdatabank */

$this->title = $model->databank_id;
$this->params['breadcrumbs'][] = ['label' => 'Trainingdatabanks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trainingdatabank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->databank_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->databank_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'par_id',
            'training_id',
            'databank_serialnum',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
            'databank_id',
            'grade_posttest',
            'grade_pretest',
        ],
    ]) ?>

</div>
