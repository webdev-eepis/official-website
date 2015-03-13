<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DepartemenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departemen';

?>

<section class="content-header">
	<h1>
		<?= Html::encode($this->title) ?>
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li class="active">Departemen</li>
	</ol>
</section>
<div class="departemen-index content">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Departemen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
			'contentOptions' => ['style'=>'text-align:center;']],

            'nama',

            [
				'class' => 'yii\grid\ActionColumn',
				'contentOptions' => ['style'=>'text-align:center;'],
			],
        ],
    ]); ?>

</div>
