<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Participant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participant-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
        <div class="col">
            <?= $form->field($model, 'par_firstname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'par_middlename')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'par_lastname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>  
<div class="row">
        <div class="col">
    <?php echo $form->field($model, 'par_gender')->dropDownlist([
            \frontend\models\Participant::GENDER_MALE => Yii::t('frontend', 'Male'),
            \frontend\models\Participant::GENDER_FEMALE => Yii::t('frontend', 'Female')
            ], ['prompt' => '']) ?> 
        </div>
         <div class="col">
    <?php echo $form->field($model, 'par_civilstatus')->dropDownlist([
            \frontend\models\Participant::CS_SINGLE => Yii::t('frontend', 'Single'),
            \frontend\models\Participant::CS_MARRIED => Yii::t('frontend', 'Married'),
            \frontend\models\Participant::CS_SEPARATED => Yii::t('frontend', 'Separated'),
            \frontend\models\Participant::CS_DIVORCED => Yii::t('frontend', 'Divorced'),
            \frontend\models\Participant::CS_WIDOWED => Yii::t('frontend', 'Widowed')
            ], ['prompt' => '']) ?> 
            </div>       
 <div class="col">
    <?= $form->field($model, 'par_bloodtype')->textInput(['maxlength' => true]) ?>
 </div>
</div>

<div class="row">
        <div class="col">
    <?= $form->field($model, 'par_address')->textInput(['maxlength' => true]) ?>
</div>
<div class="col">
    <?= $form->field($model, 'par_contactnumber')->textInput() ?>
</div>
<div class="col">
    <?= $form->field($model, 'par_emailaddress')->textInput(['maxlength' => true]) ?>      
</div>
</div>
<div class="row">
  <div class="col">
    <?= $form->field($model, 'par_education')->textInput() ?>
 </div>
 <div class="col">
    <?= $form->field($model, 'par_course')->textInput(['maxlength' => true]) ?>
 </div>
  </div>
 <div class="row">
  <div class="col"> 
    <?= $form->field($model, 'par_specialization')->textInput(['maxlength' => true]) ?>
</div>
<div class="col"> 
    <?= $form->field($model, 'par_office')->textInput(['maxlength' => true]) ?>
</div>
<div class="col"> 
    <?= $form->field($model, 'par_designation')->textInput(['maxlength' => true]) ?>
</div>
</div>
    

<div class="col">
            <?= $form->field($model, 'par_birthdate')->widget(\yii\jui\DatePicker::classname(), [
            'language' => 'English',
            'dateFormat' => 'yyyy-MM-dd',
            ]) 
            ?>
            </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
