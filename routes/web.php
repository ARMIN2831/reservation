<?php

use App\Http\Controllers\adminHotel\editRoomsController;
use App\Http\Controllers\adminHotel\HotelAuthController;
use App\Http\Controllers\adminHotel\mainPageController;
use App\Http\Controllers\adminHotel\manageRoomsController;
use App\Http\Controllers\adminHotel\pricingANDcapacitiesController;
use App\Http\Controllers\adminHotel\reservationController;
use App\Http\Controllers\adminHotel\settingPageController;
use App\Http\Controllers\adminHotel\statusPageController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\userDashboardController;
use App\Http\Controllers\userHotel\hotelBookingController;
use App\Http\Middleware\ShareAdminHotelData;
use App\Http\Middleware\ShareUserData;
use Illuminate\Support\Facades\Route;

Route::get('/start', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate');
    /*\Illuminate\Support\Facades\Artisan::call('migrate:fresh');
    \App\Models\User::create([
        'firstName' => 'super admin',
        'lastName' => 'super admin',
        'username' => '5790103911',
        'password' => bcrypt('123456'),
    ]);
    \App\Models\Hotel::create([
        'title' => 'test Hotel',
    ]);
    \App\Models\HotelUser::create([
        'user_id' => 1,
        'hotel_id' => 1,
        'role' => 'admin',
    ]);*/
});


/*api routes*/
Route::prefix('api')->name('api.')->group(function () {


    Route::get('hotelSearchDestination/{search}', [\App\Http\Controllers\mainPageController::class,'hotelSearchDestination'])->name('hotelSearchDestination');

});

/*user routes*/
Route::middleware([ShareUserData::class])->group(function () {


    //user auth routes
    Route::get('logout', [UserAuthController::class,'logout'])->name('logout');
    Route::middleware('UserLogged')->controller(UserAuthController::class)->group(function() {
        Route::get('login', 'login')->name('login');
        Route::post('doLogin', 'doLogin')->name('doLogin');
    });


    //mainPage
    Route::get('/', [\App\Http\Controllers\mainPageController::class, 'index'])->name('index');


    //UserCheckLogin
    Route::middleware('UserCheckLogin')->prefix('userDashboard')->controller(userDashboardController::class)->name('userDashboard.')->group(function () {
        Route::get('/', 'index')->name('index');
    });


    //hotelBooking
    Route::prefix('hotelBooking')->controller(hotelBookingController::class)->name('hotelBooking.')->group(function () {
        Route::get('/{id}', 'index')->name('index');
    });
});



/*admin hotel routes*/
Route::middleware([ShareAdminHotelData::class])->prefix('hotel')->name('hotel.')->group(function () {

    Route::middleware('logged')->controller(HotelAuthController::class)->group(function() {
        Route::get('login', 'login')->name('login');
        Route::post('doLogin', 'doLogin')->name('doLogin');
    });

    Route::prefix('dashboard')->middleware('checkLogin')->group(function () {
        //mainPage routes
        Route::controller(mainPageController::class)->group(function() {
            Route::get('/', 'index')->name('dashboard');
            Route::get('mainPage', 'index')->name('mainPage');
            Route::post('updateHotel/{hotelId}', 'updateHotel')->name('updateHotel');
            Route::post('updateFacility/{hotelId}', 'updateFacility')->name('updateFacility');
            Route::post('addPhotoGallery/{hotelId}', 'addPhotoGallery')->name('addPhotoGallery');
            Route::post('deleteGallery/{hotelId}', 'deleteGallery')->name('deleteGallery');
        });



        //manageRoom routes
        Route::controller(manageRoomsController::class)->group(function() {
            Route::get('manageRooms', 'index')->name('manageRooms');
            Route::get('updateRoomStatus/{roomId}/{status}', 'updateRoomStatus')->name('updateRoomStatus');
        });


        //reservation routes
        Route::controller(reservationController::class)->group(function() {
            Route::get('reservation', 'index')->name('reservation');
        });


        //settingPage routes
        Route::controller(settingPageController::class)->group(function() {
            Route::get('settingPage', 'index')->name('settingPage');
            Route::post('updateHotelSetting/{hotelId}', 'updateHotelSetting')->name('updateHotelSetting');
            Route::post('updateHotelSettingPassword/{hotelId}', 'updateHotelSettingPassword')->name('updateHotelSettingPassword');
            Route::post('addUserAccess/{hotelId}', 'addUserAccess')->name('addUserAccess');
            Route::get('deleteUser/{userId}', 'deleteUser')->name('deleteUser');
        });


        //editRoom routes
        Route::controller(editRoomsController::class)->group(function() {
            Route::get('editRoom', 'index')->name('editRoom');
            Route::get('addRoom', 'index')->name('addRoom');
            Route::post('storeRoom/{hotelId}', 'storeRoom')->name('storeRoom');
        });


        //statusPage routes
        Route::controller(statusPageController::class)->group(function() {
            Route::get('statusPage', 'index')->name('statusPage');
        });


        //editRoom routes
        Route::controller(pricingANDcapacitiesController::class)->group(function() {
            Route::get('pricingANDcapacities', 'index')->name('pricingANDcapacities');
        });
    });

});
