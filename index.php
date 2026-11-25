<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controllers/BlogController.php';

$search = isset($_GET['search']) ? trim((string) $_GET['search']) : '';

$controller = new BlogController();
$controller->showAllPosts($search);