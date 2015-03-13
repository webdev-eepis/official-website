<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $nama
 * @property string $email
 * @property string $konten
 * @property integer $created_at
 * @property integer $status
 * @property integer $post_id
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'email', 'konten', 'created_at', 'status', 'post_id'], 'required'],
            [['konten'], 'string'],
            [['created_at', 'status', 'post_id'], 'integer'],
            [['nama', 'email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'email' => 'Email',
            'konten' => 'Konten',
            'created_at' => 'Created At',
            'status' => 'Status',
            'post_id' => 'Post ID',
        ];
    }
}
