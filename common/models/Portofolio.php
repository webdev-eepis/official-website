<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "portofolio".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $judul
 * @property string $link
 * @property string $thumb
 * @property string $deskripsi
 * @property integer $created_at
 * @property integer $updated_at
 */
class Portofolio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => \yii\behaviors\TimestampBehavior::className(),
				'attributes' => [
					\yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
					\yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
				],
			],
		];
	}
    public static function tableName()
    {
        return 'portofolio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'judul', 'link'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'judul' => 'Judul',
            'link' => 'Link',
            'thumb' => 'Thumb',
            'deskripsi' => 'Deskripsi',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
