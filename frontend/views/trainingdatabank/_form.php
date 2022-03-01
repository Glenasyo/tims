<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use frontend\models\Training;
use frontend\models\Participant;

/* @var $this yii\web\View */
/* @var $model frontend\models\Trainingdatabank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trainingdatabank-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php 
      
      $data = ArrayHelper::map(Participant::find()->all(),'par_id', 'par_lastname'); 

        foreach($data as $d)
                $row[] = $d;

            echo $form->field($model, 'par_id')->widget(Select2::classname(), [
            'data' => $data,
            'language' => 'de',
            'options' => ['placeholder' => 'Select Participant ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

    ?>

    <?php 
      
      $data = ArrayHelper::map(Training::find()->all(),'training_id', 'code'); 

        foreach($data as $d)
                $row[] = $d;

        echo $form->field($model, 'training_id')->widget(Select2::classname(), [
            'data' => $data,
            'language' => 'de',
            'options' => ['placeholder' => 'Select Training Code ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

    ?> 

    <?= $form->field($model, 'databank_serialnum')->textInput() ?>

    <?= $form->field($model, 'grade_pretest')->textInput() ?>

    <?= $form->field($model, 'grade_posttest')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
