<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DeliverySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengiriman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Input Pengiriman', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export Report', ['export'], ['class' => 'btn btn-primary pull-right']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama',
            'nomor_barcode',
            'alamat:ntext',
            'pengantar',
            'tanggal_terima',
        [
            'attribute' => 'pp25',
            'format' => [
                'currency',
                'Rp.',
                [
                    \NumberFormatter::MIN_FRACTION_DIGITS => 0,
                    \NumberFormatter::MAX_FRACTION_DIGITS => 0,
                ]
            ],
        ],
        // 'pp25',
        // 'pp15',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'view' => function ($url, $model) {
                    $url = Url::to(['delivery/view', 'id' => $model->id]);
                    return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => 'view']);
                },
                'update' => function ($url, $model) {
                    $url = Url::to(['delivery/update', 'id' => $model->id]);
                    return Html::a('<span class="fa fa-pencil"></span>', $url, ['title' => 'update']);
                },
                'delete' => function ($url, $model) {
                    $url = Url::to(['delivery/delete', 'id' => $model->id]);
                    return Html::a('<span class="fa fa-trash"></span>', $url, [
                        'title' => 'delete',
                        ]);
                },
            ]
        ]        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
