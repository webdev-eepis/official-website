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
			<p>Kepada <?= Html::encode($user->name) ?>,</p>
			<p><span style="font-weight:bold; color:#999; font-size:20px;">Selamat datang dan selamat bergabung di komunitas Web Developer PENS.</span></b>
			<div style="margin:10px 0; ">
				Kami biasanya kumpul setiap hari Rabu, Jam 18:00 WIB, di B301, kami mengharapkan Anda bisa istiqomah mengikuti setiap gatheringnya
			</div>
				Berikut adalah barcode ID member Anda, simpan barcode ini sebagai bukti identitas Member kamu</p>
		</div>
		<div style="text-align: center;margin-top: -45px;position: relative;z-index: 0;"><img src="https://chart.googleapis.com/chart?chs=400x400&cht=qr&chl=<?= $user->id; ?>"></div>
		<a href="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=<?= $user->id; ?>" download>
			<div style="width: 290px;text-align: center; color:#fff; background-color: #2880B8;padding: 20px 0;margin-top:-30px;margin-left:55px;font-weight: bold;z-index: 2;position: relative;">Download Code</div></a>
		<br>
		<p style="background-color:#efefef; padding:10px; color:#444;">
			Dan dibawah ini sudah kami berikan lampiran berupa template design untuk kartu identitas, mohon masukkan barcode ID dan identitas Anda kedalam design template dan silahkan dicetak, karena kartu ini akan menjadi alat presensi pertemuan.
		</p>
	</div>
	<div style="border-top: solid 1px #ddd;margin-top: 30px;padding: 20px 0 0 0;">&copy; Webdev EEPIS</div>
</div>

</div>