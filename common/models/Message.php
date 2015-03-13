<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $nama
 * @property string $email
 * @property string $pesan
 * @property integer $status
 * @property integer $created_at
 */
class Message extends \yii\db\ActiveRecord
{
	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => \yii\behaviors\TimestampBehavior::className(),
				'attributes' => [
					\yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
				],
			],
		];
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'pesan'], 'required'],
            [['pesan'], 'string'],
            [['status', 'created_at'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
            'nama' => '',
            'email' => '',
            'pesan' => '',
            'status' => '',
            'created_at' => '',
        ];
    }
}
