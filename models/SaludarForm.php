<?php

namespace app\models;

use yii\base\Model;

class SaludarForm extends Model
{
    public $nombre;
    public $email;
    public $telefono;
    public $web;

    public function rules()
    {
        return [
            [['nombre', 'email','telefono', 'web'], 'required'],
            ['email', 'email'],
            [['telefono'], 'number', 'max'=>999999999],
            [['web'], 'url'],
        ];
    }
}