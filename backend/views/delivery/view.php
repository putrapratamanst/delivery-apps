<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */

$this->title = "Nama: " . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$user = Yii::$app->user->identity;
$index = 'index';
if($user->role == 3)
    $index = 'pencarian';
?>
<div class="delivery-view">

    <h1><?= Html::encode($this->title) ?><?php if ($model->is_retur) {
                                                echo " (RETUR)";
                                            } ?>
    </h1>

    <p>
        <?= Html::a('<i class="fa fa-print"></i> Invoice', ['pdf', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>
        <?= Html::a('<i class="fa fa-arrow-left"></i> Back', [$index], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
        'attributes' => [
            'id',
            'nama',
            'nomor_barcode',
            'alamat:ntext',
            'pengantar',
            'tanggal_terima',
            'tanggal_setor',
            [
                'attribute' => 'pp25',
                'label' => 'JUMLAH BLB (PP25)',
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
                'label' => 'JUMLAH PAJAK (PP15)',
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
                'label' => 'TOTAL (PP22)',
                'value' => function($model){
                    return $model->pp15 + $model->pp25;
                },
                'format' => [
                    'currency',
                    'Rp.',
                    [
                        // \NumberFormatter::MIN_FRACTION_DIGITS => 0,
                        // \NumberFormatter::MAX_FRACTION_DIGITS => 0,
                    ]
                ]
            ],
            [
                'attribute' => 'bukti_pembayaran',
                'value' => function($model){
                    if($model->bukti_pembayaran)
                    return $model->bukti_pembayaran;
                },
                'rowOptions' => [
                    'class' => 'hidden',
                ],
            ],
            'alasan_retur',
        ],
    ]) ?>

</div>
<?php
$modelArray = $model->getAttributes();
if ($modelArray['pengantar'] != "" && $modelArray['tanggal_setor'] == "" && ($modelArray['is_retur'] == NULL)) { ?>

    <center><?= Html::a('<i class="fa fa-check"></i> Selesaikan Pengiriman', ['finish', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    
    <?php if($modelArray['is_retur'] == NULL){ ?>
        <?= Html::a('<i class="fa fa-refresh"></i> Retur Kiriman', ['retur-kiriman', 'id' => $model->id], ['class' => 'btn btn-warning']) ?></center>
    <?php }?>

<?php }
if ($modelArray['pengantar'] == "") { ?>
    <center><?= Html::a('<i class="fa fa-arrow-up"></i> Input Pengantar', ['input-pengantar', 'id' => $model->id], ['class' => 'btn btn-info']) ?></center>
<?php } ?>
