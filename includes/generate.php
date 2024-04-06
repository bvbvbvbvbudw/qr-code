<?php

require dirname(__DIR__) . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'generate_handler.php';
} else {
    echo json_encode(['error' => 'Invalid request method']);
}