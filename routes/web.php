<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CheckOutProduct as ControllersCheckOutProduct;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembelianController;
use App\Http\Livewire\Category;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Detailpenjualan;
use App\Http\Livewire\Detailproduct;
use App\Http\Livewire\Editproduct;
use App\Http\Livewire\Event\Detailevent;
use App\Http\Livewire\Event\Editevent;
use App\Http\Livewire\Event\Event;
use App\Http\Livewire\Event\Formevent;
use App\Http\Livewire\Fasilitas\Fasilitas;
use App\Http\Livewire\Formproduct;
use App\Http\Livewire\Frontend\Auth\Login;
use App\Http\Livewire\Frontend\Auth\Register;
use App\Http\Livewire\Frontend\Bycategorywisata;
use App\Http\Livewire\Frontend\Category as FrontendCategory;
use App\Http\Livewire\Frontend\Detailevent as FrontendDetailevent;
use App\Http\Livewire\Frontend\Detailhomestay;
use App\Http\Livewire\Frontend\Detailnews as FrontendDetailnews;
use App\Http\Livewire\Frontend\Detailproduct as FrontendDetailproduct;
use App\Http\Livewire\Frontend\Detailwisata as FrontendDetailwisata;
use App\Http\Livewire\Frontend\Event as FrontendEvent;
use App\Http\Livewire\Frontend\Gallery as FrontendGallery;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\Homestay as FrontendHomestay;
use App\Http\Livewire\Frontend\Kontak;
use App\Http\Livewire\Frontend\News as FrontendNews;
use App\Http\Livewire\Frontend\Product as FrontendProduct;
use App\Http\Livewire\Frontend\Sambutan;
use App\Http\Livewire\Frontend\Struktur;
use App\Http\Livewire\Frontend\Video as FrontendVideo;
use App\Http\Livewire\Frontend\Visimisi as FrontendVisimisi;
use App\Http\Livewire\Frontend\Wisata as FrontendWisata;
use App\Http\Livewire\Gallery\Editgallery;
use App\Http\Livewire\Gallery\Formgallery;
use App\Http\Livewire\Gallery\Gallery;
use App\Http\Livewire\Homestay\Detailhomestay as HomestayDetailhomestay;
use App\Http\Livewire\Homestay\Edithomestay;
use App\Http\Livewire\Homestay\Formhomestay;
use App\Http\Livewire\Homestay\Homestay;
use App\Http\Livewire\Kabupaten;
use App\Http\Livewire\Kecamatan;
use App\Http\Livewire\Komentarberita;
use App\Http\Livewire\Komentarwisata;
use App\Http\Livewire\Member\Bookingsaya;
use App\Http\Livewire\Member\Detailhomestay as MemberDetailhomestay;
use App\Http\Livewire\Member\Invoice;
use App\Http\Livewire\Member\Memberarea;
use App\Http\Livewire\Member\Product\Checkoutproduct;
use App\Http\Livewire\Member\Product\Detailpembelian;
use App\Http\Livewire\Member\Product\Detailproduct as ProductDetailproduct;
use App\Http\Livewire\Member\Product\Pembelian;
use App\Http\Livewire\Member\Product\Product as ProductProduct;
use App\Http\Livewire\Member\Reservasi;
use App\Http\Livewire\News\Detailnews;
use App\Http\Livewire\News\Editnews;
use App\Http\Livewire\News\Formnews;
use App\Http\Livewire\News\News;
use App\Http\Livewire\Norek;
use App\Http\Livewire\Penjualan;
use App\Http\Livewire\Penjualanpedagang\Detailpenjualan as PenjualanpedagangDetailpenjualan;
use App\Http\Livewire\Penjualanpedagang\Detailpenjualanbeli;
use App\Http\Livewire\Penjualanpedagang\Penjualanpedagang;
use App\Http\Livewire\Product;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Reservasi\Detailreservasi;
use App\Http\Livewire\Reservasi\Reservasi as ReservasiReservasi;
use App\Http\Livewire\Setting;
use App\Http\Livewire\Settingpembayaran;
use App\Http\Livewire\Slider;
use App\Http\Livewire\StrukturOrganisasi;
use App\Http\Livewire\User;
use App\Http\Livewire\Video\Editvideo;
use App\Http\Livewire\Video\Formvideo;
use App\Http\Livewire\Video\Video;
use App\Http\Livewire\Visimisi\Visimisi;
use App\Http\Livewire\Wisata\Detailwisata;
use App\Http\Livewire\Wisata\Editwisata;
use App\Http\Livewire\Wisata\Formwisata;
use App\Http\Livewire\Wisata\Wisata;
use App\Models\Category as ModelsCategory;
use App\Models\Setting as ModelsSetting;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',Home::class)->name('home');
Route::get('/sambutan',Sambutan::class)->name('sambutan');
Route::get('/frontgaleri',FrontendGallery::class)->name('frontgaleri');
Route::get('/berita',FrontendNews::class)->name('berita');
Route::get('/eventfront',FrontendEvent::class)->name('eventfront');
Route::get('/wisatafront',FrontendWisata::class)->name('wisatafront');
Route::get('/beritacategori',[FrontController::class,'index'])->name('beritacategori');
Route::get('/visimisi',FrontendVisimisi::class)->name('visimisi');
Route::get('/struktur',Struktur::class)->name('struktur');
Route::get('/kontak',Kontak::class)->name('kontak');
Route::get('/videofront',FrontendVideo::class)->name('videofront');
Route::get('/bycategory/{category_id}',FrontendCategory::class)->name('bycategory');
Route::get('/bycategorywisata/{category_id}',Bycategorywisata::class)->name('bycategorywisata');
Route::get('/detail-berita/{id}',FrontendDetailnews::class)->name('detail-berita');
Route::get('/detail-eventfront/{id}',FrontendDetailevent::class)->name('detail-eventfront');
Route::get('/detail-wisatafront/{id}',FrontendDetailwisata::class)->name('detail-wisatafront');
Route::get('/homestayfront',[MainController::class, 'homestay'])->name('homestayfront');
Route::get('/detail-homestayfront/{id}',Detailhomestay::class)->name('detail-homestayfront');
Route::get('/login-member',Login::class)->name('login-member');
Route::get('/register-member',Register::class)->name('register-member');
Route::get('/product-front',FrontendProduct::class)->name('product-front');
Route::get('/detail-product-front/{id}',FrontendDetailproduct::class)->name('detail-product-front');
Route::get('/member-bayar-product/{id}',[PembelianController::class, 'index'])->name('member-bayar-product');











Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
    Route::get('/category',Category::class)->name('category');
    Route::get('/kecamatan',Kecamatan::class)->name('kecamatan');
    Route::get('/kabupaten',Kabupaten::class)->name('kabupaten');
    Route::get('/my-profile',Profile::class)->name('my-profile');
    Route::get('/user',User::class)->name('user');
    Route::get('/setting-website',Setting::class)->name('setting-website');
    Route::get('/gallery',Gallery::class)->name('gallery');
    Route::get('/form-gallery',Formgallery::class)->name('form-gallery');
    Route::get('/edit-gallery/{id}',Editgallery::class)->name('edit-gallery');
    Route::get('/news',News::class)->name('news');
    Route::get('/form-news',Formnews::class)->name('form-news');
    Route::get('/detail-news/{id}',Detailnews::class)->name('detail-news');
    Route::get('/edit-news/{id}',Editnews::class)->name('edit-news');
    Route::get('/event',Event::class)->name('event');
    Route::get('/form-event',Formevent::class)->name('form-event');
    Route::get('/detail-event/{id}',Detailevent::class)->name('detail-event');
    Route::get('/edit-event/{id}',Editevent::class)->name('edit-event');
    Route::get('/form-wisata',Formwisata::class)->name('form-wisata');
    Route::get('/wisata',Wisata::class)->name('wisata');
    Route::get('/detail-wisata/{id}',Detailwisata::class)->name('detail-wisata');
    Route::get('/edit-wisata/{id}',Editwisata::class)->name('edit-wisata');
    Route::get('/kata-sambutan',[MainController::class,'sambutan'])->name('kata-sambutan');
    Route::get('/komentar-berita',Komentarberita::class)->name('komentar-berita');
    Route::get('/komentar-wisata',Komentarwisata::class)->name('komentar-wisata');
    Route::get('/visi-misi',Visimisi::class)->name('visi-misi');
    Route::get('/struktur-organisasi',StrukturOrganisasi::class)->name('struktur-organisasi');
    Route::get('/slider',Slider::class)->name('slider');
    Route::get('/contact',Contact::class)->name('contact');
    Route::get('/video',Video::class)->name('video');
    Route::get('/form-video',Formvideo::class)->name('form-video');
    Route::get('/edit-video/{id}',Editvideo::class)->name('edit-video');
    Route::get('/homestay',Homestay::class)->name('homestay');
    Route::get('/form-homestay',Formhomestay::class)->name('form-homestay');
    Route::get('/edit-homestay/{id}',Edithomestay::class)->name('edit-homestay');
    Route::get('/detail-homestay/{id}',HomestayDetailhomestay::class)->name('detail-homestay');
    Route::get('/fasilitas-homestay',Fasilitas::class)->name('fasilitas-homestay');
    Route::get('/data-reservasi',ReservasiReservasi::class)->name('data-reservasi');
    Route::get('/detail-reservasi/{id}',Detailreservasi::class)->name('detail-reservasi');
    Route::get('/konfirmasi-reservasi/{id}',[MainController::class, 'konfirmasiReservasi'])->name('konfirmasi-reservasi');
    Route::get('/checkout-reservasi/{id}',[MainController::class, 'checkoutReservasi'])->name('checkout-reservasi');
    Route::get('/konfirmasi-penjualan/{id}',[MainController::class, 'konfirmasiPenjualan'])->name('konfirmasi-penjualan');
    Route::get('/setting-pembayaran',Settingpembayaran::class)->name('setting-pembayaran');
    Route::get('/product',Product::class)->name('product');
    Route::get('/form-product',Formproduct::class)->name('form-product');
    Route::get('/edit-product/{id}',Editproduct::class)->name('edit-product');
    Route::get('/detail-product/{id}',Detailproduct::class)->name('detail-product');
    Route::get('/penjualan',Penjualan::class)->name('penjualan');
    Route::get('/detail-penjualan/{id}',Detailpenjualan::class)->name('detail-penjualan');
    Route::get('/norek',Norek::class)->name('norek');






    Route::post('/updateSambutan',[MainController::class,'updateSambutan'])->name('updateSambutan');
    Route::post('/newBody',[MainController::class,'newBody'])->name('newBody');
    Route::post('/changeLatLng',[MainController::class,'changeLatLng'])->name('changeLatLng');
    Route::post('/updatelogo',[MainController::class,'update'])->name('updatelogo');
    Route::post('/logout-new',[MainController::class,'logout'])->name('logout-new');

});


