<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = 'Create Post';
?>

<section class="content-header">
	<h1>
		<?= Html::encode($this->title) ?>
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li><a href="index">Posts</a></li>
		<li class="active">Create New</li>
	</ol>
</section>

<div class="post-create content">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
