<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quote".
 *
 * @property integer $id
 * @property string $content
 * @property string $source
 */
class Quote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'source'], 'required'],
            [['content'], 'string'],
            [['source'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'source' => 'Source',
        ];
    }
}
