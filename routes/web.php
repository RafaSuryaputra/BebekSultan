<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Jobs\MailUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('homepage', [
        'title' => 'Welcome'
    ]);
})->name('homepage');


Route::get('/about', function () {
    return view('AbboutUs', [
        'title' => 'About Us'
    ]);
})->name('about');

Route::get('/DeliveryProducts', function () {
    return view('DeliveryProducts', [
        'title' => 'Delivery Products'
    ]);
})->name('delivery');

Route::post('/subscribe', function (Request $request) {
   try {
            if($request->email == null) {
                return redirect()->back()->with('error2', 'Email tidak boleh kosong');
            }

         $subscription = new \App\Models\Subscription();
         $subscription->user_id = auth()->user()->id ?? null;
         $subscription->email = $request->email;
         $subscription->save();
         return redirect()->back()->with('success', 'Terima kasih sudah subscribe website kami!');
    } catch (\Exception $e) {
         return redirect()->back()->with('error2', 'Anda sudah subscribe dengan email ini!');
   }
})->name('subscribe');

Route::get('/menu', function () {
    return view('menu', [
        'title' => 'Menu',
        'menus' => \App\Models\Menu::all(),
    ]);
})->name('menu');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('googleLogin', [LoginController::class, 'redirectToGoogle'])->name('googleLogin');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
// Route::get('/signup/google/callback', [LoginController::class, 'handleGoogleSignUpCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/table', [\App\Http\Controllers\TableController::class, "reservationTables"])->name('table');
    Route::get('available-table', [\App\Http\Controllers\TableController::class, "getAvailableTable"])->name('available-table');
    Route::post('/reservation', [\App\Http\Controllers\ReservationController::class, "store"])->name('reservation.store');
    Route::get('/payment/{reservation}', [\App\Http\Controllers\ReservationController::class, "payment"])->name('payment');
    Route::get('/payment/success/{reservation}', [\App\Http\Controllers\ReservationController::class, "paymentSuccess"])->name('payment.success');
    Route::put('/payment/{reservation}', [\App\Http\Controllers\ReservationController::class, "paymentStore"])->name('payment.store');
    Route::get('/my-reservation', [\App\Http\Controllers\ReservationController::class, "myReservation"])->name('my-reservation');
    Route::get('/my-reservation/{reservation}', [\App\Http\Controllers\ReservationController::class, "myReservationDetail"])->name('my-reservation.detail');

    // Delviery Order
    Route::get('/delivery-order', function(){
        return view('delivery-order', [
            'title' => 'Delivery Order'
        ]); 
    })->name('delivery-order');

    Route::post('/mail-us', function (\Illuminate\Http\Request $request) {
      try{
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'messages' => 'required|string',
        ]);

        MailUs::dispatch($data);

        return redirect()->back()->with('success', 'Email sent successfully!');
      } catch (\Exception $e) {
        dd($e);
        return redirect()->back()->with('error2', 'Email failed to send!');
      }
    })->name('mailUs');

    Route::get('/contact', function () {
        return view('contact', [
            'title' => 'Contact'
        ]);
    })->name('contact');

    Route::get('/reservation', function () {
        return view('Reservation', [
            'title' => 'Reservation'
        ]);
    })->name('reservation');

    // update status reservation
    Route::put('/reservation/{reservation}', [\App\Http\Controllers\ReservationController::class, "update"])->name('reservation.update');
    // delete reservation
    Route::delete('/reservation/{reservation}', [\App\Http\Controllers\ReservationController::class, "destroy"])->name('reservation.destroy');
});

Route::middleware(['auth', 'verified', 'CheckRoles:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::get('/', function () {
            return view('dashboard');
        })->name('home_index');
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('menu', \App\Http\Controllers\MenuController::class);
    Route::resource('reservation', \App\Http\Controllers\ReservationController::class);
});

Route::middleware(['auth', 'verified', 'CheckRoles:admin'])
    ->prefix('user')
    ->name('user.')
    ->group(function() {

});

Route::fallback(function () {
    return view('404', [
        'title' => '404'
    ]);
})->name('404');

require __DIR__.'/auth.php';
