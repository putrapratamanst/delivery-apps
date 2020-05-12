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
        <?php //echo Html::a('Export Report', ['export'], ['class' => 'btn btn-primary pull-right']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $column) {
            if ($index % 2 == 0) {
                return ['class' => 'info'];
            }
        },
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
                    // \NumberFormatter::MIN_FRACTION_DIGITS => 0,
                    // \NumberFormatter::MAX_FRACTION_DIGITS => 0,
                ]
            ],
        ],
        [
            'attribute' => 'pp15',
            'format' => [
                'currency',
                'Rp.',
                [
                    // \NumberFormatter::MIN_FRACTION_DIGITS => 0,
                    // \NumberFormatter::MAX_FRACTION_DIGITS => 0,
                ]
            ],
        ],
        // 'tanggal_setor',
        [
            'attribute' => 'pp25',
            'header' => 'Status',
            'format'=>'html',
            'contentOptions' => function ($model, $key, $index, $column) {
                if ($model->tanggal_setor) {
                    return ['style' => 'color:white;background-color:#1ABB9C'];
                }
                if ($model->pengantar == "") {
                    return ['style' => 'color:white;background-color:#dc3545'];
                }
                if ($model->is_retur) {
                    return ['style' => 'color:white;background-color:#ffc107'];
                }

                if ($model->pengantar) {
                    return ['style' => 'color:white;background-color:#17a2b8'];
                }

            },
            // 'name' => 'status',
            'value' => function($model){
                if($model->tanggal_setor){
                    return "SELESAI";
                }
                if($model->pengantar == ""){
                    return "BELUM DIKIRIM";
                }
                if($model->is_retur){
                    return "RETUR";
                }
                if($model->pengantar){
                    return "SEDANG DIKIRIM";
                }
            }
        ],
        // 'pp25',
        // 'pp15',

        [
            'class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['style' => 'width:15%'],

            'template' => '{print} {update}',
            'buttons' => [
                'print' => function ($url, $model) {
                    $url = Url::to(['delivery/pdf', 'id' => $model->id]);
                    return Html::a('PRINT', $url, ['title' => 'print', 'class' => 'btn btn-warning']);
                },
                'update' => function ($url, $model) {
                    $url = Url::to(['delivery/view', 'id' => $model->id]);
                    return Html::a("UPDATE", $url, ['title' => 'update', 'class' => 'btn btn-warning']);
                },
                // 'print' => function ($url, $model) {
                //     $url = Url::to(['delivery/pdf', 'id' => $model->id]);
                //     return Html::a('<span class="fa fa-print"></span>', $url, ['title' => 'print']);
                // },
                // 'view' => function ($url, $model) {
                //     $url = Url::to(['delivery/view', 'id' => $model->id]);
                //     return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => 'view']);
                // },
                // 'update' => function ($url, $model) {
                //     $url = Url::to(['delivery/update', 'id' => $model->id]);
                //     return Html::a('<span class="fa fa-pencil"></span>', $url, ['title' => 'update']);
                // },
                // 'delete' => function ($url, $model) {
                //     $url = Url::to(['delivery/delete', 'id' => $model->id]);
                //     return Html::a('<span class="fa fa-trash"></span>', $url, [
                //         'title' => 'delete',
                //         ]);
                // },
            ]
        ]        
    ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
