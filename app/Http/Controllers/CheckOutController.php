<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckOutRequest;
use App\Http\Requests\UpdateCheckOutRequest;
use App\Models\CheckOut;
use App\Models\HomeStay;
use App\Models\Reservasi;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCheckOutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->type == "Homestay") {
            $date1 = date_create($request->checkin); //mis. tgl chekin
            $date2 = date_create($request->checkout);
            $diff = date_diff($date1, $date2);
            $jumlah_hari = $diff->format("%d%"); //mis. tgl checkout
            $check = CheckOut::create([
                "home_stay_id" => $request->homestay_id,
                "check_in" => $request->checkin,
                "check_out" => $request->checkout,
                "durasi" => $jumlah_hari,
                "price" => $request->price,
                "code" => "Homestay-" . Str::random(6),
            ]);
            // $this->getSnapRedirect($check);
            $homestay = HomeStay::findOrFail($request->homestay_id);
            $homestay->update([
                "status" => "Booked",
            ]);
            // $this->getSnapToken($check);
            \Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = array(
                "transaction_details" => array(
                    'order_id' => $check->code,
                    'gross_amount' => $check->durasi * $check->price,
                ),
                "customer_details" => array(
                    "first_name" => auth()->user()->name,
                    "last_name" => "",
                    "email" => auth()->user()->email,
                    "phone" => auth()->user()->telp,
                    "address" => auth()->user()->alamat,
                ),

            );
            // $paymentUrl = \Midtrans\Snap::getSnapUrl($params);
            $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
            $reservasi = Reservasi::create([
                "home_stay_id" => $check->home_stay_id,
                "user_id" => auth()->user()->id,
                "check_out_id" => $check->id,
                "total" => $check->durasi * $check->price,
                "payment_url" => $paymentUrl,
                "confirm_status" => "Menunggu konfirmasi admin",
                "booking_code" => $check->code,
            ]);

            $snaptoken = \Midtrans\Snap::getSnapToken($params);
            $reservasi->update([
                "snaptoken" => $snaptoken,
            ]);

            session()->flash("success", "Check Out Berhasil");
            return redirect("member-bayar/" . $reservasi->id);
        }
    }

    public function callback(Request $request)
    {
        $serverkey = config("midtrans.server_key");
        $checkout_id = $request->order_id;
        $check = explode("-", $checkout_id);
        if ($check[0] == "Homestay") {
            $checkout = Reservasi::where("booking_code", "=", "$checkout_id")->first();
            $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverkey);
            if ($hashed == $request->signature_key) {
                if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
                    $checkout->payment_status = 'paid';
                } else if ($request->transaction_status == 'deny') {
                    $checkout->payment_status = 'failed';
                } else if ($request->transaction_status == 'pending') {
                    $checkout->payment_status = 'pending';
                } else if ($request->transaction_status == 'expire') {
                    $checkout->payment_status = 'failed';
                }
                $checkout->save();
            }
        }
    }

    public function getSnapRedirect(CheckOut $checkOut)
    {
        $orderId = $checkOut->id . "-" . Str::random(5);
        $price = $checkOut->durasi * $checkOut->price;
        $checkOut->midtrans_booking_code = $orderId;

        $transaction_details = [
            "order_id" => $orderId,
            "gross_amount" => $price,
        ];

        $item_details[] = [
            "id" => $orderId,
            "price" => $price,
            "quantity" => 1,
            "name" => $checkOut->HomeStay->name,
        ];

        $userData = [
            "first_name" => auth()->user()->name,
            "last_name" => "",
            "address" => auth()->user()->alamat,
            "email" => auth()->user()->email,
            "phone" => auth()->user()->telp,
            "country_code" => "IDN",
        ];

        $customer_details = [
            "first_name" => auth()->user()->name,
            "last_name" => "",
            "email" => auth()->user()->email,
            "phone" => auth()->user()->telp,
            "address" => auth()->user()->alamat,
            "billing_address" => $userData,
            "shipping_address" => $userData,
        ];

        $midtrans_params = [
            "transaction_details" => $transaction_details,
            "customer_details" => $customer_details,
            "items_details" => $item_details,
        ];

        try {
            $price = $checkOut->durasi * $checkOut->price;
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $bayar = new Reservasi();
            $bayar->homestay_id = $checkOut->home_stay_id;
            $bayar->user_id = auth()->user()->id;
            $bayar->check_out_id = $checkOut->id;
            $bayar->total = $price;
            $bayar->midtrans_booking_code = $orderId;
            $bayar->midtrans_url = $paymentUrl;
            $bayar->save();
            return $paymentUrl;
        } catch (Exception $e) {
            return false;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CheckOut  $checkOut
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CheckOut  $checkOut
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckOut $checkOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCheckOutRequest  $request
     * @param  \App\Models\CheckOut  $checkOut
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCheckOutRequest $request, CheckOut $checkOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckOut  $checkOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckOut $checkOut)
    {
        //
    }

    public function midtransCallback(Request $request)
    {
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $checkout_id = $notif->order_id;
        $checkout = Reservasi::where("midtrans_booking_code", "=", "$checkout_id")->first();

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $checkout->payment_status = 'pending';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $checkout->payment_status = 'paid';
            }
        } else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            }
        } else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $checkout->payment_status = 'failed';
        } else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $checkout->payment_status = 'paid';
        } else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $checkout->payment_status = 'pending';
        } else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $checkout->payment_status = 'failed';
        }

        $checkout->save();
        $setting = Setting::get();
        return view('pembayaran.index', compact("setting"));

    }

}
