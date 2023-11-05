<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once(dirname(__FILE__) . '/../../../persistence/DAO/CarDAO.php');
require_once(dirname(__FILE__) . '/../../models/Car.php');
require_once(dirname(__FILE__) . '/../../models/validations/ValidationsRules.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Llamo a la función en cuanto se redirige el action a esta página mediante metodo POST
    createAction();
}

function createAction() {
    // Obtención de los valores del formulario y validación
    $name = ValidationsRules::test_input($_POST["name"]);
    $description = ValidationsRules::test_input($_POST["description"]);
    $brand = ValidationsRules::test_input($_POST["brand"]);
    $power = ValidationsRules::test_input($_POST["power"]);
    $lifeLevel = ValidationsRules::test_input($_POST["lifeLevel"]);
    $avatar = ValidationsRules::test_input($_POST["avatar"]);


    // Creación de objeto auxiliar
    $car = new Car();
    $car->setName($name );
    $car->setDescription($description);
    $car->setBrand($brand);
    $car->setPower($power);
    $car->setLifeLevel($lifeLevel);
    $car->setAvatar($avatar);
    //Creamos un objeto CandidateDAO para hacer las llamadas a la BD
    $carDAO = new CarDAO();
    $carDAO->insert($car);
    
    header('Location: ../../../index.php');    
}