<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Car{
    private $idCar;
    private $name;
    private $description;
    private $brand;
    private $power;
    private $lifeLevel;
    private $wheel;
    
    public function __construct(){
        
    }
    
    public function getIdCar() {
        return $this->idCar;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getPower() {
        return $this->power;
    }

    public function getLifeLevel() {
        return $this->lifeLevel;
    }

    public function getWheel() {
        return $this->wheel;
    }

    public function setIdCar($idCar): void {
        $this->idCar = $idCar;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setBrand($brand): void {
        $this->brand = $brand;
    }

    public function setPower($power): void {
        $this->power = $power;
    }

    public function setLifeLevel($lifeLevel): void {
        $this->lifeLevel = $lifeLevel;
    }

    public function setWheel($wheel): void {
        $this->wheel = $wheel;
    }

    function car2HTML() {
        $result = '<div class=" col-md-4 ">';
         $result .= '<div class="card ">';
          $result .= ' <img class="card-img-top rounded mx-auto d-block email" src='.$this->getBrand().' alt="Card image cap">';
            $result .= '<div class="card-block">';
                $result .= '<h2 class="card-title">' . $this->getName() . '</h2>';
                $result .= '<p class=" card-text description">'.$this->getDescription().'</p>';                    
             $result .= '</div>';
             $result .= ' <div  class=" btn-group card-footer" role="group">';
                $result .= '<a type="button" class="btn btn-secondary" href="app/views/detail.php?id='.$this->getIdCar().'">Detalles</a>';
                $result .= '<a type="button" class="btn btn-success" href="app/views/edit.php?id='.$this->getIdCar().'">Modificar</a> ';
                $result .= '<a type="button" class="btn btn-danger" href="app/controllers/deleteController.php?id='.$this->getIdCar().'">Borrar</a> ';
            $result .= ' </div>';
         $result .= '</div>';
     $result .= '</div>';
        
        
        return $result;
    }
}
