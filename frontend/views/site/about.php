<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
?>


<div class="site-about">
    

    <div class="box-text container">
		<div class="big-title">WEBDEV EEPIS Community</div>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tellus dui, auctor aliquet ultricies eu, ornare non mauris. Vestibulum eu velit dui. Fusce non tellus justo, vel dignissim orci. Duis interdum nunc sed dolor malesuada egestas. Mauris ullamcorper tempus ultrices. In viverra metus ut velit vehicula ut tincidunt lectus tincidunt. Nunc eget elit diam, eget molestie ipsum. In ornare rhoncus tristique. 
		Donec euismod dapibus odio eu eleifend. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris placerat, tortor sit amet aliquet pretium, massa lorem pellentesque ipsum, non lacinia neque arcu a nunc. Sed quis purus tortor. In euismod consequat tellus vitae interdum.
		</p>
	</div>
	
	<div class="box-team container">
		<div class="big-title">Keluarga Besar WEBDEV</div>
		<div class="box-person" style="text-align:center;">
			
			<?php 
			$count_member = count($members);
			$i = 1;
			$other_member = array();
			foreach($members as $member){ 
				if($i > 12){
					$other_member[] = $member;
				}else{
			?>
				<div class="item">
					<div class="img-box"><img src="<?= $member->photo; ?>"></div>
					<p class="name-tag">
						<?php 
							$name = explode(" ",$member->nama);
							echo $name[0];
						?>
					</p>
				</div>
			<?php 
				}
			} 
			?>
			
			<?php if($count_member > 12){ ?>
				
				<div class="box-see-more">
					<div class="click-see-more show1" onclick="$(this).hide();$('.click-see-more.hide1').show();$('.item-see-more').show('slow');" style="display: block;"><span>Lihat Lebih Banyak</span></div>
					<div class="item-see-more" style="display: none;">
					  <?php foreach($other_member as $member){ ?>
					  <div class="item">
						<div class="img-box"><img src="<?= $member->photo ?>"></div>
						  <p class="name-tag"><?= $member->name ?></p>
					  </div>
					  <?php } ?>
					</div>
					<div class="click-see-more hide1" onclick="$(this).hide();$('.click-see-more.show1').show();$('.item-see-more').hide('slow');" style="display: none;"><span>Sembunyikan</span></div>
				</div>
				
			<?php } ?>
		</div>
	</div>

	<div id="join-side">
		<div class="container">
			<div class="title-side">JOIN WITH US, WE LEARN, WORK, AND HAVE FUN TOGETHER</div>
			<a href="<?= Yii::$app->homeUrl."/member/register"; ?>" class="btn btn1">JOIN NOW</a>
		</div>
	</div>
	
    
</div>
