<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $name
 * @property string $nrp
 * @property integer $id_departemen
 * @property integer $angkatan
 * @property string $alamat_asal
 * @property string $alamat_sby
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $nomor_telp
 * @property integer $status_legal
 * @property integer $status_user
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Member extends ActiveRecord implements IdentityInterface
{
    const STATUS_NOT_LEGAL = 0;
    const STATUS_LEGAL = 1;
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

	public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'name', 'nrp', 'id_departemen', 'angkatan', 'alamat_asal', 'alamat_sby', 'tanggal_lahir', 'jenis_kelamin', 'nomor_telp', 'status_legal', 'status_user'], 'required'],
            [['id_departemen'], 'integer'],
            [['alamat_asal', 'alamat_sby'], 'string'],
            [['username', 'email', 'name'], 'string', 'max' => 255],
            [['nrp'], 'string', 'max' => 10],
            [['tanggal_lahir'], 'string', 'max' => 30],
            [['jenis_kelamin', 'nomor_telp'], 'string', 'max' => 15]
			['status_legal', 'default', 'value' => self::STATUS_NOT_LEGAL],
            ['status_legal', 'in', 'range' => [self::STATUS_LEGAL, self::STATUS_NOT_LEGAL]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'name' => 'Name',
            'nrp' => 'Nrp',
            'id_departemen' => 'Id Departemen',
            'angkatan' => 'Angkatan',
            'alamat_asal' => 'Alamat Asal',
            'alamat_sby' => 'Alamat Sby',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'nomor_telp' => 'Nomor Telp',
            'status_legal' => 'Status Legal',
            'status_user' => 'Status User',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
	
	public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
	
	public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
	
	public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
	
	public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
	
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
