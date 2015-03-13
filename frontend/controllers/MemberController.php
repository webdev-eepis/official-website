<?php

namespace frontend\controllers;
use yii\helpers\Url;
use Yii;
use frontend\models\RegisterForm;
use frontend\models\LoginForm;
use yii\web\Controller;

class MemberController extends Controller
{
	public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
	
	 public function actionRegister()
    {
		if (!\Yii::$app->user->isGuest) {
            echo Url::previous();
        }
		$model = new RegisterForm();
		if($model->load(Yii::$app->request->post())) {
			if($model->signup()){
				return $this->render('successRegister');
			}else{
				return $this->render('register', ['model'=>$model]);
			}
		}
        return $this->render('register', ['model'=>$model]);
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
		Yii::$app->session["userid"] = "";
        return $this->goHome();
    }

}
