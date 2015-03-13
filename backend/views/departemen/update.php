<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Departemen */

$this->title = 'Update Departemen: ' . ' ' . $model->id;

?>
<section class="content-header">
	<h1>
		Departemen
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i>Manage Dashboard</a></li>
		<li><a href="index">Departemen</a></li>
		<li class="active">Update</li>
	</ol>
</section>
<div class="departemen-update content">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
