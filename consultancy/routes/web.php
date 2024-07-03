<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Livewire\Farmer\Home as FarmerHome;
use App\Livewire\Farmer\Profile as FarmerProfile;
use App\Livewire\Farmer\Qa as FarmerQa;
use App\Livewire\Farmer\Matchmaking as FarmerMatchmaking;

use App\Livewire\Consultant\Home as ConsultantHome;
use App\Livewire\Consultant\Profile as ConsultantProfile;
use App\Livewire\Consultant\Scheduling as ConsultantScheduling;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function() {
    return view('landing');
})->name('welcome');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/logout', function () {
    $guards = array_keys(config('auth.guards'));

    foreach ($guards as $guard) {
        if (auth()->guard($guard)->check()) {
            auth()->guard($guard)->logout();
        }
    }

    return redirect('/')->with('success', 'Logout successful');
})->name('logout');


/*
|--------------------------------------------------------------------------
| Farmer Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:farmers'])->group(function () {
    Route::get('/farmer/home', FarmerHome::class)->name('farmer.home');
    Route::get('/farmer/profile', FarmerProfile::class)->name('farmer.profile');
    Route::get('/farmer/qa', FarmerQa::class)->name('farmers.qa');
    Route::get('/farmer/matchmaking', FarmerMatchmaking::class)->name('farmer.matchmaking');
});


/*
|--------------------------------------------------------------------------
| Consultant Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:consultants'])->group(function () {
    Route::get('/consultant/home', ConsultantHome::class)->name('consultant.home');
    Route::get('/consultant/profile', ConsultantProfile::class)->name('consultant.profile');
    Route::get('/consultant/scheduling', ConsultantScheduling::class)->name('consultant.scheduling');
});
