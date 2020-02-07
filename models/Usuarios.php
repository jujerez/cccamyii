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
 * @property string|null $email
 * @property string|null $auth_key
 * @property string|null $token_acti
 * @property string|null $token_clave
 */
class Usuarios extends \yii\db\ActiveRecord implements IdentityInterface
{
    const SCENARIO_CREAR = 'crear';
    const SCENARIO_MODIFICAR = 'modificar';
    public $password_repeat;
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
           
            [['nombre', 'password'], 'required', 'on' =>  self::SCENARIO_DEFAULT],
            [['nombre', 'auth_key', 'token_acti', 'token_clave'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 60],
            [['nombre', 'email'], 'unique'],
            [['email'], 'required', 'on' => self::SCENARIO_CREAR],
            [['email'], 'email'],

           
            [['password_repeat'],'required','on' => self::SCENARIO_CREAR],
            [['password_repeat'],
                'compare',
                'compareAttribute' => 'password',
                'skipOnEmpty' => false,
                'on' => [self::SCENARIO_CREAR, self::SCENARIO_MODIFICAR],
            ],
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
            'password' => 'Contraseña',
            'password_repeat' => ' Repetir Contraseña',
            'email' => ' Correo electronico',
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

    public function beforeSave($insert)
    {
        $security = Yii::$app->security;
        
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($insert) {
            if ($this->scenario === self::SCENARIO_CREAR) {
                $this->auth_key = $security->generateRandomString();
                $this->password = $security->generatePasswordHash($this->password);
            }
        } else {
            if ($this->scenario === self::SCENARIO_MODIFICAR) {
                if ($this->password === '') {
                    $this->password = $this->getOldAttribute('password');
                } else {
                    $this->password = $security->generatePasswordHash($this->password);
                }
            }
        }

        return true;
    }
}