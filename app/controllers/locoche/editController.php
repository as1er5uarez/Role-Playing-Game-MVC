<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once(dirname(__FILE__) . '/../../persistence/DAO/CarDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Car.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
    $car = new Car();
    $car->setIdCandidate($id);
    $car->setName($name);
    $car->setSurname($surname);
    $car->setEmail($email);
    //Creamos un objeto CandidateDAO para hacer las llamadas a la BD
    $carDAO = new CarDAO();
    $carDAO->update($car);

    header('Location: ../../index.php');
}