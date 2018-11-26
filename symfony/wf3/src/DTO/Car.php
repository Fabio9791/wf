<?php
namespace App\DTO;

class Car
{
    public $brand;
    public $color;
    public $seats = [];
    private $model;
    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    
    
    
}

