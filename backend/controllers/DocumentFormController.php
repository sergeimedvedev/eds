<?php

namespace backend\controllers;

use common\controllers\MainController;
use common\models\DocumentForm;
use common\models\DocumentFormSearch;
use common\models\DocumentType;
use common\models\Widget;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * DocumentFormController implements the CRUD actions for DocumentForm model.
 */
class DocumentFormController extends MainController
{
    /**
     * @inheritdoc
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
     * Lists all DocumentForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocumentFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $widgets = Widget::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();

        $doctypes = DocumentType::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'widgets' => $widgets,
            'doctypes' => $doctypes,
        ]);
    }

    /**
     * Lists all DocumentForm models.
     * @return mixed
     */
    public function actionGetFormByType($type)
    {
        $forms = DocumentForm::find()
            ->select(['name', 'id'])
            ->where(['document_type' => (int)$type])
            ->indexBy('id')
            ->column();
        return $this->renderAjax('_forms',
            [
                'forms' => $forms,
                'type' => $type,
            ]
        );
    }

    /**
     * Displays a single DocumentForm model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the DocumentForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return DocumentForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DocumentForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new DocumentForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DocumentForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DocumentForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DocumentForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
