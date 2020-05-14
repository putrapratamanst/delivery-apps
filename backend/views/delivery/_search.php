<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DeliverySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delivery-search">

    <?php $form = ActiveForm::begin([
        'action' => ['pencarian'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php //echo $form->field($model, 'id') ?>

    <?php //echo $form->field($model, 'nama') ?>

    <?= $form->field($model, 'nomor_barcode') ?>

    <?php //echo $form->field($model, 'alamat') ?>

    <?php //echo $form->field($model, 'pengantar') ?>

    <?php // echo $form->field($model, 'tanggal_terima') ?>

    <?php // echo $form->field($model, 'pp25') ?>

    <?php // echo $form->field($model, 'pp15') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['/delivery/pencarian'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
