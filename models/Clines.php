<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clines".
 *
 * @property int $id
 * @property string $servidor
 * @property float $puerto
 * @property string $usuario
 * @property string $password
 * @property string $fecha_alta
 * @property int|null $cliente_id
 *
 * @property Clientes $cliente
 */
class Clines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['servidor', 'puerto', 'usuario', 'password', 'fecha_alta'], 'required'],
            [['puerto'], 'number'],
            [['fecha_alta'], 'safe'],
            [['cliente_id'], 'default', 'value' => null],
            [['cliente_id'], 'integer'],
            [['servidor', 'usuario', 'password'], 'string', 'max' => 255],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['cliente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'servidor' => 'Servidor',
            'puerto' => 'Puerto',
            'usuario' => 'Usuario',
            'password' => 'Password',
            'fecha_alta' => 'Fecha Alta',
            'cliente_id' => 'Cliente ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['id' => 'cliente_id'])->inverseOf('clines');
    }
}
