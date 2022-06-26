<?php

require_once './autoload.php';


// Quand on instancie le Controller, on instancie dans le même temps la classe EntityRepository
$controller = new Controller\Controller;
// echo '<pre>'; print_r($controller); echo '</pre>';
$controller->index();
