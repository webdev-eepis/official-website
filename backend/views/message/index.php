<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
?>
<section class="content-header">
	<h1>
		<?= Html::encode($this->title) ?>
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li class="active">Messages</li>
	</ol>
</section>
<div class="message-index content">

	<!-- MAILBOX BEGIN -->
	<div class="mailbox row">
	<div class="col-xs-12">
	<div class="box box-solid">
	<div class="box-body">
		<div class="row">
			<div class="col-md-3 col-sm-4">
				<div class="box-header">
					<i class="fa fa-inbox"></i>
					<h3 class="box-title"><?= strtoupper($hal) ?></h3>
				</div>
				
				<!-- Navigation - folders-->
				<div style="margin-top: 15px;">
					<ul class="nav nav-pills nav-stacked">
						<li class="header">Folders</li>
						<li <?php if($hal=='inbox')echo 'class="active"'; ?>><a href="<?= Yii::$app->homeUrl; ?>/message/index?hal=inbox"><i class="fa fa-inbox"></i> Inbox</a></li>
						<li <?php if($hal=='sent')echo 'class="active"'; ?>><a href="<?= Yii::$app->homeUrl; ?>/message/index?hal=sent"><i class="fa fa-mail-forward"></i> Sent</a></li>
					</ul>
				</div>
			</div><!-- /.col (LEFT) -->
			<div class="col-md-9 col-sm-8">
				<br></br>
				<div class="table-responsive">
				 <?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn','contentOptions'=>['style'=>'text-align:center; width:30px;'],],

						'email:email',
						[
							'attribute'=>'created_at',
							'value' => function($data){
								return date('d M Y, H:i', $data->created_at);
							},
							'contentOptions'=>['style'=>'text-align:center; width:170px;'],
							'filter'=>false,
						],
						[
							'format'=>'raw',
							'value' => function($data){
								
								$return = "".
									Html::a('open', ['view', 'id' => $data->id], [
										'class' => 'btn btn-primary btn-sm',
									]) ." ".
									Html::a('Delete', ['delete', 'id' => $data->id, 'hal'=>$data->status], [
										'class' => 'btn btn-danger btn-sm',
										'data' => [
											'confirm' => 'Are you sure you want to delete this item?',
											'method' => 'post',
										],
									])
								."";
								
								return $return;
								
							},
							'contentOptions'=>['style'=>'text-align:center; width:140px;'],
						]
						
					],
				]); ?>  
				</div><!-- /.table-responsive -->
			</div><!-- /.col (RIGHT) -->
		</div><!-- /.row -->
	</div><!-- /.box-body -->
	</div><!-- /.box -->
	</div><!-- /.col (MAIN) -->
	</div>
    <!-- MAILBOX END -->

</div>
