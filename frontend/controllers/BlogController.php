<?php

namespace frontend\controllers;
use yii;
use yii\data\Pagination;
use common\models\Post;
use common\models\PostSearch;
use common\models\User;
use yii\helpers\Url;

class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
		Url::remember();
		$ap = Yii::$app->urlManager->createUrl(['site/page', 'id' => 'about']);
		$query = Post::find()
				->where(['status'=>1])
				->orderby('created_at DESC');
		$count = clone $query;
		$pages = new Pagination(['totalCount' => $count->count(), 'pageSize'=>6]);
		$post  = $query->offset($pages->offset)
					->limit($pages->limit)
					->all();		
        return $this->render('index', [
			'posts'=>$post,
			'pages' => $pages,
			'ap'=>$ap,
		]);
    }
	
	
	public function actionPost($id)
	{
		Url::remember();
		$post = Post::find()
				->where(['status'=>1, 'id'=>$id])
				->one();
		$update = Post::selectPostsLimit(5);
		$search = new PostSearch();
		
		$query = "SELECT *, MATCH(judul, konten) AGAINST('$post->judul') AS score
				FROM post
				WHERE MATCH(judul, konten) AGAINST('$post->judul') limit 3";
		
		$similiar = Post::findBySql($query)->all();
		
		if($post){
			if($post->alias==0){
				  $author = Post::findAuthor($post->user_id);
			}else $author = "Administrator";
					
			return $this->render('single-post',[
				'post'=>$post,
				'author'=>$author,
				'update'=>$update,
				'similiar'=>$similiar,
			]);
		}
	}
}
