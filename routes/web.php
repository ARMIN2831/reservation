<?php

use App\Http\Controllers\adminHotel\editRoomsController;
use App\Http\Controllers\adminHotel\HotelAuthController;
use App\Http\Controllers\adminHotel\HotelController;
use App\Http\Controllers\adminHotel\mainPageController;
use App\Http\Controllers\adminHotel\manageRoomsController;
use App\Http\Controllers\adminHotel\pricingANDcapacitiesController;
use App\Http\Controllers\adminHotel\reservationController;
use App\Http\Controllers\adminHotel\settingPageController;
use App\Http\Controllers\adminHotel\statusPageController;
use App\Http\Middleware\ShareAdminHotelData;
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


Route::middleware([ShareAdminHotelData::class])->prefix('hotel')->name('hotel.')->group(function () {

    Route::middleware('logged')->group(function() {
        Route::get('login', [HotelAuthController::class, 'login'])->name('login');
        Route::post('doLogin', [HotelAuthController::class, 'doLogin'])->name('doLogin');
    });

    Route::prefix('dashboard')->middleware('checkLogin')->group(function () {
        //mainPage routes
        Route::get('/', [mainPageController::class, 'index'])->name('dashboard');
        Route::get('mainPage', [mainPageController::class, 'index'])->name('mainPage');
        Route::post('updateHotel/{hotelId}', [mainPageController::class, 'updateHotel'])->name('updateHotel');
        Route::post('updateFacility/{hotelId}', [mainPageController::class, 'updateFacility'])->name('updateFacility');
        Route::post('addPhotoGallery/{hotelId}', [mainPageController::class, 'addPhotoGallery'])->name('addPhotoGallery');
        Route::post('deleteGallery/{hotelId}', [mainPageController::class, 'deleteGallery'])->name('deleteGallery');



        //manageRoom routes
        Route::get('manageRooms', [manageRoomsController::class, 'index'])->name('manageRooms');
        Route::get('updateRoomStatus/{roomId}/{status}', [manageRoomsController::class, 'updateRoomStatus'])->name('updateRoomStatus');


        Route::get('reservation', [reservationController::class, 'index'])->name('reservation');


        //settingPage routes
        Route::get('settingPage', [settingPageController::class, 'index'])->name('settingPage');
        Route::post('updateHotelSetting/{hotelId}', [settingPageController::class, 'updateHotelSetting'])->name('updateHotelSetting');
        Route::post('updateHotelSettingPassword/{hotelId}', [settingPageController::class, 'updateHotelSettingPassword'])->name('updateHotelSettingPassword');
        Route::post('addUserAccess/{hotelId}', [settingPageController::class, 'addUserAccess'])->name('addUserAccess');
        Route::get('deleteUser/{userId}', [settingPageController::class, 'deleteUser'])->name('deleteUser');


        //editRoom routes
        Route::get('editRoom', [editRoomsController::class, 'index'])->name('editRoom');
        Route::get('addRoom', [editRoomsController::class, 'index'])->name('addRoom');
        Route::post('storeRoom/{hotelId}', [editRoomsController::class, 'storeRoom'])->name('storeRoom');


        //statusPage routes
        Route::get('statusPage', [statusPageController::class, 'index'])->name('statusPage');


        //editRoom routes
        Route::get('pricingANDcapacities', [pricingANDcapacitiesController::class, 'index'])->name('pricingANDcapacities');
    });

});
