<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $judul
 * @property string $konten
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $user_id
 * @property string $alias
 */
class Post extends \yii\db\ActiveRecord
{
	
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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'konten', 'status', 'alias'], 'required'],
            [['judul'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
	
	public function slugString($string) {
		$string = strtolower($string);
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		$string = preg_replace("/[\s-]+/", " ", $string);
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}
	
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'konten' => 'Konten',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }
	
	public static function selectPostsLimit($limit){
		$model = static::find()->where(['status'=>1])->orderby('id DESC')->limit($limit)->all();
		return $model;
	}
	
	public function findAuthor($user_id){
		$author = User::find()->where(['id'=>$user_id])->one();
		return $author->username;
	}
	
	public function findThumb($article){
		$cari_gambar = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $article, $matches);
		if($cari_gambar){
			return $matches [1][0];
		}else{
			return 'http://www.balaniinfotech.com/wp-content/themes/balani/images/noimage.jpg';
		}
	}
}
