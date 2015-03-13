<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

?>
<section class="content-header">
	<h1>
		Posts
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li><a href="index">Posts</a></li>
		<li class="active">View Post</li>
	</ol>
</section>
<div class="post-view content">

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<div style="float:right">
		<?php 
			if($model->status == 0)
			echo Html::a('Click to show', ['updatestatus', 'id' => $model->id, 'status'=>1], ['class' => 'btn btn-default']);
			else if($model->status == 1)
			echo Html::a('Click to pending', ['updatestatus', 'id' => $model->id, 'status'=>0], ['class' => 'btn btn-default']);
		?>
		</div>
    </p>
	<div style="background:#fcfcfc; padding:20px 50px; border:solid 1px #ddd;">
		<h1><?= $model->judul ?> <small style="font-size:13px;">(Judul Posting)</small></h1>
		Author &emsp;&emsp; : 
		<?php 
			$user_id = $model->user_id;
			$user = User::find()->where(['id'=>$user_id])->one();
			echo $user->name;
		?>
		<br>Create at &emsp;  : <?= date('d M Y , H:i', $model->created_at) ?>
		<br>Status &emsp;&emsp; : 
		<?php
			if($model->status == 0) echo "<div class='btn btn-xs btn-warning'>Pending</div>";
			else if($model->status == 1) echo "<div class='btn btn-xs btn-success'>Ditampilkan</div>";
		?>
		<hr></hr>
		
		<p><?= $model->konten ?></p>
	</div>

</div>
