<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once(dirname(__FILE__) . '\..\conf\PersistentManager.php');
class CarDAO{
    const CREATURE_TABLE = 'creature';
    
    private $conn = null;
    
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }
    
    public function selectAll(){
        $query = "select * from " . CarDAO::CREATURE_TABLE;
        $result = mysqli_query($this->conn, $query);
        $cars = array();
        while ($carBD = mysqli_fetch_array($result)){
            $car = new Car();
            //Cambiar los "" por los campos de la tabla
            $car->setIdCandidate($carBD["idCAr"]);
            array_push($cars, $car);
        }
        return $cars;
    }
    
    public function insert($car){
        $query = "insert into ". CarDAO::CREATURE_TABLE .
                " (name, description, avatar, attackPower, lifeLevel, weapon) VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        //Cambiar los "" por los campos de la tabla
        
        mysqli_stmt_bind_param($stmt, 'sss', $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
        return $stmt->execute();
    }
    
    public function update($car) {
        $query = "UPDATE " . CarDAO::CREATURE_TABLE .
                " SET name=?, description=?, avatar=?, attackPower=?, lifeLevel=?, weapon=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $car->getName();
        $description= $car->getDescription();
        $avatar = $car->getBrand();
        $id = $car->getIdCar();
        $attackPower = $car->getPower();
        $lifeLevel = $car->getLifeLevel();
        $weapon = $car->getWheel();  
        mysqli_stmt_bind_param($stmt, 'sss', $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . CarDAO::CREATURE_TABLE . " WHERE idCar =?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }
}
