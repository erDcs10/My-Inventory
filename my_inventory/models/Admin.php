<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id_useradmin
 * @property string|null $username
 * @property string|null $password
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_useradmin' => 'Id Useradmin',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AdminQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdminQuery(get_called_class());
    }
}
