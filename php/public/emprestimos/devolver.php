<?php
session_start();
require_once __DIR__ . '/../controllers/AuthController.php';
AuthController::exigirLogin();

require_once __DIR__ . '/../controllers/EmprestimoController.php';

$controller = new EmprestimoController();
$controller->devolver((int) $_GET['id']);
