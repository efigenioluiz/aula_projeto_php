<?php
session_start();
require_once __DIR__ . '/../controllers/AuthController.php';
AuthController::exigirLogin();

require_once __DIR__ . '/../controllers/AlunoController.php';

$controller = new AlunoController();
$controller->criar();
