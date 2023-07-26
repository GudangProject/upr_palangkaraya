<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index()
    {
        // QrCode::format('png')generate('Jarwonozt', 'qrcode/qrcode.png');
        // dd('success');
        return view('admin.qrcode.index');
    }
}
