<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = 'Edit Post';
?>
<section class="content-header">
	<h1>
		Posts
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li><a href="index">Posts</a></li>
		<li><a href="view?id=<?= $model->id ?>">View Post</a></li>
		<li class="active">Edit Post</li>
	</ol>
</section>
<div class="post-update content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
