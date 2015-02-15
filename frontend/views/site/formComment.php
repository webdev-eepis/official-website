<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form ActiveForm */
?>
<div class="site-formComment">

    <?php $form = ActiveForm::begin(); ?>
		<?php
		if (Yii::$app->user->isGuest) { ?>
			<?= $form->field($model, 'author')->textinput(['style'=>'width:50%;']) ?>
			<?= $form->field($model, 'email')->textinput(['style'=>'width:50%;']) ?>
			<?= $form->field($model, 'url')->textinput(['style'=>'width:50%;']) ?>
		<?php
		}
		?>
		<?= $form->field($model, 'content')->textarea(['rows'=>3]) ?>
        
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-formComment -->
