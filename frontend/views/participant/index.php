<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ParticipantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participants';
$this->params['breadcrumbs'][] = $this->title;

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    const CS_SINGLE = 1;
    const CS_MARRIED = 2;
    const CS_SEPARATED = 3;
    const CS_DIVORCED = 4;
    const CS_WIDOWED = 5;

?>
<div class="participant-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Participant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'par_firstname',
            'par_middlename',
            'par_lastname',
            [
                'attribute' => 'par_civilstatus',
                'value'=> function($data){
                         $info = '';
                    if($data->par_civilstatus == 1){
                        $info = 'Single';
                    }
                    if($data->par_civilstatus == 2){
                        $info = 'Married';
                    }
                    if($data->par_civilstatus == 3){
                        $info = 'Separated';
                    }
                    if($data->par_civilstatus == 4){
                        $info = 'Divorced';
                    }
                    if($data->par_civilstatus == 5){
                        $info = 'Widowed';
                    }
                    return $info;
                },
                'format'=>'html',
            ],
              [
                'attribute' => 'par_gender',
                'value'=> function($data){
                         $info = '';
                    if($data->par_gender == 1){
                        $info = 'Male';
                    }
                    if($data->par_gender == 2){
                        $info = 'Female';
                    }
                    
                    return $info;
                },
                'format'=>'html',
            ],
            //'par_course',
            //'par_specialization',
            //'par_bloodtype',
            //'par_birthdate',
            //'par_office',
            //'par_designation',
            //'par_emailaddress:email',
            //'par_address',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
            'par_id',
            //'par_civilstatus',
            //'par_contactnumber',
            //'par_education',



            ['class' => \common\widgets\ActionColumn::class,
            'template' => '{view}',
            ],
            ],
    ]); ?>


</div>
