<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TrainingdatabankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Training Databank';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainingdatabank-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Training Databank', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'databank_id',
            [
                        'label' => 'Participant',
                        'attribute' => 'par_id',
                        'value'=>function ($model) {
                            return $model->par->par_firstname.' '.$model->par->par_middlename.' '.$model->par->par_lastname;
                        },
            ],
            [
                        'label' => 'Training Title',
                        'attribute' => 'training_id',
                        'value'=>function ($model) {
                            return $model->training->training_title;
                        },
            ],
            [
                        'label' => 'Training Code',
                        'attribute' => 'training_id',
                        'value'=>function ($model) {
                            return $model->training->code;
                        },
            ],
            'databank_serialnum',                      
            //'grade_posttest',
            //'grade_pretest',
           //[
                        //'label' => 'Created By',
                        //'attribute' => 'created_by',
                        //'value'=>function ($model) {
                            //return $model->createdBy->userProfile->lastname.' '.$model->createdBy->userProfile->middlename.' '.$model->createdBy->userProfile->firstname;
                        //},
            //],
            //'updated_by',
            //'created_at',
            //'updated_at',
            

            ['class' => \common\widgets\ActionColumn::class,
            'template' => '{view}',
            ],
            ],
        
    ]); ?>


</div>
