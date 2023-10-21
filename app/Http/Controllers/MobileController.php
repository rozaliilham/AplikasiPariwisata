<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\HomeStay;
use App\Models\KomentarWisata;
use App\Models\News;
use App\Models\Reservasi;
use App\Models\Sambutan;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\StrukturOrganisasi;
use App\Models\User;
use App\Models\VisiMisi;
use App\Models\Wisata;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Midtrans;

class MobileController extends Controller
{

    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    public function index()
    {
        $setting = Setting::get();
        $response = [
            'message' => 'success',
            'data' => $setting,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function gallery()
    {
        $gallery = Gallery::get();
        $response = [
            'message' => 'success',
            'data' => $gallery,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function wisata()
    {
        $wisata = Wisata::get();
        $response = [
            'message' => 'success',
            'data' => $wisata,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
    public function wisatapopular()
    {
        $wisata = Wisata::orderByDesc('views')->limit(5)->get();
        $response = [
            'message' => 'success',
            'data' => $wisata,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function slider()
    {
        $slider = Slider::orderByDesc("id")->get();
        $response = [
            'message' => 'success',
            'data' => $slider,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function agenda()
    {
        $agenda = Event::orderByDesc("id")->get();
        $response = [
            'message' => 'success',
            'data' => $agenda,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
    public function news()
    {
        $news = News::orderByDesc("id")->get();
        $response = [
            'message' => 'success',
            'data' => $news,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
    public function sambutan()
    {
        $sambutan = Sambutan::get();
        $response = [
            'message' => 'success',
            'data' => $sambutan,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
    public function struktur()
    {
        $struktur = StrukturOrganisasi::get();
        $response = [
            'message' => 'success',
            'data' => $struktur,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
    public function visimisi()
    {
        $visimisi = VisiMisi::get();
        $response = [
            'message' => 'success',
            'data' => $visimisi,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function updateNewsViews($id)
    {
        $news = News::findOrFail($id);
        $news->update([
            "views" => $news->views + 1,
        ]);
        $response = [
            'message' => 'success',
            "data" => $news,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
    public function updateEventViews($id)
    {
        $event = Event::findOrFail($id);
        $event->update([
            "views" => $event->views + 1,
        ]);
        $response = [
            'message' => 'success',
            "data" => $event,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function updateWisataViews($id)
    {
        $wisata = Wisata::findOrFail($id);
        $wisata->update([
            "views" => $wisata->views + 1,
        ]);
        $response = [
            'message' => 'success',
            "data" => $wisata,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
    public function postCommentWisata(Request $request)
    {
        $validator = $request->validate(
            [
                'wisata_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'comment' => 'required',
            ]
        );
        try {
            $trx = KomentarWisata::create($validator);
            $response = [
                'message' => 'success',
                'data' => $trx,
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "$e",
            ]);
        }

    }

    public function komenwisata($id)
    {
        $komenwisata = KomentarWisata::where('wisata_id', $id)->get();
        $response = [
            'message' => 'success',
            'data' => $komenwisata,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function kirimpesan(Request $request)
    {
        $contact = Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
        ]);
        if ($contact) {
            $response = [
                'message' => 'success',
                'value' => 1,
                'data' => $contact,
            ];
        } else {
            $response = [
                'value' => 0,
                'message' => 'failed',
            ];
        }
        header('Content-Type: application / json; charset = utf-8');
        return $response;
    }

    public function getHomestay()
    {
        $data = HomeStay::where("status", "Tidak Dibooking")->latest()->get();
        $response = [
            'message' => 'success',
            'data' => $data,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password, "level" => "Member"])) {
            $token = Auth::user()->createToken('token')->plainTextToken;
            $user = array_merge(Auth::user()->toArray(), ['token' => $token]);
            $response = [
                'message' => 'success',
                'data' => $user,
                'response' => 1,
            ];
            return response()->json($response, Response::HTTP_OK);
        }
        $response = [
            'message' => 'Email atau password tidak ditemukan',
            "response" => 0,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function registermember(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'telp' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'password' => hash::make($request->password),
        ]);
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }
        return response()->json([
            'success' => false,
        ], 409);
    }

    public function myreservation($id)
    {
        $x = Reservasi::where('user_id', $id)->get();
        $response = [
            "data" => $x,
            "status" => "ok",
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function checkoutnomidtrans(Request $request)
    {
        $date1 = date_create($request->checkin);
        $date2 = date_create($request->checkout);
        $diff = date_diff($date1, $date2);
        $jumlah_hari = $diff->format("%d%");
        $check = CheckOut::create([
            "home_stay_id" => $request->homestay_id,
            "check_in" => $request->checkin,
            "check_out" => $request->checkout,
            "durasi" => $jumlah_hari,
            "price" => $request->price,
        ]);
        // $this->getSnapRedirect($check);
        $homestay = HomeStay::findOrFail($request->homestay_id);
        $homestay->update([
            "status" => "Booked",
        ]);
        // $this->getSnapToken($check);

        $reservasi = Reservasi::create([
            "home_stay_id" => $check->home_stay_id,
            "user_id" => $request->user_id,
            "check_out_id" => $check->id,
            "total" => $check->durasi * $check->price,
            "confirm_status" => "Menunggu konfirmasi admin",
        ]);

        $response = [
            "datacheckout" => $check,
            "idreservasi" => $reservasi->id,
            "reservasidata" => $reservasi,
            "status" => "ok",
        ];
        return response()->json($response, Response::HTTP_OK);

    }

    public function checkout(Request $request)
    {
        $date1 = date_create($request->checkin);
        $date2 = date_create($request->checkout);
        $diff = date_diff($date1, $date2);
        $jumlah_hari = $diff->format("%d%");
        $check = CheckOut::create([
            "home_stay_id" => $request->homestay_id,
            "check_in" => $request->checkin,
            "check_out" => $request->checkout,
            "durasi" => $jumlah_hari,
            "price" => $request->price,
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
                'order_id' => $check->id,
                'gross_amount' => $check->durasi * $check->price,
            ),
            "customer_details" => array(
                "first_name" => $request->name,
                "last_name" => $request->name,
                "email" => $request->email,
                "phone" => $request->telp,
                "address" => $request->alamat,
            ),

        );
        $reservasi = Reservasi::create([
            "home_stay_id" => $check->home_stay_id,
            "user_id" => $request->user_id,
            "check_out_id" => $check->id,
            "total" => $check->durasi * $check->price,
            "confirm_status" => "Menunggu konfirmasi admin",
        ]);
        $snaptoken = \Midtrans\Snap::getSnapToken($params);
        $reservasi->update([
            "snaptoken" => $snaptoken,
        ]);

        $response = [
            "data" => $check,
            "midtransdata" => $params,
            "idreservasi" => $reservasi->id,
            "reservasidata" => $reservasi,
            "status" => "ok",
        ];
        return response()->json($response, Response::HTTP_OK);

    }

    public function getsnaptoken($id)
    {
        $r = Reservasi::where("id","=",$id)->get();
        $response = [
            "data" => $r,
            "status" => "ok",
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
