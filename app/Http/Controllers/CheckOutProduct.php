<?php

namespace App\Http\Controllers;

use App\Models\CheckOutProduct as ModelsCheckOutProduct;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckOutProduct extends Controller
{

    public function checkout(Request $request)
    {
        $product = Produk::findOrFail($request->product_id);
        if ($request->qty > $product->stok) {
            session()->flash("error", "Stok Tidak Tersedia");
            return redirect()->back();

        } else {
            $check = ModelsCheckOutProduct::create([
                "produk_id" => $request->product_id,
                "qty" => $request->qty,
                "price" => $request->price,
                "code" => "Product-" . Str::random(6),
            ]);
            $product->stok = $product->stok - $request->qty;
            $product->save();
            session()->flash("success", "Check Out Berhasil");
            return redirect("member-bayar-product/" . $check->id);
        }
    }
}
