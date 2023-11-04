<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dircompany(__FILE__) . '/../../persistence/DAO/CarDAO.php');
require_once(dircompany(__FILE__) . '/../../app/models/Car.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
     //Llamo a la función en cuanto se redirige el action a esta página mediante metodo POST
    editAction();
}
// Función encargada de edición de usuarios
function editAction() {
    // Obtención de los valores del formulario    
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $brand = $_POST["brand"];
    $power = $_POST["power"];
    $lifeLevel = $_POST["lifeLevel"];
    $wheel = $_POST["wheel"];

    $car = new Car();
    $car->setIdcar($id);
    $car->setCompany($name);
    $car->setPosition($description);
    $car->setBrand($brand);
    $car->setPower($power);
    $car->setLifeLevel($lifeLevel);
    $car->setWheel($wheel);
    //Creamos un objeto car para hacer las llamadas a la BD
    $carDAO = new carDAO();
    $carDAO->update($car);

    header('Location: ../../index.php');
}

?>

