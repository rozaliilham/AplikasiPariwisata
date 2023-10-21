<?php

namespace App\Http\Controllers;

use App\Models\CheckOutProduct as ModelsCheckOutProduct;
use App\Models\Pembelian;
use App\Models\Setting;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index($id)
    {
        $r = ModelsCheckOutProduct::findOrFail($id);
        $setting = Setting::get();
        return view('pembelian.index', compact("setting", "r"));
    }

    public function store(Request $request)
    {

        $beli = new Pembelian();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('bukti-bayar/', $filename);
            $beli->bukti_tf = $filename;
        }
        $beli->produk_id = $request->produk_id;
        $beli->telp = $request->telp;
        $beli->nama = $request->nama;
        // $beli->bukti_tf = $path;
        $beli->check_out_product_id = $request->checkout_id;
        $beli->total = $request->total;
        $beli->payment_status = "paid";
        $beli->save();
        session()->flash("success", "Pembayaran Berhasil");
        return redirect('product-front');

    }

}
