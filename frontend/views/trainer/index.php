<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TrainerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trainers';
$this->params['breadcrumbs'][] = $this->title;

const GENDER_MALE = 1;
const GENDER_FEMALE = 2;

const CS_SINGLE = 1;
const CS_MARRIED = 2;
const CS_SEPARATED = 3;
const CS_DIVORCED = 4;
const CS_WIDOWED = 5;

?>
<div class="trainer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Trainer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'trainer_firstname',
            'trainer_middlename',
            'trainer_lastname',      
            //'trainer_specialization',
            'trainer_designation',
            [
                'attribute' => 'trainer_civilstatus',
                'value'=> function($data){
                         $info = '';
                    if($data->trainer_civilstatus == 1){
                        $info = 'Single';
                    }
                    if($data->trainer_civilstatus == 2){
                        $info = 'Married';
                    }
                    if($data->trainer_civilstatus == 3){
                        $info = 'Separated';
                    }
                    if($data->trainer_civilstatus == 4){
                        $info = 'Divorced';
                    }
                    if($data->trainer_civilstatus == 5){
                        $info = 'Widowed';
                    }
                    return $info;
                },
                'format'=>'html',
            ],
              [
                'attribute' => 'trainer_gender',
                'value'=> function($data){
                         $info = '';
                    if($data->trainer_gender == 1){
                        $info = 'Male';
                    }
                    if($data->trainer_gender == 2){
                        $info = 'Female';
                    }
                    
                    return $info;
                },
                'format'=>'html',
            ],
            //'trainer_contactnumber',
            //'trainer_office',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
            //'trainer_id',
            //'trainer_birthdate',
            //'trainer_education',
            //'trainer_emailaddress:email',
            //'trainer_bloodtype',
            //'trainer_address',
            //'trainer_course',

            ['class' => \common\widgets\ActionColumn::class,
            'template' => '{view}',
            ],
        ],
    ]); ?>


</div>
