<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Departemen;
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Create User';
?>

<section class="content-header">
	<h1>
		Users
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li><a href="index">Users</a></li>
		<li class="active">Create New User</li>
	</ol>
</section>
<div class="user-create content">

    <h1><?= Html::encode($this->title) ?></h1>
	<hr></hr>
    <?php $form = ActiveForm::begin(['id' => 'form-register']); ?>

				<?= $form->field($model, 'nama') ?>
				<?= $form->field($model, 'nrp') ?>
				<label>Departemen</label><br>
				<?= Html::activeDropDownList($model, 'departemen',
					ArrayHelper::map(Departemen::find()->all(), 'id', 'nama'), ['class'=>'form-control']) ?>
					<br>
				<?= $form->field($model, 'angkatan') ?>
				<hr></hr>
				<?= $form->field($model, 'alamat_asal')->textarea() ?>
				<?= $form->field($model, 'alamat_sby')->textarea() ?>
				<?= $form->field($model, 'tanggal_lahir') ?>
				
				<div class="form-group">
				<label>Jenis Kelamin</label>
				<select class="form-control" name="CreateUserForm[jenis_kelamin]">
					<option value="laki-laki">Laki - laki</option>
					<option value="perempuan">Perempuan</option>
				</select>
				</div>
				
				<?= $form->field($model, 'nomor_telp') ?>
				<hr></hr>
				<?= $form->field($model, 'email') ?>
				<?= $form->field($model, 'username') ?>
				<?= $form->field($model, 'password')->passwordInput() ?>
				<?= $form->field($model, 'password_repeat')->passwordInput() ?>
				<hr></hr>
				<div class="form-group">
				<label>Status Member</label>
				<select class="form-control" name="CreateUserForm[status_legal]">
					<option selected value="1">Member</option>
					<option value="0">Not Member</option>
				</select>
				</div>
				<div class="form-group">
				<label>Status Admin</label>
				<select class="form-control" name="CreateUserForm[status_user]">
					<option selected value="0">Not Admin</option>
					<option value="1">Admin</option>
				</select>
				</div>
				<div class="form-group">
					<?= Html::submitButton('Create User', ['class' => 'btn btn-primary btn-full']) ?>
				</div>
			<?php ActiveForm::end(); ?>
    

</div>
