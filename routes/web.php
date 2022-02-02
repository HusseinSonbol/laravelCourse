<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GitHubController;

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
    return view('welcome');
});


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts/create',[PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/destroy/{postid}}',[PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
Route::get('/posts/update/{postid}',[PostController::class, 'put'])->name('posts.update')->middleware('auth');
Route::get('/posts/show/{postid}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts',[PostController::class, 'edit'])->name('posts.edit')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::where('github_id', $githubUser->id)->first();

    if ($user) {
        $user->update([
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
            'password' => encrypt('gitpwd059'),
        ]);
    }

    Auth::login($user);

    return redirect()->route('posts.index');
});


// Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
// Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);
