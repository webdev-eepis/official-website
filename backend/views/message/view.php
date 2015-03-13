<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Message */

$this->title = "Open Message";
?>
<section class="content-header">
	<h1>
		<?= "Message" ?>
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li><a href="index">Messages</a></li>
		<li class="active">Open Message</li>
	</ol>
</section>
<div class="message-view content">

    <div style="background:#fff; padding:30px; width:75%; margin:0 auto; border:solid 1px #DDD;">
    <p>
		<a href="index" class="btn btn-primary">Kembali</a>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= ($model->status==0) ? '<a href="reply?id='.$model->id.'" class="btn btn-warning">Reply</a>' : ''; ?>
    </p>
	
		<hr></hr>
			<?= ($model->status==0) ? "From : " : "To : " ?>
			<?= "<strong> $model->nama </strong>" ?>
			<?= "&nbsp;&nbsp;< $model->email >" ?>
			<div style="float:right"><?= date('d M Y, H:i', $model->created_at) ?></div>
		<hr></hr>
		<?= nl2br($model->pesan) ?>
		
	</div>

</div>
