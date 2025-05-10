<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\adminHotel\editRoomsController;
use App\Http\Controllers\adminHotel\financialController;
use App\Http\Controllers\adminHotel\HotelAuthController;
use App\Http\Controllers\adminHotel\mainPageController;
use App\Http\Controllers\adminHotel\manageRoomsController;
use App\Http\Controllers\adminHotel\pricingANDcapacitiesController;
use App\Http\Controllers\adminHotel\reservationController;
use App\Http\Controllers\adminHotel\settingPageController;
use App\Http\Controllers\adminHotel\statusPageController;
use App\Http\Controllers\hotelBookingController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\userDashboardController;
use App\Http\Controllers\UserSupportController;
use App\Http\Middleware\ShareAdminHotelData;
use App\Http\Middleware\ShareUserData;
//
use App\Http\Controllers\BlogController;

//
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/start', function () {
    //Artisan::call('storage:link');
    Illuminate\Support\Facades\Artisan::call('migrate');
    //\Illuminate\Support\Facades\Artisan::call('cache:clear');
    //\Illuminate\Support\Facades\Artisan::call('config:cache');
    /*\App\Models\User::create([
        'username' => '5790103911',
        'people_id' => 1,
        'type' => 'admin',
        'password' => bcrypt('123456'),
    ]);*/
    /*
    */
    /*\Illuminate\Support\Facades\Artisan::call('migrate:fresh');

    $people = \App\Models\People::create([
        'firstName' => 'super admin',
        'lastName' => 'super admin',
        'nationalCode' => '5790103911',
    ]);
    \App\Models\User::create([
        'username' => '5790103911',
        'people_id' => $people->id,
        'type' => 'hotel',
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
Route::get('/test', function () {
    return view('welcome');
});

/*api routes*/
Route::prefix('api')->name('api.')->group(function () {


    Route::get('hotelSearchDestination/{search}', [\App\Http\Controllers\mainPageController::class,'hotelSearchDestination'])->name('hotelSearchDestination');
    Route::post('changeMessageStatus', [\App\Http\Controllers\adminHotel\HotelController::class,'changeMessageStatus'])->name('changeMessageStatus');

});

/*user routes*/
Route::middleware([ShareUserData::class])->group(function () {


    //user auth routes
    Route::get('logout', [UserAuthController::class,'logout'])->name('logout');
    Route::middleware(['logged:user'])->controller(UserAuthController::class)->group(function() {
        Route::get('login', 'login')->name('login');
        Route::post('doLogin', 'doLogin')->name('doLogin');
        Route::post('doRegister', 'doRegister')->name('doRegister');
    });


    //mainPage
    Route::get('/', [\App\Http\Controllers\mainPageController::class, 'index'])->name('index');


    //UserCheckLogin
    Route::middleware('auth:user')->prefix('userDashboard')->controller(userDashboardController::class)->name('userDashboard.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('changePassword', 'changePassword')->name('changePassword');
    });


    //hotelBooking
    Route::prefix('hotelBooking')->controller(hotelBookingController::class)->name('hotelBooking.')->group(function () {
        Route::get('/', 'results')->name('results');
        Route::get('showDescription', 'showDescription')->name('showDescription');
        Route::middleware('auth:user')->get('choosePeople', 'choosePeople')->name('choosePeople');
        Route::middleware('auth:user')->get('showPeople', 'showPeople')->name('showPeople');
        Route::middleware('auth:user')->get('selectPricing', 'selectPricing')->name('selectPricing');
        Route::middleware('auth:user')->get('reserveHotel', 'reserveHotel')->name('reserveHotel');
        Route::get('paymentRedirect', 'paymentRedirect')->name('paymentRedirect');
    });


    //support routes
    Route::prefix('support')->name('support.')->group(function() {
        Route::get('messages', [UserSupportController::class, 'getMessages']);
        Route::get('readMessages', [UserSupportController::class, 'readMessages']);
        Route::post('send', [UserSupportController::class, 'sendMessage']);
        Route::get('conversations', [UserSupportController::class, 'getConversations']);
    });
});



