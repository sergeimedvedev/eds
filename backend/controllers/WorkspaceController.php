<?php

namespace backend\controllers;

use common\controllers\MainController;
use common\models\Document;
use common\models\DocumentForm;
use common\models\DocumentFormParams;
use common\models\DocumentParam;
use common\models\DocumentSearch;
use common\models\DocumentType;
use common\models\Files;
use common\models\Profile;
use common\models\Workspace;
use common\models\WorkspaceSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * WorkspaceController implements the CRUD actions for Workspace model.
 */
class WorkspaceController extends MainController
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
     * Lists all Workspace models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkspaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPublic($id)
    {
        $searchModel = new DocumentSearch();
        $params = Yii::$app->request->queryParams;
        $params['DocumentSearch']['document_type'] = (int)$id;

        if ($this->_canViewThis($id)) {
            $dataProvider = $searchModel->search($params, false);
        } else {
            $dataProvider = $searchModel->search($params, true);
        }

        $docforms = DocumentForm::find()
            ->where(['document_type' => $id])
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();

        $executors = $this->_getExecutors();
        $registrator = [];
        $registrator[Yii::$app->user->id] = $executors[Yii::$app->user->id];

        return $this->render('public', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'docforms' => $docforms,
            'executors' => $executors,
            'registrator' => $registrator,
            'userId' => Yii::$app->user->id,
        ]);
    }

    private function _canViewThis($id)
    {
        if (Yii::$app->user->can('view_all_documentation')) {
            return true;
        }

        if ($id == 1 && Yii::$app->user->can('view_all_in_documentation')) {
            return true;
        }

        if ($id == 2 && Yii::$app->user->can('view_all_out_documentation')) {
            return true;
        }

        if ($id == 3 && Yii::$app->user->can('view_all_inner_documentation')) {
            return true;
        }
        return false;
    }

    private function _getExecutors()
    {
        $profiles = Profile::find()
            ->all();

        $executors = [];
        foreach ($profiles as $profile) {
            $executors[$profile['user_id']] = $profile['surname'] . ' ' . mb_substr($profile['name'], 0, 1) . '. ' . mb_substr($profile['patronymic'], 0, 1) . '.';
        }
        return $executors;
    }

    /**
     * Finds the Workspace model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Workspace the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Workspace::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionPublicView($id)
    {
        $model = Document::find()->where(['id' => $id])->one();
        $docParams = DocumentParam::find()->where(['document' => $id])->all();

        $formParams = DocumentFormParams::find()
            ->select(['name', 'id', 'data_type'])
            ->where(['document_form' => $model->document_form])
            ->indexBy('id')
            ->all();

        $files = [];
        $form = [];
        foreach ($formParams as $fParam) {
            if ($fParam->data_type == 6) {
                $files[] = $fParam->id;
            }
            $form[$fParam->id] = $fParam->name;
        }

        $params = [];
        foreach ($docParams as $param) {
            if (in_array($param->param, $files)) {
                $file = Files::find()->where(['id' => $param->value])->one();
                $params[] = [
                    'label' => $form[$param->param],
                    'format' => 'raw',
                    'value' => '<a href="/su/' . $file->path . $file->filename . '.' . $file->extension . '">скачать</a>'
                ];
            } else {
                $params[] = [
                    'label' => $form[$param->param],
                    'value' => $param->value
                ];
            }

        }

        return $this->render('publicView', [
            'model' => $model,
            'params' => $docParams,
            'docParams' => $params,
        ]);
    }

    /**
     * Displays a single Workspace model.
     * @param string $id
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
     * Creates a new Workspace model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Workspace();

        if ($model->load(Yii::$app->request->post())) {
            $model->author = Yii::$app->user->id;
            if ($model->save()) return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Workspace model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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

    /**
     * Deletes an existing Workspace model.
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

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionAddNew($id)
    {
        $model = new Document();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->save();

            $formParams = DocumentFormParams::find()
                ->select(['name', 'id', 'data_type'])
                ->where(['document_form' => $model->document_form])
                ->indexBy('id')
                ->all();

            $params = Yii::$app->request->post('Params');

            foreach ($formParams as $formParam) {
                $docParam = new DocumentParam();
                if (isset($params[$formParam->id])) {
                    $docParam->document_form = $model->document_form;
                    $docParam->document = $model->id;
                    $docParam->param = $formParam->id;
                    $docParam->value = $params[$formParam->id];
                } else {
                    $docParam->document_form = $model->document_form;
                    $docParam->document = $model->id;
                    $docParam->param = $formParam->id;
                }
                $docParam->save();
            }

            if (isset($_FILES['Params'])) {
                $docParam = new DocumentParam();
                $docParam->document_form = $model->document_form;
                $docParam->document = $model->id;
                $docParam->param = array_keys($_FILES['Params']['name'])[0];

                $path = $_FILES['Params']['name'][$docParam->param];

                $file = new Files();
                $file->path = '/uploads/';

                $newFileName = uniqid(Yii::$app->user->id . '_', true);
                $newFileName = str_replace('.', '', $newFileName);
                $file->filename = $newFileName;
                $file->extension = pathinfo($path, PATHINFO_EXTENSION);

                if (move_uploaded_file($_FILES['Params']['tmp_name'][$docParam->param], $file->path . $file->filename . '.' . $file->extension)) {
                    $file->save();
                    $docParam->value = $file->id;
                    $docParam->save();
                }
            }
            return $this->redirect(['workspace/public/?id=' . $id]);
        } else {
            $lastDoc = Document::find()
                ->orderBy(['reg_number' => SORT_DESC])
                ->select(['reg_number'])
                ->one();

            $reg_number = $lastDoc ? (int)$lastDoc->reg_number + 1 : 1;

            $executors = $this->_getExecutors();
            $registrator = [];
            $registrator[Yii::$app->user->id] = $executors[Yii::$app->user->id];

            $doctype = DocumentType::find()
                ->where(['id' => (int)$id])
                ->select(['id', 'name'])->one();

            $current = [];
            $current[$doctype->id] = $doctype->name;

            $forms = DocumentForm::find()
                ->select(['name', 'id'])
                ->where(['document_type' => (int)$id])
                ->indexBy('id')
                ->column();

            return $this->renderAjax('_new', [
                'model' => $model,
                'doctype' => $current,
                'forms' => $forms,
                'newRegNumber' => $reg_number,
                'executors' => $executors,
                'registrator' => $registrator,
            ]);
        }
    }

    public function actionPublicUpdate($id)
    {
        $model = Document::find()->where(['id' => $id])->one();
        $docParams = DocumentParam::find()->where(['document' => $id])->all();

        $formParams = DocumentFormParams::find()
            ->select(['name', 'id', 'data_type'])
            ->where(['document_form' => $model->document_form])
            ->indexBy('id')
            ->all();

        $files = [];
        $form = [];
        foreach ($formParams as $fParam) {
            if ($fParam->data_type == 6) {
                $files[] = $fParam->id;
            }
            $form[$fParam->id] = $fParam->name;
        }

        $params = [];
        foreach ($docParams as $param) {
            if (in_array($param->param, $files)) {
                $file = Files::find()->where(['id' => $param->value])->one();
                $params[$param->param] = [
                    'label' => $form[$param->param],
                    'format' => 'raw',
                    'value' => '<a href="/su/' . $file->path . $file->filename . '.' . $file->extension . '">ссылка</a>'
                ];
            } else {
                $params[$param->param] = [
                    'label' => $form[$param->param],
                    'value' => $param->value
                ];
            }

        }

        $executors = $this->_getExecutors();
        $registrator = [];
        $registrator[Yii::$app->user->id] = $executors[Yii::$app->user->id];

        $doctype = DocumentType::find()
            ->where(['id' => $model->document_type])
            ->select(['id', 'name'])->one();

        $current = [];
        $current[$doctype->id] = $doctype->name;

        return $this->render('publicUpdate', [
            'model' => $model,
            'doctype' => $current,
            'docParams' => $params,
            'executors' => $executors,
            'registrator' => $registrator,
            'params' => $formParams,
            'paramsValue' => $params,
        ]);
    }
}
