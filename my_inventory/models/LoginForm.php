<?php
namespace app\models;

use yii;
use yii\base\Model;
use app\models\User;

class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !\Yii::$app->security->validatePassword($this->password, $user->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
    
            if ($user && $user->role === 'admin') {
                Yii::$app->user->login($user);
                Yii::$app->session->setFlash('success', 'Welcome, Admin!');
                return true;
            }
    
            if ($user && $user->role === 'user') {
                Yii::$app->user->login($user);
                Yii::$app->session->setFlash('success', 'Welcome, User!');
                return true;
            }
        }
    
        return false;
    }

    protected function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne(['username' => $this->username]);
        }
        return $this->_user;
    }
}
