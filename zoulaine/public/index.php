<?php
session_start();
require_once '../config/db.php';
require_once '../controleur/FrontController.php';

// Instancie et exécute le FrontController
$frontController = new FrontController();
$frontController->handleRequest();
