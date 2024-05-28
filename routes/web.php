<?php

use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\ForumController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\SubmenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.index');
// });

// Route::get('/home', function () {
//     return view('home');
// });

//Route::get('/dashboard', function () {
//    return view('dashboard.index');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/post/{id}', [HomeController::class, 'post'])->name('post');
Route::get('/belajar/{id}', [HomeController::class, 'belajar']);
Route::get('/post/belajar/{id}', [HomeController::class, 'belajarPost']);


// Route for ForumController
Route::get('/forums', [ForumController::class, 'index'])->name('forums');
Route::post('/forums', [ForumController::class, 'store'])->name('forums.store');
Route::get('/forums/{post}', [ForumController::class, 'show'])->name('forum.details');

// Route for CommentController
Route::post('/forums/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
//Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');
Route::post('/comments/{comment}/replies', [\App\Http\Controllers\backend\ReplyController::class, 'store'])->name('replies.store');

// Route Dashboard
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Route Menu Dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
//    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::get('/tambah-menu', [MenuController::class, 'create'])->name('tambah.menu');
    Route::get('/edit-menu/{slug}', [MenuController::class, 'edit'])->name('edit.menu');
    Route::post('/tambah-menu', [MenuController::class, 'store'])->name('store.menu');
    Route::put('/edit-menu/{slug}', [MenuController::class, 'update'])->name('update.menu');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('delete.menu');

   // Route Submenu
    Route::get('/submenu', [SubmenuController::class, 'index'])->name('submenu');
    Route::get('/tambah-submenu', [SubmenuController::class, 'create'])->name('tambah.submenu');
    Route::get('/edit-submenu/{id}', [SubmenuController::class, 'edit'])->name('edit.submenu');
    Route::post('/tambah-submenu', [SubmenuController::class, 'store'])->name('store.submenu');
    Route::put('/edit-submenu', [SubmenuController::class, 'update'])->name('update.submenu');
    Route::delete('/submenu/{id}', [SubmenuController::class, 'destroy'])->name('delete.submenu');

    //  Route Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/tambah-post', [PostController::class, 'create'])->name('tambah.post');
    Route::post('/tambah-post', [PostController::class, 'store'])->name('store.posts');
    Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('edit.post');
    Route::put('/edit-post/{id}', [PostController::class, 'update'])->name('update.post');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('delete.post');

    // Route Questions
    Route::get('/questions', [\App\Http\Controllers\backend\QuestionController::class, 'index'])->name('questions');
    Route::get('/tambah-questions', [\App\Http\Controllers\backend\QuestionController::class, 'create'])->name('tambah.questions');
    Route::post('/questions', [\App\Http\Controllers\backend\QuestionController::class, 'store'])->name('store.questions');
    Route::get('/edit-questions/{id}', [\App\Http\Controllers\backend\QuestionController::class, 'edit'])->name('edit.questions');
    Route::put('/edit-questions/{id}', [\App\Http\Controllers\backend\QuestionController::class, 'update'])->name('update.questions');
    Route::delete('/questions/{id}', [\App\Http\Controllers\backend\QuestionController::class, 'destroy'])->name('delete.questions');
});

Route::get('/test', function() {
   return view('test');
});

require __DIR__.'/auth.php';
