<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('main');
});



Route::get('/hybrid-pos', function () {
    return view('hybrid-pos');
});


Route::get('/digital-marketing-manager', function () {
    return view('digital-marketing-manager');
});
Route::get('/digital-marketing', function () {
    return view('digital-marketing');
});
Route::get('/digital-presence', function () {
    return view('digital-presence');
});
Route::get('/e-commerce', function () {
    return view('e-commerce');
});
Route::get('/partnerships', function () {
    return view('partnerships');
});
Route::get('/careers', function () {

    // this contains all the job vacancies - if you have more than 10, thisis not a good approach at all
    $path = 'jobs.json';
    $allvacancies = json_decode(file_get_contents($path), true);

    return view('careers',["vacancies"=>$allvacancies]);
});
Route::get('/terms-of-use', function () {
    return view('terms-of-use');
});
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});
Route::get('/faq', function () {
    return view('faq');
});

//Route::get('/contact-us',[ContactController::class, 'contact']);
Route::post('/send-contact-message',[ContactController::class, 'sendEmail'])->name('contact.send');

// Route::get('/partner-up',[ContactController::class, 'partner']);
Route::post('/send-collab-message',[ContactController::class, 'sendPartnerQuery'])->name('partner.send');


// Route for vacancies
Route::get('/vacancy/{id}', function ($id) {

    $path = 'jobs.json';
    $data = json_decode(file_get_contents($path), true);

    if (ctype_digit($id)) {

        $intId = (int)$id;

        foreach ($data as $item) {
            if ($item['id'] == $intId) {
                return view('vacancy', ['job' => $item]);
                break;
            }
        }

        return view('errors/404');

    } else {
        return ["Id must be an integer"];
    }
});

