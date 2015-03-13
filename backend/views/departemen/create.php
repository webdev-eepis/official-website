<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Departemen */

$this->title = 'Create Departemen';
$this->params['breadcrumbs'][] = ['label' => 'Departemens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departemen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
