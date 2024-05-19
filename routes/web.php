<?php

use App\Livewire\Login;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogOutController;

// Route::get('/', function () {
//     return view('welcome');
// });
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

// Route::prefix('spp')->group(function(){
// Auth::routes();

Route::get('/', \App\Livewire\Login::class)->name('login')->middleware('guest');
Route::middleware('auth')->group(function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('menabung', \App\Livewire\Tabungan::class)->name('menabung');
    Route::get('logout', LogOutController::class)->name('logout');
});
// Route::middleware(['auth:web'])->group(function(){

//     Route::controller(HomeController::class)->group(function(){
//         // Route::get('/', 'index')->name('web.index');
//         Route::get('buku-panduan', 'bukuPanduan')->name('buku.panduan');
//         Route::get('pengaturan', 'pengaturan')->name('pengaturan.index');
//         Route::get('ubah-pengaturan', 'editPengaturan')->name('pengaturan.edit');
//         Route::post('ubah-pengaturan', 'storePengaturan')->name('pengaturan.store');
//         Route::Post('cetak-laporan-harian', 'cetak')->name('laporan-harian.cetak');
//         Route::post('export-laporan-harian', 'export')->name('laporan-harian.export');
//     });

//     Route::controller(SiswaController::class)->group(function(){
//         Route::get('siswa', 'index')->name('siswa.index');
//         Route::get('tambah-siswa', 'create')->name('siswa.create');
//         Route::post('tambah-siswa', 'store')->name('siswa.store');
//         Route::get('siswa/{siswa}/detail', 'show')->name('siswa.show');
//         Route::get('siswa/{siswa}/ubah', 'edit')->name('siswa.edit');
//         Route::post('siswa/{siswa}/ubah', 'update')->name('siswa.update');
//         Route::post('siswa/{siswa}/hapus', 'destroy')->name('siswa.destroy');
//         Route::get('import-siswa', 'showFormImport')->name('siswa.showimport');
//         Route::post('import-siswa', 'import')->name('siswa.import');
//         Route::get('export-siswa', 'export')->name('siswa.export');
//     });

//     Route::controller(PeriodeController::class)->group(function(){
//         Route::get('periode', 'index')->name('periode.index');
//         Route::get('tambah-periode', 'create')->name('periode.create');
//         Route::post('tambah-periode', 'store')->name('periode.store');
//         Route::get('periode/{periode}/ubah', 'edit')->name('periode.edit');
//         Route::post('periode/{periode}/ubah', 'update')->name('periode.update');
//         Route::post('periode/{periode}/hapus', 'destroy')->name('periode.destroy');
//     });

//     Route::controller(KelasController::class)->group(function(){
//         Route::get('kelas', 'index')->name('kelas.index');
//         Route::get('tambah-kelas', 'create')->name('kelas.create');
//         Route::post('tambah-kelas', 'store')->name('kelas.store');
//         Route::get('kelas/{kelas}/ubah', 'edit')->name('kelas.edit');
//         Route::post('kelas/{kelas}/ubah', 'update')->name('kelas.update');
//         Route::post('kelas/{kelas}/hapus', 'destroy')->name('kelas.destroy');
//     });

//     Route::controller(TagihanController::class)->group(function(){
//         Route::get('tagihan', 'index')->name('tagihan.index');
//         Route::get('tambah-tagihan', 'create')->name('tagihan.create');
//         Route::post('tambah-tagihan', 'store')->name('tagihan.store');
//         Route::get('tagihan/{tagihan}/ubah', 'edit')->name('tagihan.edit');
//         Route::post('tagihan/{tagihan}/ubah', 'update')->name('tagihan.update');
//         Route::post('tagihan/{tagihan}/hapus', 'destroy')->name('tagihan.destroy');
//     });

//     Route::controller(UserController::class)->group(function(){
//         Route::get('user', 'index')->name('user.index');
//         Route::get('tambah-user', 'create')->name('user.create');
//         Route::post('tambah-user', 'store')->name('user.store');
//         Route::get('user/{user}/ubah', 'edit')->name('user.edit');
//         Route::post('user/{user}/ubah', 'update')->name('user.update');
//         Route::post('user/{user}/hapus', 'destroy')->name('user.destroy');
//     });

//     Route::controller(TabunganController::class)->group(function(){
//         Route::get('tabungan', 'index')->name('tabungan');
//         Route::get('penarikan', 'penarikan')->name('penarikan');
//         Route::post('menabung', 'menabung')->name('tabungan.store');
//         Route::get('cetak-tabungan/{id}', 'transaksiCetak')->name('tabungan.transaksicetak');
//         Route::get('export-mutasi', 'export')->name('tabungan.export');
//         Route::get('cetak-tabungan-siswa/{siswa}', 'cetak')->name('tabungan.cetak');
//         Route::get('export-tabungan/{siswa}', 'siswaexport')->name('tabungan.siswa.export');
//     });

//     Route::controller(KeuanganController::class)->group(function(){
//         Route::get('keuangan', 'index')->name('keuangan.index');
//         Route::post('keuangan', 'store')->name('keuangan.store');
//         Route::get('export-keuangan', 'export')->name('keuangan.export');
//     });

//     Route::controller(TransaksiController::class)->group(function(){
//         Route::get('transaksi-spp','index')->name('spp.index');
//         Route::post('print-spp', 'transaksiPrint')->name('transaksi.print');
//         Route::get('export-spp','transaksiExport')->name('transaksi.export');
//         Route::post('print-spp/{siswa?}','print')->name('spp.print');
//         Route::get('export-spp/{siswa?}','export')->name('spp.export');
//     });

//     Route::controller(KuitansiController::class)->group(function(){
//         Route::get('kuitansi', 'index')->name('kuitansi.index');
//         Route::post('kuitansi', 'store')->name('kuitansi.store');
//         Route::get('kuitansi/{kuitansi}', 'print')->name('kuitansi.print');
//     });
// });
// });

// Route::get('/home', function () {
//     return redirect()->route('app.home');
// })->name('home');

// Route::group(['prefix' => 'dashboard', 'as' => 'app.', 'middleware' => ['web','auth']], function () {

//     // Route::get('home', function () {
//     //     return view('pages.dashboard');
//     // })->name('home');
//     // Route::get('home', App\Livewire\Pages\Dashboard::class)->name('home');
//     // Route::get('home', App\Livewire\Pages\Dashboard::class)->name('home');

//     Route::get('user', function () {
//         return view('pages.user');
//     })->name('user');

//     Route::group(
//         ['prefix' => 'settings', 'as' => 'setting.'],
//         function () {

//              Route::get(
//                 'my-profile',
//                 function () {
//                         return view('pages.profile');
//                     }
//             )->name('my-profile');

//             Route::get(
//                 'change-password',
//                 function () {
//                         return view('pages.change-password');
//                     }
//             )->name('change-password');

//         }
//     );

// });

// Route::group(['prefix' => 'authentication', 'as' => 'auth.', 'middleware' => 'web'], function () {

//     // Route::get('beranda', Dashboard::class)->name('dash.beranda');
//     Route::post('logout', function () {
//         Illuminate\Support\Facades\Auth::logout();
//         return redirect()->route('login');
//     })->name('logout');
// });

// Route::group(['prefix' => 'authentication', 'middleware' => 'guest'], function () {

//     Route::get('login', App\Livewire\Authentication\Login\SimpleLoginComponent::class)->name('login');
//     Route::get('register',  App\Livewire\Authentication\Register\SimpleRegisterComponent::class)->name('register');
// });