/*admin hotel routes*/
Route::middleware([ShareAdminHotelData::class])->prefix('hotel')->name('hotel.')->group(function () {

    Route::middleware('logged:hotel')->controller(HotelAuthController::class)->group(function() {
        Route::get('login', 'login')->name('login');
        Route::post('doLogin', 'doLogin')->name('doLogin');
    });

    Route::prefix('dashboard')->middleware('auth:hotel')->group(function () {
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
            Route::post('deleteRooms', 'deleteRooms')->name('deleteRooms');
        });


        //reservation routes
        Route::controller(reservationController::class)->group(function() {
            Route::get('reservation', 'index')->name('reservation');
            Route::post('update-reserve-code', 'editCode')->name('reservation.editCode');
        });


        //financial routes
        Route::controller(financialController::class)->group(function() {
            Route::get('manageFinancial', 'index')->name('manageFinancial');
            Route::post('requestFactor/{reserve_id}', 'requestFactor')->name('requestFactor');
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
            Route::get('editRooms', 'editRooms')->name('editRooms');
            Route::get('addRoom', 'index')->name('addRoom');
            Route::post('storeRoom/{hotelId}', 'storeRoom')->name('storeRoom');
            Route::post('updateRoom/{hotelId}', 'updateRoom')->name('updateRoom');
        });


        //statusPage routes
        Route::controller(statusPageController::class)->group(function() {
            Route::get('statusPage', 'index')->name('statusPage');
        });


        //pricingANDcapacity routes
        Route::controller(pricingANDcapacitiesController::class)->group(function() {
            Route::get('pricingANDcapacities', 'index')->name('pricingANDcapacities');
            Route::post('setPrice', 'setPrice')->name('setPrice');
            Route::post('removePricing', 'removePricing')->name('removePricing');
            Route::post('setCapacity', 'setCapacity')->name('setCapacity');
            Route::post('removeCapacity', 'removeCapacity')->name('removeCapacity');
            Route::post('setLimit', 'setLimit')->name('setLimit');
        });
    });

});



/*admin routes*/
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('logged:admin')->controller(AdminAuthController::class)->group(function() {
        Route::get('login', 'login')->name('login');
        Route::post('doLogin', 'doLogin')->name('doLogin');
    });

    Route::prefix('dashboard')->middleware('auth:admin')->group(function () {
        Route::get('logout', [AdminAuthController::class,'logout'])->name('logout');

        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        Route::get('financial', [\App\Http\Controllers\admin\financialController::class, 'index'])->name('financial');
        Route::post('financialChangeStatus/{reserve_id}', [\App\Http\Controllers\admin\financialController::class, 'financialChangeStatus'])->name('financialChangeStatus');

        Route::get('reserve/{reserve_id}', [\App\Http\Controllers\admin\HotelController::class, 'editReserve'])->name('reserve.edit');
        Route::POST('reserve/{reserve_id}', [\App\Http\Controllers\admin\HotelController::class, 'updateReserve'])->name('reserve.update');

        Route::get('/support', function() {
            return view('admin.support.index');
        })->name('support');

        Route::get('/support/users', [\App\Http\Controllers\admin\AdminSupportController::class, 'users'])
            ->name('support.users');

        Route::get('/support/messages', [\App\Http\Controllers\admin\AdminSupportController::class, 'messages'])
            ->name('support.messages');

        Route::post('/support/send', [\App\Http\Controllers\admin\AdminSupportController::class, 'sendMessage'])
            ->name('support.send');

        Route::get('mainPageSettings', [\App\Http\Controllers\admin\MainPageSettingController::class, 'mainPageSettings'])->name('mainPageSettings');
        Route::post('updatePageSettings', [\App\Http\Controllers\admin\MainPageSettingController::class, 'updatePageSettings'])->name('updatePageSettings');

        Route::resource('hotels',\App\Http\Controllers\admin\HotelController::class);
        Route::resource('rooms',\App\Http\Controllers\admin\RoomController::class);

        Route::resource('users',\App\Http\Controllers\admin\UserController::class);



        Route::get('/blog', [BlogController::class, 'blog']);
        Route::post('/add_blog', [BlogController::class, 'add_blog']);
        Route::get('/edit_blog/{id}', [BlogController::class, 'edit_blogs']);
        Route::post('/update_blog', [BlogController::class, 'update_blog']);
        Route::delete('/delete_blog/{id}', [BlogController::class, 'delete_blog']);
    });



});