Route::post('/authregistermember',[AuthController::class,'registermember'])->name('authregistermember');
Route::post('/authloginmember',[AuthController::class,'loginmember'])->name('authloginmember');
Route::post('/checkout',[CheckOutController::class,'store'])->name('checkout');
Route::post('/checkout-product',[ControllersCheckOutProduct::class,'checkout'])->name('checkout.product');
Route::post('/bayar-ngab',[PembelianController::class,'store'])->name('bayar.ngab');


Route::middleware("auth")->group(function(){
    Route::post('/logout-member',[AuthController::class,'logout'])->name('logout-member');
    Route::get('/member-home',Memberarea::class)->name('member-home');
    Route::get('/member-homestay',[MainController::class, 'memberhomestay'])->name('member-homestay');
    Route::get('/detail-homestaymember/{id}',MemberDetailhomestay::class)->name('detail-homestaymember');
    Route::get('/member-booking',Bookingsaya::class)->name('member-booking');
    Route::get('/member-reservasi/{id}',Reservasi::class)->name('member-reservasi');
    Route::get('/member-bayar/{id}',[PembayaranController::class, 'index'])->name('member-bayar');
    Route::get('/member-bayar-snap/{id}',[PembayaranController::class, 'snap'])->name('member-bayar-snap');
    Route::get('/invoice/{id}',Invoice::class)->name('invoice');
    Route::get('/member-product',ProductProduct::class)->name('member-product');
    Route::get('/member-product-detail/{id}',ProductDetailproduct::class)->name('member-product-detail');
    Route::get('/member-product-checkout/{id}',Checkoutproduct::class)->name('member-product-checkout');
    Route::get('/member-pembelian',Pembelian::class)->name('member-pembelian');
    Route::get('/member-bayar-invoice/{id}',Detailpembelian::class)->name('member-bayar-invoice');
    Route::get('/member-penjualan',Penjualanpedagang::class)->name('member.penjualan');
    Route::get('/member-penjualan-detail/{id}',PenjualanpedagangDetailpenjualan::class)->name('member.penjualan.detail');
    Route::get('/member-penjualan-detail-jual/{id}',Detailpenjualanbeli::class)->name('member.penjualan.detail.jual');
});
Route::get('/payment-success',[CheckOutController::class, 'midtransCallback']);
Route::post('/payment-success',[CheckOutController::class, 'midtransCallback']);
Route::post('/midtrans-callback',[CheckOutController::class, 'callback']);
