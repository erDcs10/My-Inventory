<?php

namespace app\models;

use yii;
use yii\base\Model;
use app\models\User;

class UserRegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirm_password;

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'confirm_password'], 'required'],
            ['email', 'email'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password'],
            [['username', 'email'], 'unique', 'targetClass' => User::class], // Check uniqueness in User table
        ];
    }

    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->created_at = date('Y-m-d H:i:s', time());
            $user->updated_at = date('Y-m-d H:i:s', time());

            if ($user->save()) {
                return true;
            } else {
                Yii::error('User could not be saved: ' . json_encode($user->errors));
                return false;
            }
        }
        return false;
    }
}

