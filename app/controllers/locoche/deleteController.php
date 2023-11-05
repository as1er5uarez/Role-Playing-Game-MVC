<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once(dirname(__FILE__) . '/../../../persistence/DAO/CarDAO.php');
require_once(dirname(__FILE__) . '/../../models/Car.php');
$carDAO = new CarDAO();

if ($_SERVER["REQUEST_METHOD"]== "GET"){
    deleteAction();
}

function deleteAction(){
    $id = $_GET["id"];
    $carDAO = new CarDAO();
    $carDAO->delete($id);
    header('Location: ../../../index.php');
}

