<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $password
 * @property string $auth_key
 * @property string $token_acti
 * @property string $token_clave
 * @property string $auth_key
 
 */
class Usuarios extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'password'], 'required'],
            [['nombre', 'email'], 'unique'],
            [['email', 'email']],
            [['nombre', 'auth_key','token_acti', 'token_clave' ], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'email' => 'E-mail'
        ];
    }

    /** Implementación de metodos de la interface */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
     * Metodo para logueo de servicios 
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    public function getId()
    {
        return $this->id;
    }
    /** Para logueo con cookies */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /** Para logueo con cookies */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
    /** FIN  Implementación de metodos de la interface */



    public static function findPorNombre($nombre)
    {
        return static::findOne(['nombre' => $nombre]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

}
