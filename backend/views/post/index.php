<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
?>

<section class="content-header">
	<h1>
		<?= Html::encode($this->title) ?>
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li class="active">Posts</li>
	</ol>
</section>

<div class="post-index content">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','contentOptions'=>['style'=>'text-align:center; width:50px;'],],

            'judul',
            [
				'label' => 'Dipost Pada',
				'format' => 'raw',
				'attribute' => 'created_at',
				'value' => function($data){
					return "<strong>".date('d M Y', $data->created_at)."</strong> &nbsp;&nbsp;|&nbsp;&nbsp;".date('H:i', $data->created_at);
				},
				'filter' => false,
				'contentOptions'=>['style'=>'text-align:center; width:150px;'],
			 ],
             [
				'label' => 'Status',
				'format' => 'raw',
				'attribute' => 'status',
				'value' => function ($data){
					if($data->status == 1)
						return '<div class="btn btn-success btn-sm">Ditampilkan</div>';
					else
						return '<div class="btn btn-warning btn-sm">Pending</div>';
				},
				'filter' => false,
				'contentOptions'=>['style'=>'text-align:center; width:50px;'],
			 ],
            // 'user_id',

            [
				'class' => 'yii\grid\ActionColumn',
				'contentOptions'=>['style'=>'text-align:center; width:100px;'],
				'template' => '{view} {delete}',
			],
        ],
    ]); ?>

</div>
