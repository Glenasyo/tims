<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\datepicker\DatePicker;
use frontend\models\Trainer;

/* @var $this yii\web\View */
/* @var $model frontend\models\Training */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col">
    <?= $form->field($model, 'training_title')->textInput(['maxlength' => true]) ?>
</div>
<div class="col">
    <?= $form->field($model, 'training_desc')->textInput(['maxlength' => true]) ?>
</div>
</div>
<div class="row">
<div class="col">
    <?= $form->field($model, 'training_location')->textInput(['maxlength' => true]) ?>
</div>
<div class="col">
    <?= $form->field($model, 'code')->textInput() ?>
</div>
</div>   
<div class="row">
   <div class="col"> 
            <?= $form->field($model, 'training_date')->widget(\yii\jui\DatePicker::classname(), [
            'language' => 'English',
            'dateFormat' => 'yyyy-MM-dd',
            ]) 
            ?>
   </div>         
   <div class="col">
       <?= $form->field($model, 'training_trainer')            
         ->dropDownList(ArrayHelper::map(Trainer::find()->all(),'trainer_id','trainer_lastname','trainer_firstname'),
       ['multiple' => 'multiple'] 
       )?>    
   </div>
   

</div> 
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>

<?php

$script = <<< JS

    $(".training-formsss").submit(function(event) {
        event.preventDefault(); // stopping submitting
        var data = $(this).serializeArray();
        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data
        })
        .done(function(response) {
            if (response.data.success == true) {
                console.log(response);
            }
        })
        .fail(function() {
            console.log("error");
        });
        
    
    });


JS;

$this->registerJs($script);

?>

