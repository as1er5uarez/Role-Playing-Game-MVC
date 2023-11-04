<?php
/*
 * Proyecto integrador Artean - Concesionario
 * Cuatrovientos - 2º DAM - Desarrollo Web & Interfaces Web 
 * Aplicación PHP MVC: Crud
 * 
 * @version    0.3
 * @author     Asier Suárez <suarexasier@gmail.com>
*/

// Analize session
require_once('utils/SessionUtils.php');
// Redirects to login page in public views or private views
if(SessionUtils::loggedIn())
{
    // User has already been logged
    header("Location: app/private/views/index.php");
}
else
{
    // Not logged yet, anonimous access
    header("Location: app/public/views/index.php");
}
?>
