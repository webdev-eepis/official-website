<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use common\models\Post;
use common\models\User;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */
use yii\helpers\Url;
$this->title = 'webdev eepis - blog';

?>
<div class="site-blog">
    
	<div class="container">
	<div class="row">	
		<?php
				$i=0;
				foreach($posts as $post){				
				?>
				<div class="col-md-4">
					<div class="item-article">
						<a href="<?= Yii::$app->homeUrl."/blog/post/$post->id-".Post::slugString($post->judul); ?>">
						<div class="img-box"><img src="<?= Post::findThumb($post->konten) ?>" height="100%"></div>
						<div class="title"><?= $post->judul ?></div>
						</a>
						<div class="by">by 
						<?php
							if($post->alias==0){
								$user = User::find()->where(['id'=>$post->user_id])->one();
								echo $user->nama;
							}else{
								echo "Administrator";
							}
						?>
						<?= " - ".date('M d, Y', $post->created_at); ?></div>
						<p>
							<?= substr(strip_tags($post->konten),0,190).'...' ?>
						</p>
						
					</div>
				</div>
				<?php 
					$i++; 
					if($i==3){
						$i=0;
						echo '</div><div class="row">';
					}
				} ?>
		
	</div>
	<?php
		echo LinkPager::widget([
			'pagination' => $pages,
		]);
	?>
	</div>
	
</div>
