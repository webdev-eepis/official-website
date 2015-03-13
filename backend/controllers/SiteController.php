<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use backend\component\GxController;
use yii\filters\VerbFilter;
use yii\web\Controller;
/**
 * Site controller
 */
 date_default_timezone_set('Asia/Jakarta');
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
	 
	public $layout = "//main_login";
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'dashboard'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
	
    public function actionIndex()
    {
		$this->redirect(Yii::$app->request->baseUrl . "/site/dashboard");
    }
	
	public function actionDashboard()
    {
		$this->layout = "//main";
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
