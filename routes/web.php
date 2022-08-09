<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\tagandcategoryController;

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
// HOME
Route::get('/', function () {
    return view('pages.home.home');
})->name('homepage');

// BLOGS
Route::get('/blog', [BlogController::class, 'home'])->name('blogs');

Route::get('/blog/{slug}/show', [BlogController::class, 'show'])->name('blog.show');

//GALLERY
Route::get('/gallery', [GalleryController::class, 'home'])->name('gallery');

Route::get('/gallery/{content}/tag', [tagandcategoryController::class, 'searchTag'])->name('pages.gallery.searchTag');

Route::get('/gallery/{content}/category', [tagandcategoryController::class, 'searchCategory'])->name('pages.gallery.searchCategory');

//COMMENT

Route::post('blog/{blog_id}/{user_id}/comment', [CommentController::class, 'add'])->name('blog.comment.add');

//CONTACT
Route::get('/contact', [ContactController::class, 'home'])->name('contact');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

//Auth User
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::post('/home/{id}/update', [UserController::class, 'update'])->name('user.update');

Auth::routes(['verify' => true]);

//Admin
Route::middleware(['AdminCheck'])->group(function () {
    // ADMIN
    Route::get('/admin',[AdminController::class,'index'])->name('admin');
    Route::post('/admin/add',[AdminController::class,'add'])->name('admin.add');
    Route::get('/admin/{id}/delete',[AdminController::class,'delete'])->name('admin.delete');

    //BLOG
    Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog');

    Route::get('/admin/blog/add', [BlogController::class, 'create'])->name('admin.blog.add');

    Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');

    Route::get('/admin/blog/{id}/delete', [BlogController::class, 'destroy'])->name('admin.blogs.delete');

    Route::get('/admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');

    Route::post('/admin/blog/{id}/update', [BlogController::class, 'update'])->name('admin.blogs.update');

    //GALLERY
    Route::get('/admin/gallery/create', [GalleryController::class, 'create'])->name('admin.gallery.create');

    Route::post('/admin/gallery/store', [GalleryController::class, 'store'])->name('admin.gallery.store');

    Route::get('/admin/gallery/{id}/delete', [GalleryController::class, 'delete'])->name('admin.gallery.delete');

    Route::get('/admin/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('admin.gallery.edit');

    Route::post('/admin/gallery/{id}/update', [GalleryController::class, 'update'])->name('admin.gallery.update');

    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');

    //TAG AND CATEGORIES

    Route::get('/admin/tag-and-category', [tagandcategoryController::class, 'index'])->name('admin.gallery.tag');
    Route::post('/admin/tag-and-category/add-tag', [tagandcategoryController::class, 'add_tag'])->name('admin.tag.add');
    Route::post('/admin/tag-and-category/add-category', [tagandcategoryController::class, 'add_category'])->name('admin.category.add');

    Route::get('/admin/tag-and-category/{id}/delete-tag', [tagandcategoryController::class, 'del_tag'])->name('admin.tag.del');
    Route::get('/admin/tag-and-category/{id}/delete-category', [tagandcategoryController::class, 'del_category'])->name('admin.category.del');

    Route::get('/admin/tag-and-category/{id}/edit-tag', [tagandcategoryController::class, 'edit_tag'])->name('admin.tag.edit');
    Route::get('/admin/tag-and-category/{id}/edit-category', [tagandcategoryController::class, 'edit_category'])->name('admin.category.edit');

    Route::post('/admin/tag-and-category/{id}/update-tag', [tagandcategoryController::class, 'update_tag'])->name('admin.tag.update');
    Route::post('/admin/tag-and-category/{id}/update-category', [tagandcategoryController::class, 'update_category'])->name('admin.category.update');
    //USER
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/users/{id}/delete', [UserController::class, 'delete'])->name('admin.user.delete');

    //CONTACT

    Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact.home');

    Route::get('/admin/contact/{id}/delete', [ContactController::class, 'delete'])->name('admin.contact.delete');
});
