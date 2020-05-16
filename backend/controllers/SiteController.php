<?php

namespace backend\controllers;

use backend\models\Delivery;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\helpers\Json;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index' ,'chart'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                    'chart' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        switch ($user->role) {
            case 1:
                return $this->redirect('/delivery/index');
                break;
            case 3:
                return $this->redirect('/delivery/pencarian');
                break;

            default:
                break;
        }

        $dataKiriman = Delivery::find()->count();
        $kirimanAll = Delivery::find()->asArray()->orderBy(['id' => SORT_DESC])->limit(5)->all();
        $dataTerbuka = Delivery::find()->where(['pengantar' => NULL])->andWhere(['tanggal_setor' => NULL])->andWhere(['is_retur' => NULL])->count();
        $dataSedangDikirim = Delivery::find()->where(['not', ['pengantar' => NULL]])->andWhere(['tanggal_setor' => NULL])->count();
        $dataSelesai = Delivery::find()->where(['not', ['pengantar' => NULL]])->andWhere(['not', ['tanggal_setor' => NULL]])->count();
        $dataRetur = Delivery::find()->where(['not', ['is_retur' => NULL]])->count();
        return $this->render('index', [
            'totalKiriman' => $dataKiriman,
            'totalTerbuka' => $dataTerbuka,
            'totalSedangDikirim' => $dataSedangDikirim,
            'totalSelesai' => $dataSelesai,
            'totalRetur' => $dataRetur,
            'kirimanAll' => $kirimanAll,
        ]);
    }

    public function actionChart()
    {
        $result= [];
        $dataKiriman = Delivery::find()->count();
        $dataTerbuka = Delivery::find()->where(['pengantar' => NULL])->andWhere(['tanggal_setor' => NULL])->andWhere(['is_retur' => NULL])->count();
        $dataSedangDikirim = Delivery::find()->where(['not', ['pengantar' => NULL]])->andWhere(['tanggal_setor' => NULL])->count();
        $dataSelesai = Delivery::find()->where(['not', ['pengantar' => NULL]])->andWhere(['not', ['tanggal_setor' => NULL]])->count();
        
        $dataRetur = Delivery::find()->where(['not', ['is_retur' => NULL]])->count();
        $result = [
            'totalKiriman' => $dataKiriman,
            'totalTerbuka' => $dataTerbuka,
            'totalSedangDikirim' => $dataSedangDikirim,
            'totalSelesai' => $dataSelesai,
            'totalRetur' => $dataRetur,
        ];
        // $callback = json_decode(json_encode($result));

        return Json::encode($result);
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main_login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $user = Yii::$app->user->identity->username;
            switch ($user) {
                case 'operator':
                    return $this->redirect('/delivery/index');
                    break;

                default:
                    return $this->goBack();
                    break;
            }
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
