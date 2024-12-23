<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    // Link this model to the 'user' table
    public static function tableName()
    {
        return 'user'; // Ensure this matches your database table name
    }
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 255]
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
        ];
    }
    // Implementing IdentityInterface methods
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // Not implemented for this example
    }

    public function getId()
    {
        return $this->id_user;
    }

    public function getAuthKey()
    {
        return null; // You can implement this if needed
    }

    public function validateAuthKey($authKey)
    {
        return false; // You can implement this if needed
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Gets query for [[Keranjangs]].
     *
     * @return \yii\db\ActiveQuery|KeranjangQuery
     */
    public function getKeranjangs()
    {
        return $this->hasMany(Keranjang::class, ['id_user' => 'id_user']);
    }

    /**
     * Gets query for [[Pemesanans]].
     *
     * @return \yii\db\ActiveQuery|PemesananQuery
     */
    public function getPemesanans()
    {
        return $this->hasMany(Pemesanan::class, ['id_user' => 'id_user']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
