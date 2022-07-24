<?php

namespace app\controllers;

use app\models\pegawai;
use app\models\pegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PegawaiController implements the CRUD actions for pegawai model.
 */
class PegawaiController extends Controller
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
     * Lists all pegawai models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new pegawaiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single pegawai model.
     * @param int $ID_pegawai Id Pegawai
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_pegawai)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_pegawai),
        ]);
    }

    /**
     * Creates a new pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new pegawai();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_pegawai' => $model->ID_pegawai]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_pegawai Id Pegawai
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_pegawai)
    {
        $model = $this->findModel($ID_pegawai);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_pegawai' => $model->ID_pegawai]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing pegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_pegawai Id Pegawai
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_pegawai)
    {
        $this->findModel($ID_pegawai)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_pegawai Id Pegawai
     * @return pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_pegawai)
    {
        if (($model = pegawai::findOne(['ID_pegawai' => $ID_pegawai])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
