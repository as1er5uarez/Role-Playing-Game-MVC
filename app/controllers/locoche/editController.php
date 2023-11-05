<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once(dirname(__FILE__) . '/../../../persistence/DAO/CarDAO.php');
require_once(dirname(__FILE__) . '/../../models/Car.php');
require_once(dirname(__FILE__) . '/../../models/validations/ValidationsRules.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    editAction();
}

// Función encargada de editar ofertas
function editAction() {
    // Obtención de los valores del formulario y validación    
    /*$id = $_POST["id"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];*/
    // Creación de objeto auxiliar   
    $idCar = $_POST["id"];
    $name = ValidationsRules::test_input($_POST["name"]);
    $description = ValidationsRules::test_input($_POST["description"]);
    $brand = ValidationsRules::test_input($_POST["brand"]);
    $power = ValidationsRules::test_input($_POST["power"]);
    $lifeLevel = ValidationsRules::test_input($_POST["lifeLevel"]);
    $avatar = ValidationsRules::test_input($_POST["avatar"]);
    $car = new Car();
    $car->setIdCar($idCar);
    $car->setName($name);
    $car->setDescription($description);
    $car->setBrand($brand);
    $car->setPower($power);
    $car->setLifeLevel($lifeLevel);
    $car->setAvatar($avatar);
    //Creamos un objeto CandidateDAO para hacer las llamadas a la BD
    $carDAO = new CarDAO();
    $carDAO->update($car);

    header('Location: ../../../index.php');
}