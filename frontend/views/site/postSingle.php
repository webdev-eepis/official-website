<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="row">
		<div class="col-lg-9">
			<?php
			
			echo '<div>';
			echo '<h2>'.$post->title.'</h2>';
			echo '<p>'.$post->content.'</p>';
			echo '<p><small>Posted by '.$post->user->username.' at '.date('F j, Y, g:i a',$post->create_time).'</small></p>';
			
			echo '</div>';
			
			?>
		</div>
		<div class="col-lg-3">
			<h2>Category</h2>
			<?php
			use yii\bootstrap\Nav;
			$items=[];
			foreach($categories as $category){
			$items[]=['label' => $category->name , 'url' => '#'];
			}
			echo Nav::widget([
			'items' => $items,
			]);
			?>
		</div>
	</div>

    <div class="body-content">
	<hr></hr>
	<hr></hr>
	<h4>Komentar</h4>
	
        <?php
		echo $this->render('formComment', [
			'model' => $model,
		]);
		foreach($comments as $comment){
			echo "<div style='border-bottom:1px solid #ddd; padding:5px;margin:5px;'>";
			echo "<p class='pull-right'><small>
				  Comment by ".$comment->author." at ".date("F j, Y, g:i a",$comment->create_time).
				  "</small></p>";
			echo $comment->content;
			echo "</div>";
		}
		?>

    </div>
</div>
