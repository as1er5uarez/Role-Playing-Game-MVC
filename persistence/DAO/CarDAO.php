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
            $car->setIdCar($carBD["idCar"]);
            $car->setName($carBD["name"]);
            $car->setDescription($carBD["description"]);
            $car->setAvatar($carBD["avatar"]);
            $car->setLifeLevel($carBD["lifeLevel"]);
            $car->setBrand($carBD["brand"]);
            array_push($cars, $car);
        }
        return $cars;
    }
    
    public function insert($car){
        $query = "insert into ". CarDAO::CREATURE_TABLE .
                "(name, description, avatar, power, lifeLevel, brand) VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        //Cambiar los "" por los campos de la tabla
        $name = $car->getName();
        $description= $car->getDescription();
        $avatar = $car->getAvatar();
        $power = $car->getPower();
        $id = $car->getIdCar();
        $lifeLevel = $car->getLifeLevel();
        $brand = $car->getBrand();
        mysqli_stmt_bind_param($stmt, 'ssssss', $name, $description,$avatar, $power, $lifeLevel, $brand);
        return $stmt->execute();
    }

    public function selectById($id) {
        $query = "SELECT name, description, brand, power, lifeLevel, avatar FROM " . CarDAO::CREATURE_TABLE . " WHERE idCar=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $name, $description, $brand, $power, $lifeLevel, $avatar);

        $car = new Car();
        while (mysqli_stmt_fetch($stmt)) {
            $car->setIdCar($id);
            $car->setName($name);
            $car->setDescription($description);
            $car->setAvatar($avatar);
            $car->setBrand($brand);
            $car->setPower($power);
            $car->setLifeLevel($lifeLevel);
        }

        return $car;
    }
    
    public function update($car) {
        $id = $car->getIdCar();
        $query = "UPDATE " . CarDAO::CREATURE_TABLE .
                " SET name=?, description=?, avatar=?, power=?, lifeLevel=?, brand=? where idCar=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $id = $car->getIdCar();
        $name = $car->getName();
        $description= $car->getDescription();
        $avatar = $car->getAvatar();
        $power = $car->getPower();
        $id = $car->getIdCar();
        $lifeLevel = $car->getLifeLevel();
        $brand = $car->getBrand();
        mysqli_stmt_bind_param($stmt, 'sssssss', $name, $description, $avatar, $power, $lifeLevel, $brand, $id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . CarDAO::CREATURE_TABLE . " WHERE idCar =?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }
}

