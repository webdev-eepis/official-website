<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php
	$dataCategory=ArrayHelper::map(\common\models\Category::find()->asArray()->all(), 'id', 'name');
	echo $form->field($model, 'category_id')->dropDownList($dataCategory,
			 ['prompt'=>'-Choose a Category-'])
	?> 
	<?php
	echo $form->field($model, 'status')
		->dropDownList(
			['0'=>'Draft','1'=>'Publish'],
			['prompt'=>'']
		);
	?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
