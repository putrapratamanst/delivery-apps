<?php

namespace backend\controllers;

use Yii;
use backend\models\Delivery;
use backend\models\DeliverySearch;
use DOMDocument;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

/**
 * DeliveryController implements the CRUD actions for Delivery model.
 */
class DeliveryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['*'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }
    /**
     * Lists all Delivery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DeliverySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Delivery model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Delivery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Delivery();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Delivery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionFinish($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('finish', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Delivery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Delivery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Delivery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Delivery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExport()
    {
        $nameFile   = "REPORT-PENGAWASAN-PENGIRIMAN-";
        $sheetTitle = "PP22";
        $filePath = Yii::getAlias('@app/web/storage/'). $nameFile.round(microtime(true) * 1000).uniqid().'.xlsx';
        $fileName   = $nameFile . round(microtime(true) * 1000) . uniqid() . '.xlsx';
        
        $data = Delivery::find()->asArray()->all();
        $newData = [];
        $n = 1;
        foreach ($data as $key => $value) {
            $tempData = 
            [
                'no'              => $n,
                'no_thn'          => '',
                'nomor_ppkp'      => '',
                'tgl_terima'      => $value['tanggal_terima'],
                'nomor_barcode'   => $value['nomor_barcode'],
                'nama'            => $value['nama'],
                'alamat'          => $value['alamat'],
                'pengantar'       => $value['pengantar'],
                'bea_masuk'       => '',
                'cukai'           => '',
                'ppn1'            => '',
                'ppn_bm'          => '',
                'pph'             => '',
                'pp15'            => '',
                'bbu'             => '',
                'blb'             => '',
                'pph2'            => '',
                'jumlah_pp25'     => '',
                'total_pp15_pp25' => '',
                'tgl_setor'       => ''
            ];

            array_push($newData, $tempData);
            $n++;
        }

        $spreadsheet = new Spreadsheet();
        $workSheet = $spreadsheet->getActiveSheet();
        $workSheet->mergeCells('A1:Z1');
        $workSheet->mergeCells('A2:Z2');
        $workSheet->mergeCells('A3:Z3');
        $workSheet->mergeCells('A4:Z4');
        $workSheet->mergeCells('A5:Z5');
        $workSheet->setCellValue('A1', 'PT POS INDONESIA (PERSERO)');
        $workSheet->setCellValue('A2', 'KANTOR POS KUDUS 59300');
        $workSheet->setCellValue('A3', 'PENGAWASAN PENERIMAAN PABEAN, BEA BUNGKUS ULANG DAN BEA LALU BEA')->getStyle('A3')->getAlignment()->setHorizontal('center');
        $workSheet->freezePane("Z8");

        //set header
        $workSheet->mergeCells('A6:A7');
        $workSheet->setCellValue('A6', 'NO.')->getStyle('A6')->getAlignment()->setHorizontal('center');

        $workSheet->mergeCells('B6:B7');
        $workSheet->setCellValue('B6', 'NO. THN')->getStyle('B6')->getAlignment()->setHorizontal('center');

        $workSheet->mergeCells('C6:C7');
        $workSheet->setCellValue('C6', 'NOMOR PPKP')->getStyle('C6')->getAlignment()->setHorizontal('center');

        $workSheet->mergeCells('D6:D7');
        $workSheet->setCellValue('D6', 'TGL TERIMA')->getStyle('D6')->getAlignment()->setHorizontal('center');

        $workSheet->mergeCells('E6:E7');
        $workSheet->setCellValue('E6', 'NOMOR BARCODE')->getStyle('E6')->getAlignment()->setHorizontal('center');

        $workSheet->mergeCells('F6:G6');
        $workSheet->setCellValue('F6', 'PENERIMA')->getStyle('F6')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('F7', 'NAMA')->getStyle('F7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('G7', 'ALAMAT')->getStyle('G7')->getAlignment()->setHorizontal('center');

        $workSheet->mergeCells('H6:H7');
        $workSheet->setCellValue('H6', 'PENGANTAR')->getStyle('H6')->getAlignment()->setHorizontal('center');
        
        $workSheet->mergeCells('I6:S6');
        $workSheet->setCellValue('I6', 'BESAR UANG YANG HARUS DIPUNGUT')->getStyle('I6')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('I7', 'BEA MASUK')->getStyle('I7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('J7', 'CUKAI')->getStyle('J7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('K7', 'PPN')->getStyle('K7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('L7', 'PPN BM')->getStyle('L7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('M7', 'PPH')->getStyle('M7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('N7', 'JUMLAH N6 / PP15')->getStyle('N7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('O7', 'BBU')->getStyle('O7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('P7', 'BLB')->getStyle('P7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('Q7', 'PPN')->getStyle('Q7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('R7', 'JUMLAH PP25')->getStyle('R7')->getAlignment()->setHorizontal('center');
        $workSheet->setCellValue('S7', 'TOTAL PP15 + PP25')->getStyle('S7')->getAlignment()->setHorizontal('center');

        $workSheet->mergeCells('T6:T7');
        $workSheet->setCellValue('T6', 'TGL SETOR')->getStyle('T6')->getAlignment()->setHorizontal('center');


        $workSheet->setTitle($sheetTitle);
        $workSheet->fromArray($newData, NULL, 'A9');
        // ->fromArray($data, NULL, 'A8');



        $writer = new XlsxWriter($spreadsheet);
        $writer->save($filePath);
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);
        gc_collect_cycles();
        Yii::$app->response->sendFile($filePath);
    }

    public function actionPdf($id)
    {
        
        $model = new Delivery();
        $data = Delivery::find()->where(['id' => $id])->asArray()->one();
        $fileName = "Surat_Pemberitahuan" . round(microtime(true) * 1000) . uniqid() . 'report.pdf';
        $template = file_get_contents(Yii::getAlias('@app/web/template/sp.html'));
        $mpdf = new Mpdf([
            'mode'          => 'utf-8',
            'format'        => [200, 256],
            'margin_left'   => 8,
            'margin_top'    => 5,
            'margin_right'  => 8,
            'margin_bottom' => 0,
            'margin_header' => 3,
            'margin_footer' => 3,
            'tempDir'       => Yii::getAlias('@app/web/template')
        ]);

        // $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;

        $document = new DOMDocument();
        libxml_use_internal_errors(true);
        $document->loadHTML($template);
        libxml_clear_errors();

        $modifiedDocument = self::putDataToTemplate($document, $data);
        $mpdf->SetHTMLHeader('
        <table>
            <tr>
                <td id="tanggal_sekarang_slash" class="f--7">
                    02/02/2020
                </td>
                <td class="f--7 center">
                    <span id="tanggal">Aplikasi Kiriman Internasional</span>
                </td>
            </tr>
        </table>
        ');
        $mpdf->setHTMLFooter('
                <table>
            <tr>
                <td id="tanggal_sekarang_slash" class="f--7">
                    aki.posindonesia.cojc1:801/live/index.php?view=CreateX13&nokiriman=1_0583303368CN                </td>
                <td class="f--7 right">
                    <span id="tanggal">{PAGENO}/{nbpg}</span>
                </td>
            </tr>
        </table>

        ');
        $mpdf->writeHTML($modifiedDocument);
        $mpdf->Output($fileName, 'D');
    }


    public function putDataToTemplate(DOMDocument $document, $data)
    {
        return $document->saveHTML();

    }
}
