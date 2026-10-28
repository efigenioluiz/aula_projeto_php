<?php
session_start();
require_once __DIR__ . '/../controllers/AuthController.php';
AuthController::exigirLogin();

require_once __DIR__ . '/../controllers/LivroController.php';

$controller = new LivroController();
$controller->index();
