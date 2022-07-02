<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function gerarQrcode()
    {
        $link = "df9763a3-fb58-48c8-b9ab-26ac6a0f161e";

        return  $link;
    }
}
