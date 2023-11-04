<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once(dirname(__FILE__) . '/../../../persistence/DAO/CandidateDAO.php');
require_once(dirname(__FILE__) . '/../../models/Candidate.php');
require_once(dirname(__FILE__) . '/../../models/validations/ValidationsRules.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Llamo a la función en cuanto se redirige el action a esta página mediante metodo POST
    createAction();
}

function createAction() {
    // Obtención de los valores del formulario y validación
    $name = ValidationsRules::test_input($_POST["name"]);
    $surname = ValidationsRules::test_input($_POST["surname"]);
    $email = ValidationsRules::test_input($_POST["email"]);
    // Creación de objeto auxiliar
    $car = new Car();
    $car->setName($name );
    $car->setSurname($surname);
    $car->setEmail($email);
    //Creamos un objeto CandidateDAO para hacer las llamadas a la BD
    $carDAO = new CarDAO();
    $car->insert($car);
    
    header('Location: ../../../private/views/index.php');    
}