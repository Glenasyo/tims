<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TrainerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trainer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'trainer_firstname') ?>

    <?= $form->field($model, 'trainer_middlename') ?>

    <?= $form->field($model, 'trainer_lastname') ?>

    <?= $form->field($model, 'trainer_contactnumber') ?>

    <?= $form->field($model, 'trainer_specialization') ?>

    <?php // echo $form->field($model, 'trainer_office') ?>

    <?php // echo $form->field($model, 'trainer_designation') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'trainer_id') ?>

    <?php // echo $form->field($model, 'trainer_gender') ?>

    <?php // echo $form->field($model, 'trainer_civilstatus') ?>

    <?php // echo $form->field($model, 'trainer_birthdate') ?>

    <?php // echo $form->field($model, 'trainer_education') ?>

    <?php // echo $form->field($model, 'trainer_emailaddress') ?>

    <?php // echo $form->field($model, 'trainer_bloodtype') ?>

    <?php // echo $form->field($model, 'trainer_address') ?>

    <?php // echo $form->field($model, 'trainer_course') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
