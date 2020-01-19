<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property string $nombre
 * @property string $telefono
 * @property string|null $direccion
 * @property string|null $nota
 *
 * @property Clines[] $clines
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'telefono'], 'required'],
            [['nombre', 'direccion', 'nota'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 9],
            [['nota', 'direccion'],'default', 'value' => null],
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
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'nota' => 'Nota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClines()
    {
        return $this->hasMany(Clines::className(), ['cliente_id' => 'id'])->inverseOf('cliente');
    }
}
