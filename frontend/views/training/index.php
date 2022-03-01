<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TrainingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trainings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Training', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code', 
            'training_title',
            'training_desc',                               
            'training_date',                      
            'training_location',
            //'training_id',
            //'training_trainer',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => \common\widgets\ActionColumn::class,
            'template' => '{view}',
            ],
        ],      
    ]); ?>

</div>