<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/CarDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Car.php');
// Obtención de la lista completa de Coches
function indexAction() {
    $carDAO = new CarDAO();
    return $carDAO->selectAll();
}
?>