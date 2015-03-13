<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use common\models\Post;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'webdev eepis - blog';

?>

<div class="container single-post">
	<div class="row">
		<div class="col-md-7" style="overflow:hidden;">
			
			<div class="single-article-box">
				<div class="title-single-post"><?= $post->judul ?></div>
				<small>by <?= $author ?> - <?= date('m d, Y', $post->created_at) ?></small><br><br>
				<p class="konten"><?= $post->konten ?></p>
			</div>
			<div class="similiar-article-box">
				<?php if(count($similiar) > 1){ ?>
				<div class="title-block"><a>BACA JUGA</a></div><br>
				<div class="row">
					<?php
					$i=0;
					foreach($similiar as $article){
						$i++; 
						if($i==1) continue;
					?>
					<div class="col-md-6">
						<div class="item-article">
							<a href="<?= Yii::$app->homeUrl."/blog/post/$article->id-".Post::slugString($article->judul); ?>">
								<div class="img-box"><img src="<?= Post::findThumb($article->konten); ?>" height="100%"></div>
								<div class="title"><?= $article->judul ?></div>
							</a>
							<div class="by">by <?= ($article->alias==0) ? Post::findAuthor($article->user_id) : "Administrator" ?> - <?= date('m d, Y', $article->created_at) ?></div>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
			
		</div>
		
		<div class="col-md-1"></div>
		
		<div class="col-md-4">
			<div class="title-block"><a>UPDATE</a></div>
			<?php
			foreach($update as $article){
			?>
				<div class="media side-bar">
				  <a class="pull-left" href="<?= Yii::$app->homeUrl."/blog/post/$article->id-".Post::slugString($article->judul); ?>">
					<div class="img-box">
						<img class="media-object" src="<?= Post::findThumb($article->konten) ?>" alt="...">
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?= $article->judul ?></h4>
				</a><br>
						<small>by  <?= ($article->alias==0) ? Post::findAuthor($article->user_id) : "Administrator" ?>
						- <?= date('m d, Y', $article->created_at) ?> </small>
					</div>
				  <div style="clear:both"></div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<style>
.single-post{
	padding-bottom:100px !important;
}
.single-post .title-single-post{
	font-weight:bold;
	font-size:30px;
}
.single-post .single-article-box{
	margin-bottom:70px;
}
.similiar-article-box .img-box{
	height:170px;
}
.similiar-article-box{
	margin-bottom:20px;
}
.item-article{
	margin-bottom:30px;
}
</style>