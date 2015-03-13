<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User: ' . ' ' . $model->name;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content-header">
	<h1>
		Users
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li><a href="index">Users</a></li>
		<li><a href="<?= "view?id=".$model->id ?>">Detail User</a></li>
		<li class="active">Update Status User</li>
	</ol>
</section>
<div class="user-form content">
	<h3><?= $this->title; ?></h3>
	<hr></hr>
    <?php $form = ActiveForm::begin(); ?>
	
	<div class="form-group">
	<label>Status Member</label>
    <select name="User[status_legal]" class="form-control">
		<option value="0" <?= ($model->status_legal == 0) ? "selected" : "" ?> >Not Member</option>
		<option value="1" <?= ($model->status_legal == 1) ? "selected" : "" ?>>Member</option>
	</select>
	</div>
    <div class="form-group">
	<label>Status Admin</label>
    <select name="User[status_admin]" class="form-control">
		<option value="0" <?= ($model->status_user == 0) ? "selected" : "" ?> >Not Admin</option>
		<option value="1" <?= ($model->status_user == 1) ? "selected" : "" ?>>Admin</option>
	</select>
	</div>
    

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

