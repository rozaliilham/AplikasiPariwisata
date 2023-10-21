<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use App\Models\Reservasi;
use App\Models\Setting;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index($id)
    {
        $r = Reservasi::findOrFail($id);
        $snaptoken = $r->snaptoken;
        $setting = Setting::get();
        return view('pembayaran.index', compact("setting","snaptoken","r"));

    }
    public function snap($id)
    {
        $r = Reservasi::findOrFail($id);
        $snaptoken = $r->snaptoken;
        $setting = Setting::get();
        return view('admin.layouts.snapmidtrans', compact("setting","snaptoken","r"));

    }
}
