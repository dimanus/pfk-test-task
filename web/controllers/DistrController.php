<?php

namespace app\controllers;

use app\Component\ImportComponent\Config;
use app\Component\ImportComponent\ImportComponent;
use app\models\Distr;
use app\models\FileUploadForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * DistrController implements the CRUD actions for Distr model.
 */
class DistrController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Distr models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Distr::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Distr model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $config_factory = new Config\ConfigFactory();
        $component = new ImportComponent($config_factory->buildConfigTest());
        $upload_form = new FileUploadForm();
        if (\Yii::$app->request->isPost) {
            try {
                $upload_form->importFile = UploadedFile::getInstance($upload_form, 'importFile');
                if ($upload_form->validate()) {
                    $component = new ImportComponent($config_factory->buildConfigReal(
                        $id,
                        $upload_form->importFile->tempName
                    ));
                    $component->process();
                }
            }catch (\Exception $e){
                var_dump($e->getMessage());
            }
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'component' => $component,
            'upload_form' => $upload_form
        ]);
    }

    /**
     * Finds the Distr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Distr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Distr::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new Distr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Distr();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_distr]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Distr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_distr]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Distr model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
