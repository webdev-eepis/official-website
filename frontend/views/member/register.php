<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Departemen;
use yii\helpers\ArrayHelper;
use yii\captcha\Captcha;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form ActiveForm */
?>
<div class="member-register container">
	
	<h2>Hello, pertama buat akun Anda</h2>
	<p>Isilah form pendaftaran dibawah ini sesuai data diri Anda</p><br>
	<div class="row">
		<div class="col-md-8">
			<div class="box-form-register">
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
				<?php
				echo "<div class='form-group'>";
				echo '<label>Tanggal Lahir</label>';
				echo DatePicker::widget([
					'name' => 'RegisterForm[tanggal_lahir]', 
					'type' => DatePicker::TYPE_INPUT,
					'pluginOptions' => [
						'format' => 'dd MM yyyy',
					]
				]);
				echo "</div>";
				?>
				
				<label>Jenis Kelamin</label><br>
				<select class="form-control" id="registerform-jenis_kelamin" name="RegisterForm[jenis_kelamin]">
					<option value="laki-laki">Laki - laki</option>
					<option value="perempuan">Perempuan</option>
				</select>
				<br>
				<?= $form->field($model, 'nomor_telp') ?>
				<hr></hr>
				<?= $form->field($model, 'email') ?>
				<?= $form->field($model, 'username') ?>
				<?= $form->field($model, 'password')->passwordInput() ?>
				<?= $form->field($model, 'password_repeat')->passwordInput() ?>
				<hr></hr>
				<?= $form->field($model, 'link_portofolio') ?>
				<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
				
				<div class="form-group">
					<?= Html::submitButton('REGISTER NOW', ['class' => 'btn btn-primary btn-full']) ?>
				</div>
			<?php ActiveForm::end(); ?>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div><!-- member-register -->
