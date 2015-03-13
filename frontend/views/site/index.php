<?php
/* @var $this yii\web\View */
use common\models\Post;
//$this->title = 'WEBDEV EEPIS - Community';
?>
<div class="site-index">
	
    <div id="slider">
		<div class="flexslider">
		  <ul class="slides">
			<li><img src="#"></li>
			<li><img src="#"></li>
			<li><img src="#"></li>
		  </ul>
		</div>
		
	</div>
    
	<div id="blog-side">
		<div class="container">
			<div class="title-side"><strong>ARTIKEL</strong> TERBARU</div>
			<div class="row">
				<?php
				
				foreach($posts as $post){				
					$cari_gambar = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->konten, $matches);
					if($cari_gambar){
						$img = $matches [1][0];
					}else{
						$img = 'http://www.balaniinfotech.com/wp-content/themes/balani/images/noimage.jpg';
					}
				?>
				<div class="col-md-4">
					<a href="<?= Yii::$app->homeUrl."/blog/post/$post->id-".Post::slugString($post->judul); ?>">
					<div class="thumb"><img src="<?= $img ?>" width="100%"></div>
					<div class="title"><?= $post->judul ?></div>
					</a>
					<div class="time">
					by 
						<?php
							if($post->alias==0){
								$user = User::find()->where(['id'=>$post->user_id])->one();
								echo $user->name;
							}else{
								echo "Administrator";
							}
						?>
						<?= " - ".date('M d, Y', $post->created_at); ?>
					</div>
					<div class="content">
						<?= substr(strip_tags($post->konten),0,190).'...' ?>
					</div>
					
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	
	<div id="quote-side">
		<div class="container">
			<div class="flexslider" id="flex2">
			  <ul class="slides">
					<?php foreach($quotes as $quote){ ?>
					<li>
						<blockquote>
						  <p><?= $quote->content; ?></p>
						  <footer><?= $quote->source; ?></footer>
						</blockquote>
					</li>
					<?php } ?>
			  </ul>
			</div>
		</div>
	</div>
</div>

