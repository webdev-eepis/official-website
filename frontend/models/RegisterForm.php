<?php
namespace frontend\models;

use common\models\User;
use common\models\Portofolio;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password, $password_repeat;
    public $nama, $nrp, $departemen, $angkatan;
	public $alamat_asal, $alamat_sby, $tanggal_lahir, $jenis_kelamin, $nomor_telp;
	public $link_portofolio;
	 public $verifyCode;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 8],
			['password_repeat', 'required', 'message'=>'Your password not same'],
			['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Your password not same'],
			
			['nama', 'required'],
			['nama', 'string', 'min' => 3],
			
			['nrp', 'required'],
			['nrp', 'integer', 'message'=>'Enter the valid NRP'],
			['nrp', 'string', 'min'=>10, 'max'=>10, 'tooShort'=>'Enter the valid NRP', 'tooLong'=>'Enter the valid NRP'],
			
			['departemen', 'required'],
			['angkatan', 'required'],
			['angkatan', 'integer', 'max'=>date('Y'), 'min'=>1945, 'message'=>'Are you kidding me?', 'tooBig'=>'Are you kidding me?', 'tooSmall'=>'Are you kidding me?'],
			
			['alamat_asal', 'required'],
			['alamat_asal', 'string', 'min' => 10],
			['alamat_sby', 'string', 'min' => 10],
			['tanggal_lahir', 'required'],
			['jenis_kelamin', 'required'],
			['nomor_telp', 'integer', 'message'=>'Give me the right phone number'],
			['nomor_telp', 'string', 'max'=>12, 'min'=>7, 'tooLong'=>'Give us your right phone number', 'tooShort'=>'Give us your right phone number'],
			
			['link_portofolio', 'required'],
			['verifyCode', 'captcha'],
        ];
    }
	
	public function attributeLabels()
    {
        return [
			'nrp' => 'NRP',
			'nama' => 'Nama',
            'angkatan' => 'Tahun Angkatan',
            'alamat_sby' => 'Alamat Surabaya',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'nomor_telp' => 'Nomor Telpon',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->nama			 = $this->nama;
			$user->nrp 			 = $this->nrp;
			$user->departemen_id = $this->departemen;
			$user->angkatan		 = $this->angkatan;
			$user->alamat_asal	 = $this->alamat_asal;
			$user->alamat_sby	 = $this->alamat_sby;
			$user->tanggal_lahir = $this->tanggal_lahir;
			$user->jenis_kelamin = $this->jenis_kelamin;
			$user->nomor_telp 	 = $this->nomor_telp;
            $user->email = $this->email;
			$user->username 	 = $this->username;
            $user->setPassword($this->password);
            $user->generateAuthKey();
			$user->generateId();
			$user->status_user	 = 0;
			$user->status_legal	 = 0;
			
			$portofolioa = new Portofolio();
			$portofolioa->link 	 = $this->link_portofolio;
			$portofolioa->user_id = $user->id;
			$portofolioa->judul = "First Portofolio";
			$portofolioa->thumb = "";
			$portofolioa->deskripsi = "This is my first portofolio";
			
			
            if ($user->save()) {
				$portofolioa->save();
                return true;
            }
        }

        return null;
    }
}
