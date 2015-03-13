<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use common\models\user;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => 255]) ?>

    
	<?= $form->field($model, 'konten')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>
	
    <div class="form-group">
		<label>Status</label>
		<select name="Post[status]" class="form-control">
			
			<?php if($model->isNewRecord) {?>
				<option value="1">Tampilkan</option>
				<option value="0">Pending</option>
			<?php }else{?>
				<option value="1" <?= ($model->status == 1) ? "selected" : "" ?>>Tampilkan</option>
				<option value="0" <?= ($model->status == 0) ? "selected" : "" ?>>Pending</option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Author Sebagai</label>
		<select name="Post[alias]" class="form-control">
			<?php if($model->isNewRecord){ 
					echo '<option value="1">Admin</option>';
					echo '<option value="0">'.Yii::$app->user->identity->username.'</option>';
			
				}else{ 
					if($model->alias == 1) {
						$sAdmin = 'selected';
						$sUser = '';
					}else{
						$sUser = 'selected';
						$sAdmin = '';
					}
			
					echo '<option value="1" '.$sAdmin.' >Admin</option>';
					echo '<option value="0" '.$sUser.'>';
						$user = User::find()->where(['id'=>$model->user_id])->one();
						echo $user->name;
					echo '</option>';
				} 
			?>
		</select>
	</div>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
		
    <?php ActiveForm::end(); ?>

</div>
