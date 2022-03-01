<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\bootstrap4\ActiveForm */

$this->title = Yii::t('frontend', 'User Settings')
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <h2><?php echo Yii::t('frontend', 'Profile Settings') ?></h2>

    <?php echo $form->field($model->getModel('profile'), 'picture')->widget(
        Upload::class,
        [
            'url' => ['avatar-upload']
        ]
    )?>
        
    <div class="row">
        <div class="col">
            <?php echo $form->field($model->getModel('profile'), 'firstname')->textInput(['maxlength' => 255]) ?>
        </div>
        <div class="col">
            <?php echo $form->field($model->getModel('profile'), 'middlename')->textInput(['maxlength' => 255]) ?>
        </div>
        <div class="col">
            <?php echo $form->field($model->getModel('profile'), 'lastname')->textInput(['maxlength' => 255]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?php echo $form->field($model->getModel('profile'), 'address')->textInput(['maxlength' => 255]) ?>
        </div>
         <div class="col">
            <?php echo $form->field($model->getModel('profile'), 'contact')->textInput(['maxlength' => 255]) ?>
        </div>                
    </div>  
                  
    <div class="row">
        <div class="col">
            <?php echo $form->field($model->getModel('profile'), 'blood_type')->textInput(['maxlength' => 255]) ?>
        </div>
        <div class="col">
            <?php echo $form->field($model->getModel('profile'), 'civil_status')->dropDownlist([
                \common\models\UserProfile::CS_SINGLE => Yii::t('frontend', 'Single'),
                \common\models\UserProfile::CS_MARRIED => Yii::t('frontend', 'Married'),
                \common\models\UserProfile::CS_SEPARATED => Yii::t('frontend', 'Separated'),
                \common\models\UserProfile::CS_DIVORCED => Yii::t('frontend', 'Divorced'),
                \common\models\UserProfile::CS_WIDOWED => Yii::t('frontend', 'Widowed')
            ], ['prompt' => '']) ?>
        </div>
        <div class="col">
            <?php echo $form->field($model->getModel('profile'), 'gender')->dropDownlist([
                \common\models\UserProfile::GENDER_FEMALE => Yii::t('frontend', 'Female'),
                \common\models\UserProfile::GENDER_MALE => Yii::t('frontend', 'Male')
            ], ['prompt' => '']) ?>
        </div>
    </div>
    <?= $form->field($model->getModel('profile'), 'birthdate')->widget(\yii\jui\DatePicker::classname(), [
            'language' => 'English',
            'dateFormat' => 'MM-dd-yyyy',
            ]) 
            ?>
    <div class="row">
         <div class="col">
            <?php echo $form->field($model->getModel('profile'), 'education')->dropDownlist([
                \common\models\UserProfile::EDUCATION_ELEM => Yii::t('frontend', 'Elementary Level'),
                \common\models\UserProfile::EDUCATION_ELEMGRAD => Yii::t('frontend', 'Elementary Graduate'),
                \common\models\UserProfile::EDUCATION_HS => Yii::t('frontend', 'High School Level'),
                \common\models\UserProfile::EDUCATION_HSGRAD => Yii::t('frontend', 'High School Graduate'),
                \common\models\UserProfile::EDUCATION_COL => Yii::t('frontend', 'College Level'),
                \common\models\UserProfile::EDUCATION_COLGRAD => Yii::t('frontend', 'College Graduate'),
                \common\models\UserProfile::EDUCATION_POSTGRAD => Yii::t('frontend', 'Post Graduate')
            ], ['prompt' => '']) ?>
        </div>
        <div class="col">
            <?php echo $form->field($model->getModel('profile'), 'course')->textInput(['maxlength' => 255]) ?>
        </div>
    </div>

    
    <h2><?php echo Yii::t('frontend', 'Account Settings') ?></h2>

    <div class="row">
        <div class="col">
            <?php echo $form->field($model->getModel('account'), 'username') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model->getModel('account'), 'email')->input('email') ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?php echo $form->field($model->getModel('account'), 'password')->passwordInput() ?>
        </div>
        <div class="col">
            <?php echo $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    
