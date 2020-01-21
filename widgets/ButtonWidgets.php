<?php
namespace app\widgets;

use yii\base\Widget;

class ButtonWidgets extends Widget
{

    public $texto;
    public function init()
    {
        parent::init();
        $this->texto = ucfirst($this->texto);     // Primera letra en mayuscula
    }
    
    public function run() 
    {
        parent::run();
        return '<button>'. $this->texto .'</button>';

    }

}