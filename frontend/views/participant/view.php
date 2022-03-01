<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Participant */

$this->title = $model->par_id;
$this->params['breadcrumbs'][] = ['label' => 'Participants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="participant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->par_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->par_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <div class="card-body p-0">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'par_id',
            'par_firstname',
            'par_middlename',
            'par_lastname',
            'par_gender',
            'par_civilstatus',
            'par_birthdate',
            'par_address',
            'par_bloodtype',
            'par_emailaddress:email',
            'par_contactnumber',
            'par_course',
            'par_education',
            'par_specialization',
            'par_office',
            'par_designation',            
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>
    </div>

</div>
