<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->name;
?>
<section class="content-header">
	<h1>
		Users
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li><a href="index">Users</a></li>
		<li class="active">Detail User</li>
	</ol>
</section>
<div class="user-view content">

    <h1><?= Html::encode($this->title) ?> 
	<small>
	<?php 
		if($model->status_legal==1) {
			echo "<div class='btn btn-success btn-sm'>Member</div>";
		
			if($model->status_user==1) 
				echo " <div class='btn btn-default btn-sm'>Administrator</div>";
			else if($model->status_user==2)
				echo " <div class='btn btn-warning btn-sm'>Super Administrator</div>";
		}
	?>
	</small></h1>
	
	<div class="row">
	<div class="col-md-6">
    <table class="table table-striped">
		<tr>
			<td width="25%">NRP</td>
			<td width="1%">:</td>
			<td><?= $model->nrp; ?></td>
		</tr>
		<tr><td>Departemen</td><td>:</td>
		<td><?= $model->departemen->nama ." ". $model->angkatan ?></td></tr>
		<tr><td>Jenis Kelamin</td><td>:</td>
		<td><?= $model->jenis_kelamin ?></td></tr>
		<tr><td>Tanggal Lahir</td><td>:</td>
		<td><?= $model->tanggal_lahir ?></td></tr>
		<tr><td>Nomor Telepon</td><td>:</td>
		<td><?= $model->nomor_telp ?></td></tr>
		<tr><td>Alamat Asal</td><td>:</td>
		<td><?= $model->alamat_asal ?></td></tr>
		<tr><td>Alamat Surabaya</td><td>:</td>
		<td><?= $model->alamat_sby ?></td></tr>
		<tr><td>Email</td><td>:</td>
		<td><?= $model->email ?></td></tr>
		<tr><td>Portofolio Lamaran</td><td>:</td>
		<td>
		<?php if($model->portofolio != null) {?>
			<a target="blank" href="<?= $model->portofolio->link ?>"><?= $model->portofolio->link ?></a></td></tr>
		<?php }else{ echo " - "; } ?>
	</table>
	
	<p>
	<hr></hr>
	
		<?php 
			if($model->status_legal == 0){
				echo Html::a('Accept Member', ['accept', 'id' => $model->id], [
						'class' => 'btn btn-success',
						'data' => [
							'confirm' => 'Apakah Anda yakin untuk menerima user ini menjadi Member?',
							'method' => 'post',
						],
					 ]);
				echo "&nbsp;&nbsp;".Html::a('Reject', ['reject', 'id' => $model->id], [
						'class' => 'btn btn-danger',
						'data' => [
							'confirm' => 'Apakah Anda yakin untuk menolak user ini menjadi member?',
							'method' => 'post',
						],
					]);
			}else{
				
				if(Yii::$app->user->identity->status_user == 2){
					if($model->status_user < 2){
						if($model->status_user == 0){
							echo Html::a('Become Admin', ['becomeadmin', 'id' => $model->id], ['class' => 'btn btn-default', 'data' => [
									'confirm' => 'Apakah Anda yakin untuk menjadikan user ini menjadi Admin?',
									'method' => 'post',
								],
							]);
						}else if($model->status_user == 1){
							echo Html::a('Remove Admin', ['removeadmin', 'id' => $model->id], ['class' => 'btn btn-default', 'data' => [
									'confirm' => 'Apakah Anda yakin untuk menghapus user ini menjadi Admin?',
									'method' => 'post',
								],
							]);
						}
					}
				}
				
				if(Yii::$app->user->identity->status_user > $model->status_user){
					echo "&nbsp;&nbsp;".Html::a('Hapus User', ['delete', 'id' => $model->id], [
						'class' => 'btn btn-danger',
						'data' => [
							'confirm' => 'Are you sure you want to delete this user?',
							'method' => 'post',
						],
					]);
				}
			}
		?>
	
	
	<?php
		if(Yii::$app->user->identity->status_user == 2 && $model->status_user < 2 && $model->status_legal == 1){
			echo "&nbsp;&nbsp;".Html::a('Become Super Admin', ['becomesuperadmin', 'id' => $model->id], ['class' => 'btn btn-warning', 'data' => [
					'confirm' => 'Apakah Anda yakin untuk menjadikan user ini menjadi Super Admin?',
					'method' => 'post',
				],
			]);
		}
	?>
	</p>		
	</div>
	<div class="col-md-6">
		<div class="box_photo">
				<?php
					if($model->photo != ''){
						$photo = $model->photo;
					}else{
						$photo = "nothing.png";
					}
				?>
				<div class="photo">
				<img src="<?php echo Yii::$app->request->baseUrl."/../assets/uploaded/".$photo; ?>">
				</div>
		</div>
	</div>
	</div>
</div>
