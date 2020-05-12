<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
        // 'status',
        //'role',
        //'created_at',
        //'updated_at',
        //'verification_token',

        [
            'class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['style' => 'width:15%'],

            'template' => '{delete}',
            'buttons' => [
                // 'print' => function ($url, $model) {
                //     $url = Url::to(['delivery/pdf', 'id' => $model->id]);
                //     return Html::a('PRINT', $url, ['title' => 'print', 'class' => 'btn btn-warning']);
                // },
                'delete' => function ($url, $model) {
                    $url = Url::to(['user/update-status', 'id' => $model->id]);
                    return Html::a("DELETE", $url, ['title' => 'update', 'class' => 'btn btn-info']);
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


</div>
