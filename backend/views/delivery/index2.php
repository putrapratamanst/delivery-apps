<?php

use yii\helpers\Html;
?>

<div class="delivery-index" style="padding:100px">
    <div class="col-md-3">
        <?= Html::a('DATA KIRIMAN', ['/delivery/terbuka'], ['class' => 'btn btn-danger btn-lg', 'style' =>'margin:100px']) ?>
     </div>
    <div class="col-md-3">
        <?= Html::a('KIRIMAN DIKIRIM', ['/delivery/dikirim'], ['class' => 'btn btn-info btn-lg', 'style' =>'margin:100px']) ?>
     </div>
    <div class="col-md-3">
        <?= Html::a('KIRIMAN LUNAS', ['/delivery/lunas'], ['class' => 'btn btn-success btn-lg', 'style' =>'margin:100px']) ?>
     </div>
    <div class="col-md-3">
        <?= Html::a('KIRIMAN RETUR', ['/delivery/retur'], ['class' => 'btn btn-warning btn-lg', 'style' =>'margin:100px']) ?>
     </div>
</div>
