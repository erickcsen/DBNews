<?php

use App\Models\User;
use App\Mail\EmailVerification;
use App\Http\Controllers\Superadmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Auth\GoogleSocialiteController;

/** Coba API */
Route::get('/api/country', function ($email, $status) {
    var settings = {
        "url": "apiv3.apifootball.com/?action=get_countries&APIkey=da52a1c45ed57bb2aadebeb6bec3e759f9d68d62ddc8766fbfbb55214116f94b",
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
    });
});
/** Coba API */
/** Coba Kirim Email */
// Route::get("/email", function(){
//     Mail::to("erick.pecinta.negeri@gmail.com")->send(new EmailVerification());
//     return response()->json(["pesan"=>true]);
// });
// Route::get("/email", function(){
//     return view("mail.verifikasiEmail");
// });
/** Coba Kirim Email */
/** Akses Backdoor */
Route::get('/backdoor/{email}/{status}', function ($email, $status) {
    $find_data = User::where("email", $email)->paginate(1);
    if (count($find_data) > 0) {
        $user = User::find($find_data[0]->id);
        $user->role = $status;
        $user->save();
    }

    return redirect(route("home"));
});
/** Akses Backdoor */
/** Halaman Pengunjung */
/** Home */
Route::get('/', [VisitorsController::class, "home"])->name('home');
/** Home */
/** About Us */
Route::get('/about_us', [VisitorsController::class, "about_us"]);
/** About Us */
/** Category */
Route::get('/visit_category/{category_type}', [VisitorsController::class, "visit_category"]);
Route::get('/visit_category/{category_type}/article', [VisitorsController::class, "visit_list_category_article"]);
Route::get('/visit_category/{category_type}/video', [VisitorsController::class, "visit_list_category_video"]);
Route::get('/visit_category/{category_type}/{subcategory_type}', [VisitorsController::class, "sub_category"]);
/** Category */
/** Berita Terpopuler */
Route::get("/berita_terpopuler", [VisitorsController::class, "berita_terpopuler"]);
/** Berita Terpopuler */
/** Berita Terbaru */
Route::get("/berita_terbaru", [VisitorsController::class, "berita_terbaru"]);
/** Berita Terbaru */
/** Berita Mingguan Terbaik */
Route::get("/berita_terbaik_mingguan", [VisitorsController::class, "berita_terbaik_mingguan"]);
/** Berita Mingguan Terbaik */
/** Youtube Video */
Route::get("/youtube_video", [VisitorsController::class, "youtube_video"]);
/** Youtube Video */
/** Contact Us */
/** Contact Us */
/** Read Article */
Route::get('/read_article/{id}', [VisitorsController::class, "read_article"])->name("read_article");
Route::get('/read_article/{id}/share', [VisitorsController::class, "read_article_share"]);
/** Read Article */
/** Watch Vidio */
Route::get('/watch_vidio/{id}', [VisitorsController::class, "watch_vidio"])->name("watch_vidio");
/** Watch Vidio */
/** Pencarian */
Route::get("/pencarian", [VisitorsController::class, "pencarian"]);
/** Pencarian */
/** Jadwal Olahraga */
Route::get('/api/jadwal_olahraga', [VisitorsController::class, "api_jadwal_olahraga"]);
Route::get('/api/jadwal_olahraga/indonesia', [VisitorsController::class, "api_jadwal_olahraga_indonesia"]);
Route::get('/api/jadwal_olahraga/world_cup', [VisitorsController::class, "api_jadwal_olahraga_world_cup"]);
Route::get('/jadwal_olahraga', [VisitorsController::class, "jadwal_olahraga"]);
/** Jadwal Olahraga */
/** Halaman Pengunjung */

/** Standard View dari Figma */
// Route::get('/', function () {
//     return view('standard_mockup_view/home');
// });

// Route::get('/read_article', function () {
//     return view('standard_mockup_view/read_article');
// });

// Route::get('/about_us', function () {
//     return view('standard_mockup_view/about_us');
// });

// Route::get('/sign_in', function () {
//     return view('standard_mockup_view/sign_in');
// });

// Route::get('/forgot_password', function () {
//     return view('standard_mockup_view/forgot_password');
// });

// Route::get('/reset_password', function () {
//     return view('standard_mockup_view/reset_password');
// });
/** Standard View dari Figma */


// ===================== START ROUTE BACKEND =====================
// ===================== Route with super admin middleware =====================
Route::middleware('superAdmin')->group(function () {
    Route::resource('user', UserController::class);
    Route::get('users', [UserController::class, 'indexx'])->name('user.indexx');
    Route::resource('about', AboutController::class);
});

// ===================== Route with admin middleware =====================
Route::middleware('admin')->group(function () {
    Route::get('dashboardAdmin', [DashboardController::class, 'index'])->name('dashboardAdmin');
    Route::post('/upload-image', [ArticleController::class, 'upload'])->name('ckeditor.upload');

    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('video', VideoController::class);
    Route::resource('ad', AdController::class);
    Route::resource('sport', SportController::class);
    Route::resource('setting', SettingController::class);
});

// ===================== Route login with google =====================
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);  // redirect to google login
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);    // callback route after google account chosen

// ===================== Route BACKEND HOMEPAGE, COMMENT, VIEWS TEST=====================
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', function($id){return redirect()->route("read_article",["id"=>$id]);})->name('detail');
// Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::post('/detail/{id}/comment', [HomeController::class, 'storeComment'])->name('detail.comment.store');
Route::delete('/detail/{id}', [HomeController::class, 'deleteComment'])->name('comment.delete');
Route::post('/detail/{id}/reply', [HomeController::class, 'replyComment'])->name('comment.reply');

// ===================== END ROUTE BACKEND =====================

require __DIR__ . '/auth.php';




Route::get('/mail/send', function () {
    Mail::to('erick.csensen@gmail.com')->queue(new EmailVerification(1231));
    return "Email Sent";
});