<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TrainingdatabankSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trainingdatabank-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= //$form->field($model, 'par_id') ?>

    <?= $form->field($model, 'training_id') ?>

    <?= //$form->field($model, 'databank_serialnum') ?>

    <?= //$form->field($model, 'created_by') ?>

    <?= //$form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'databank_id') ?>

    <?php // echo $form->field($model, 'grade_posttest') ?>

    <?php // echo $form->field($model, 'grade_pretest') ?> 

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
