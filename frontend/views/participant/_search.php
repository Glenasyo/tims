<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ParticipantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'par_firstname') ?>

    <?= $form->field($model, 'par_middlename') ?>

    <?= $form->field($model, 'par_lastname') ?>

    <?= $form->field($model, 'par_bloodtype') ?>

    <?= $form->field($model, 'par_birthdate') ?>

    <?php // echo $form->field($model, 'par_course') ?>

    <?php // echo $form->field($model, 'par_specialization') ?>

    <?php // echo $form->field($model, 'par_office') ?>

    <?php // echo $form->field($model, 'par_designation') ?>

    <?php // echo $form->field($model, 'par_emailaddress') ?>

    <?php // echo $form->field($model, 'par_address') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'par_id') ?>

    <?php echo $form->field($model, 'par_gender') ?>

    <?php // echo $form->field($model, 'par_civilstatus') ?>

    <?php // echo $form->field($model, 'par_contactnumber') ?>

    <?php // echo $form->field($model, 'par_education') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
