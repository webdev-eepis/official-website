<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>

<div style="font-family: 'Arial';font-size: 14px;color: #777;line-height: 22px;background-color: #eee;">

<div style="width: 400px;border: solid 1px #ddd;margin: 30px auto;padding: 40px;background-color: #fff;position: relative;">
	
	<div style="border-bottom: 1px solid #ddd;padding: 0px 0px 20px 0;margin-bottom: 30px;">
		<table width="100%">
			<tr>
				<td width="90%">
		<img src="http://i40.photobucket.com/albums/e210/rahmatheruka/logo2_zpsda2f8cbf.png?t=1412273633">
			</td>
			<td>
		<a href="https://www.facebook.com/groups/itce.webdev.community/" target="_blank"><div><img src="http://school.fultonschools.org/hs/creekside/SiteAssets/Pages/default/facebook-icon.png" width="30"></div></a>
			</td>
			</tr>
		</table>
	</div>
	

	<div class="content">
		<div style="position: relative;z-index: 1;">
			<p>Kepada <?= Html::encode($message->nama) ?>,</p>
			<p><?= $message->pesan ?></p>
		</div>
		
	</div>
	<div style="border-top: solid 1px #ddd;margin-top: 30px;padding: 20px 0 0 0;">&copy; Webdev EEPIS</div>
</div>

</div>