<?php

namespace QRCodeGenerator;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class QRCodeGenerator
{
    public static function createQRCode($text)
    {
        return QrCode::create($text);
    }

    public static function outputQRCode($qrCode)
    {
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        header('Content-Type:' . $result->getMimeType());

        echo $result->getString();
    }
}
