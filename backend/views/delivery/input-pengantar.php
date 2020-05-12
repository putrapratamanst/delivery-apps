<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */

$this->title = 'Input Pengantar: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="delivery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_input_pengantar', [
        'model' => $model,
    ]) ?>

</div>
