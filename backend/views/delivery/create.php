<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */

$this->title = 'Input Kiriman';
$this->params['breadcrumbs'][] = ['label' => 'Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-create">

    <center><h1><?= Html::encode($this->title) ?></h1></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
