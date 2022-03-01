<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Trainer */

$this->title = $model->trainer_id;
$this->params['breadcrumbs'][] = ['label' => 'Trainers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trainer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->trainer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->trainer_id], [
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
            'trainer_id',
            'trainer_firstname',
            'trainer_middlename',
            'trainer_lastname',
            'trainer_gender',
            'trainer_civilstatus',
            'trainer_birthdate',
            'trainer_address',
            'trainer_bloodtype',
            'trainer_emailaddress:email',
            'trainer_contactnumber',
            'trainer_course',
            'trainer_education',
            'trainer_specialization',
            'trainer_office',
            'trainer_designation',          
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
