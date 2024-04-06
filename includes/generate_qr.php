<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use QRCodeGenerator\QRCodeGenerator;

$text = $_POST['text'];
$qrCode = QRCodeGenerator::createQRCode($text);
QRCodeGenerator::outputQRCode($qrCode);