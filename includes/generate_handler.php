<?php

if (!empty($_POST['text'])) {
    include 'generate_qr.php';
} else {
    echo json_encode('Text field is empty');
}