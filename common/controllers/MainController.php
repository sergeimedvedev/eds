<?php

namespace common\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class MainController extends Controller
{

    public function init()
    {
        parent::init();
        #add your logic: read the cookie and then set the language
        Yii::$app->language = 'ru-RU';
    }

    /**
     * @inheritdoc
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
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (Yii::$app->user->isGuest) {
                if ($action->id === 'error') {
                    $this->layout = 'error';
                }
                if ($action->id != 'login') {
                    $this->redirect('@web/user/login');
                }
            }
        }
        return true;
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

    protected function _userCanThis()
    {
        if (Yii::$app->user->identity && Yii::$app->user->identity->username == 'admin') return true;
        elseif (Yii::$app->user->can('/' . Yii::$app->controller->route)) return true;
        elseif (Yii::$app->user->can('/' . Yii::$app->controller->id)) return true;
        else return false;
    }
}
