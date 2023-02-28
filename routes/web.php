<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminAddSliderComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminEditSliderComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSliderComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\ProdutDetailComponent;
use App\Http\Livewire\SearchResultComponent;
use App\Http\Livewire\User\UserDashboardComponent;

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

Route::get('/',HomeComponent::class)->name('home');
Route::get('/about',AboutComponent::class)->name('about');
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/cart',CartComponent::class)->name('cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/contact',ContactComponent::class)->name('contact');
Route::get('/product/{slug}',ProdutDetailComponent::class)->name('product.detail');
Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchResultComponent::class)->name('product.search');
// For User
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});

// For Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/category',AdminCategoryComponent::class)->name('admin.category');
    Route::get('/admin/add/category',AdminAddCategoryComponent::class)->name('admin.add_category');
    Route::get('/admin/edit/category/{category_slug}',AdminEditCategoryComponent::class)->name('admin.edit_category');
    Route::get('/admin/product',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/add/product', AdminAddProductComponent::class)->name('admin.add_product');
    Route::get('/admin/edit/product/{product_slug}', AdminEditProductComponent::class)->name('admin.edit_product');
    Route::get('/admin/slider',AdminSliderComponent::class)->name('admin.sliders');
    Route::get('/admin/add/slider',AdminAddSliderComponent::class)->name('admin.add_slider');
    ROute::get('/admin/edit/slider/{slider_id}',AdminEditSliderComponent::class)->name('admin.edit_slider');
});
