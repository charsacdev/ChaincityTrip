<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialActivities;
use App\Http\Controllers\Verifyemail;
use App\Http\Controllers\Verifyregistration;
use App\Http\Controllers\Checkoutpay;
use App\Http\Controllers\ExpireListing;
use App\Http\Controllers\HomepageListing;
use App\Http\Livewire\Message;
use App\Http\Controllers\ContactUspage;
use App\Http\Controllers\googleAuth;


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

#------------amazon test-------#
Route::get('/upload', function () {
    return view('file-upload');
});

Route::get('/location', function () {
    return view('location');
});

Route::post('/fileupload', [SpecialActivities::class, 'uploadfile'])->name('file.upload');
Route::post('/locationsearch', [SpecialActivities::class, 'autoComplete'])->name('location.search');


Route::fallback(function () {
    return redirect('/');
});


Route::get('/',[HomepageListing::class,'show']);
Route::get('/about',[HomepageListing::class,'about']);
Route::get('/property', [HomepageListing::class,'properties']);
Route::post('/search', [HomepageListing::class,'searchlisting'])->name('searchlisting');


Route::get('/faq', function () {
    return view('homepages.faq');
});

Route::get('/contact', function () {
    return view('homepages.contact');
});

Route::get('/privacy', function () {
    return view('homepages.privacy');
});

Route::get('/terms', function () {
    return view('homepages.terms');
});

Route::post('/contactmessage',[ContactUspage::class,'contactUsemail'])->name('contactmessage');
Route::post('/subscribe',[ContactUspage::class,'subscribe'])->name('mailchimp');

#================GOOGLE AUTHENTICATION===================#
Route::get('/login/google', [googleAuth::class,'redirectToGoogle']);
Route::get('/google/callback', [googleAuth::class,'handleGoogleCallback']);



//============================BASIC USER AUTHENTICATION======================//
Route::get('/register', function () {
    return view('users.register');
});

Route::get('/login', function () {
    return view('users.login');
});

Route::get('/forgotpassword', function () {
    return view('users.forgotpassword');
});

Route::get('/password-complete', function () {
    return view('users.password-success');
});

Route::get('/newpassword/{email}/{code}', function () {
    return view('users.newpassword');
});

#============verification==============#
Route::get('verify-email/{email}',[Verifyemail::class,'verify']);
Route::get('verify-account/{email}/{code}',[Verifyregistration::class,'verifyregistration']);

#view reservation
Route::get('/addreservation/{id}', function () {
    return view('users.newreservation');
});

#expire properties
Route::get('/expirelisting',[ExpireListing::class,'expirePlans']);


//============================USER DASHBOARD PROFILING======================//
Route::middleware('usersauth')->group(function () {

       #coinbase payment
       Route::post('/checkcoinbase', [Checkoutpay::class, 'CheckOutListing'])->name('checkount.coinbase');
       Route::get('failure/{id}', [Checkoutpay::class, 'failure'])->name('checkout.failure');
       Route::get('success/{id}', [Checkoutpay::class, 'success']);

        Route::get('/welcome', function () {
            return view('users.welcome');
        });

        Route::get('/dashboard', function () {
            return view('users.dashboard');
        });

        Route::get('/searching', [HomepageListing::class,'searching'])->name('searching');
        
        Route::get('/paymenthistory', function () {
            return view('users.paymenthistory');
        });
        Route::get('/checkout', function () {
            return view('users.checkout');
        });
        Route::get('/savedlisting', function () {
            return view('users.savedlisting');
        });
        Route::get('/insight', function () {
            return view('agents.insight');
        })->middleware('agentauth');
        Route::get('/message',[Message::class,'mount']);

        #get messages per user
        Route::get('/message/{id}', [Message::class,'getMessage']);
        #send message
        Route::post('/sendmessage',[Message::class,'StoreMessage'])->name('sendmessage');


        Route::get('/notification', function () {
            return view('users.notification');
        });
       
        Route::get('/reservations', function () {
            return view('users.reservations');
        });
        Route::get('/profile', function () {
            return view('users.profile');
        });


        #agent verification required
        Route::middleware('agentauth')->group(function () {
       
                #=====listings step=====#
                Route::get('/listing', function () {
                    return view('agents.agentlisting');
                })->middleware('agentauth');

        });


        


        /*logout client*/
        Route::get('/logout', [SpecialActivities::class,'logoutClient'])->name('userlogout');

    });



