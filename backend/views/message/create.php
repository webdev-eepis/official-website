<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Message */

$this->title = 'Compose Message';
?>
<section class="content-header">
	<h1>
		<?= "Message" ?>
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li><a href="index">Messages</a></li>
		<li class="active">Compose Message</li>
	</ol>
</section>
<div class="message-create content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
