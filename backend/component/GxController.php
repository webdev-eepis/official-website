<?php
namespace backend\component;

use Yii;
use yii\web\Controller;

class GxController extends Controller{
	
	public function beforeAction($action) {
		$controller = Yii::$app->controller->id;
		$action = Yii::$app->controller->action->id;
		
		if ($controller == "site" && $action == "login") {
			return TRUE;
		}
		if (Yii::$app->user->id == "") {
			//must login
			$this->redirect(Yii::$app->request->baseUrl . "/site/login");
		}else{
			return TRUE;
		}
	}
	
}

?>