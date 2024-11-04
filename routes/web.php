<?php

use App\Livewire\Guest\FaQs;
use App\Livewire\Guest\About;
use App\Livewire\Admin\Admin;
use App\Livewire\Admin\Brand\BrandCreate;
use App\Livewire\Admin\Brand\BrandEdit;
use App\Livewire\Admin\Brand\BrandList;
use App\Livewire\Admin\List\ListUser;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Guest\Homepage;
use App\Livewire\Admin\Product\ProductCreate;
use App\Livewire\Admin\Product\ProductEdit;
use App\Livewire\Admin\Product\ProductList;
use App\Livewire\User\User;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Profile\Index as ProfileAdmin;
use App\Livewire\Admin\Profile\PhoneEditVerification;
use App\Livewire\User\Profile\Index as ProfileUser;
use App\Livewire\Admin\Setting\Index as Setting;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\NewPassword;
use App\Livewire\Auth\OtpForgotPassword;
use App\Livewire\User\Profile\PhoneEditVerification as ProfilePhoneEditVerification;

Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

Route::get('/', Homepage::class);
Route::get('/about', About::class);
Route::get('/faqs', FaQs::class);
Route::get('/forgot-password', ForgotPassword::class);
Route::get('/otp-forgot', OtpForgotPassword::class)->name('otp.forgot');
Route::get('/forgot-password/{token}', NewPassword::class)->name('new.password');



Route::group(['middleware' => 'auth'], function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', Admin::class);
        Route::get('/datauser', ListUser::class);

        //products
        Route::get('/dataproduct', ProductList::class)->name('product.index');
        Route::get('/product/create', ProductCreate::class);
        Route::get('/product/{id}/edit', ProductEdit::class);

        //brands
        Route::get('/databrand', BrandList::class)->name('brand.index');
        Route::get('/brand/create', BrandCreate::class);
        Route::get('/brand/{id}/edit', BrandEdit::class);


        //profile
        Route::get('/profile/admin', ProfileAdmin::class)->name('profile.admin');
        Route::get('/otp-profile-admin', PhoneEditVerification::class)->name('otp.profile.admin');

        //Setting
        Route::get('/setting', Setting::class);
    });

    Route::middleware('role:customer')->group(function () {
        Route::get('/user', User::class);

        Route::get('/profile/user', ProfileUser::class)->name('profile.user');
        Route::get('/otp-profile-user', ProfilePhoneEditVerification::class)->name('otp.profile.user');
    });
});
