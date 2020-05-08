<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delivery-form">

    <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off']]); ?>
    <?= $form->field($model, 'tanggal_setor')->textInput(['maxlength' => true, 'class' => 'form-control has-feedback-left', 'id' => 'single_cal1']) ?>

    <div class="form-group">
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>

        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
