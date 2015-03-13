<style>
.table thead tr th{
	text-align:center !important;
}
</style>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
?>

<section class="content-header">
	<h1>
		<?= Html::encode($this->title) ?>
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li class="active">Users</li>
	</ol>
</section>

<section class="user-index content">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
				'class' => 'yii\grid\SerialColumn',
				'contentOptions'=>['style'=>'text-align:center;'],
			],

			 [
				'label' => 'Register Pada',
				'format' => 'raw',
				'attribute' => 'created_at',
				'value' => function($data){
					return "<strong>".date('d M Y', $data->created_at)."</strong> &nbsp;&nbsp;|&nbsp;&nbsp;".date('H:i', $data->created_at);
				},
				'filter' => false,
				'contentOptions'=>['style'=>'text-align:center; width:150px;'],
			 ],
             'nama',
			 [
				'attribute'=>'angkatan',
				'contentOptions'=>['style'=>'width: 30px; text-align:center;'],
			 ],
			 [
				'label' => 'Departemen',
				'attribute' => 'departemen_id',
				'value' => function ($data){
					return $data->departemen->nama;
				},
				'contentOptions'=>['style'=>'text-align:center; width:120px;'],
			],
             [
				'attribute'=>'jenis_kelamin',
				'contentOptions'=>['style'=>'text-align:center; width:50px;'],
			 ],
             [
				'attribute' => 'status_legal',
				'format' => 'raw',
				'value' => function ($data){
					if($data->status_legal == 1)
						return '<div class="btn btn-success btn-sm">Member</div>';
					else
						return '<div class="btn btn-warning btn-sm">Not Member</div>';
				},
				'filter' => false,
				'contentOptions'=>['style'=>'text-align:center; width:50px;'],
			 ],

            [
				'class' => 'yii\grid\ActionColumn',
				'contentOptions'=>['style'=>'text-align:center; width:100px;'],
				'template' => '{view} {delete}',
			],
        ],
    ]); ?>

</section>
