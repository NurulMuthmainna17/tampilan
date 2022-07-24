<?php

namespace app\controllers;

use app\models\Biodata;
use app\models\BiodataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BiodataController implements the CRUD actions for Biodata model.
 */
class BiodataController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Biodata models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BiodataSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Biodata model.
     * @param int $nim Nim
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nim)
    {
        return $this->render('view', [
            'model' => $this->findModel($nim),
        ]);
    }

    /**
     * Creates a new Biodata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Biodata();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'nim' => $model->nim]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Biodata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $nim Nim
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nim)
    {
        $model = $this->findModel($nim);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nim' => $model->nim]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Biodata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $nim Nim
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nim)
    {
        $this->findModel($nim)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Biodata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $nim Nim
     * @return Biodata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nim)
    {
        if (($model = Biodata::findOne(['nim' => $nim])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
