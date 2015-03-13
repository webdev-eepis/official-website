<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
	'homeUrl' => '/enter/project/webdev/advanced',
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
		
		'session' => [
            'name' => 'session_frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
			 'rules' => [
			   '<alias:index|about|contact|post-single>' => 'site/<alias>', 
			   '<alias:login|logout|register>' => 'member/<alias>',   
			    'blog/post/<id:[a-zA-Z0-9-]+>/'=>'blog/post',
				
			 ],
		 ],
		'request' => [
            'baseUrl' => '/enter/project/webdev/advanced',
        ],
    ],
    'params' => $params,
];
