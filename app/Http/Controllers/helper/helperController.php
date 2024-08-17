<?php

namespace App\Http\Controllers\helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class helperController extends Controller
{
    public static function getUid()
    {
        $bytes = random_bytes(10);
        $base64 = base64_encode($bytes);
        return rtrim(strtr($base64, '+/', '-_'), '=');
    }
}
