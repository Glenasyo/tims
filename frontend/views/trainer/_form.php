<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Trainer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trainer-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col">
    <?= $form->field($model, 'trainer_firstname')->textInput(['maxlength' => true]) ?>
</div>
<div class="col">
    <?= $form->field($model, 'trainer_middlename')->textInput(['maxlength' => true]) ?>
</div>
<div class="col">
    <?= $form->field($model, 'trainer_lastname')->textInput(['maxlength' => true]) ?>
</div>
</div>
<div class="row">
    <div class="col">
<?php echo $form->field($model, 'trainer_gender')->dropDownlist([
             \frontend\models\Trainer::GENDER_MALE => Yii::t('frontend', 'Male'),
             \frontend\models\Trainer::GENDER_FEMALE => Yii::t('frontend', 'Female')
            ], ['prompt' => '']) ?>
    </div>        
<div class="col">
     <?php echo $form->field($model, 'trainer_civilstatus')->dropDownlist([
                \frontend\models\Participant::CS_SINGLE => Yii::t('frontend', 'Single'),
                \frontend\models\Participant::CS_MARRIED => Yii::t('frontend', 'Married'),
                \frontend\models\Participant::CS_SEPARATED => Yii::t('frontend', 'Separated'),
                \frontend\models\Participant::CS_DIVORCED => Yii::t('frontend', 'Divorced'),
                \frontend\models\Participant::CS_WIDOWED => Yii::t('frontend', 'Widowed')
            ], ['prompt' => '']) ?>
    </div>

<div class="col">
    <?= $form->field($model, 'trainer_bloodtype')->textInput() ?>
    </div>
    </div>
    <div class="row">
    <div class="col">
 <?= $form->field($model, 'trainer_address')->textInput() ?>
</div>
<div class="col">
    <?= $form->field($model, 'trainer_contactnumber')->textInput(['maxlength' => true]) ?>
</div>
<div class="col">
  <?= $form->field($model, 'trainer_emailaddress')->textInput() ?>
</div>
</div>
<div class="row">
    <div class="col">
    <?= $form->field($model, 'trainer_education')->textInput() ?>
</div>
<div class="col">
    <?= $form->field($model, 'trainer_course')->textInput() ?>
</div>
</div>
<div class="row">
    <div class="col">
    <?= $form->field($model, 'trainer_specialization')->textInput(['maxlength' => true]) ?>
</div>
<div class="col">
    <?= $form->field($model, 'trainer_office')->textInput(['maxlength' => true]) ?>
</div>
<div class="col">
    <?= $form->field($model, 'trainer_designation')->textInput(['maxlength' => true]) ?>
</div>
</div>
    
            
    <?= $form->field($model, 'trainer_birthdate')->widget(\yii\jui\DatePicker::classname(), [
            'language' => 'English',
            'dateFormat' => 'yyyy-MM-dd',
            ]) 
            ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
