<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\frontend\FrontendCategoryController;
use App\Http\Controllers\frontend\FrontendProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('Front/index', [PublicController::class, 'index'])->name('homepage');
Route::get('Front/cart', [PublicController::class, 'cart'])->name('Cart');
Route::get('Front/checkout', [PublicController::class, 'checkout'])->name('Check');
Route::get('Front/order', [PublicController::class, 'order'])->name('order');
Route::get('Front/shop', [PublicController::class, 'shop'])->name('Shop');
Route::get('Front/checkout', [PublicController::class, 'product'])->name('Product');
Route::get('/about', [PublicController::class, 'about'])->name('About');
// Route::get('Front/index', [PublicController::class, 'index']);
// Route::get('Front/cart', [PublicController::class, 'cart'])->name('Cart');
// Route::get('Front/checkout', [PublicController::class, 'checkout'])->name('Check');
// Route::get('Front/order', [PublicController::class, 'order'])->name('order');
// Route::get('Front/shop', [PublicController::class, 'shop'])->name('Shop');
// Route::get('Front/checkout', [PublicController::class, 'product'])->name('Product');
// Route::get('/about', [PublicController::class, 'about'])->name('About');

// Route::get('/sign-in', [AuthController::class, 'login'])->name('sign_in');
// Route::get('/sign-up', [AuthController::class, 'registration'])->name('sign_up');
//route group*****************************************************
// Route::controller(ProductsController::class)->prefix('products')->group(function(){
//     Route::get('/','index')->name('pro_index');
//     Route::get('/create','create')->name('pro_create');
//     Route::get('/show','show')->name('pro_show');
// });
//middleware******************************************************
//Route::get('/admin',[DashboardController::class,'dashboard' ])->middleware('admin');
// Route::middleware('admin')->group(function(){
//     Route::get('/admin',[DashboardController::class,'dashboard' ]);
//     Route::controller(ProductsController::class)
//     ->name('products.')
//     ->prefix('products')
//     ->group(function(){
//         Route::get('/','index')->name('index');
//         // Route::get('/create','create')->name('create');
//         Route::get('/show','show')->name('show');
//     });
//     // Route::fallback(function () {
//     //     echo "Sorry";
//     // });
// });
//basic routing***************************************************
// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/index', function () {
//     return "hello world";
// });
//view route*****************************
// Route::view('/', 'index');
//fallback route*************************
// Route::fallback(function () {
//     echo "Sorry";
// });

//redirect*******************************
//Route::redirect('/here', '/ounnokisu');
//require parameter*********************************************************
// Route::get('/products/{id?}', [ProductsController::class, 'show']);
// Route::get('/products/create', [ProductsController::class, 'create']);
Route::get('/', [FrontendController::class, 'index'])->name('Homepage');
Route::get('/category', [FrontendController::class,'category']);
Route::get('/components/frontend/layout/master', [FrontendController::class, 'master'])->name('frontend.master');
Route::get('/category/{category}/products', [FrontendController::class, 'categoryWiseProducts'])->name('categories.products');
Route::get('/products/{product}', [FrontendController::class, 'productDetails'])->name('frontend.product.detail');
Route::post('/products/{product}/comments', [CommentController::class, 'store'])->name('products.comments.store');
Route::get('/components/backend/layout/master', [BackendController::class, 'master'])->name('backend.master');
Route::get('/backend/index', [BackendController::class, 'index']);

// Route::get('/products/{product}/booking', [BookingController::class, 'booking'])->name('booking');

// Route::get('/products/{product}/checkout-address', [BookingController::class, 'checkoutAddress'])->name('checkout.address');
// Route::get('/products/{product}/checkout-payment', [BookingController::class, 'checkoutPayment'])->name('checkout.payment');
// Route::get('/products/{product}/checkout-review', [BookingController::class, 'checkoutReview'])->name('checkout.review');



Route::get('/faqs', [FaqController::class,'frontendshow'])->name('faqs.frontend');

Route::middleware('auth','isAdmin')->prefix('backend')->group(function () {
    Route::get('/', [BackendController::class, 'index'])->name('backend.index');
    // Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    // Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    
    // Route::get('/colors', [ColorController::class, 'index'])->name('colors.index');
    // Route::get('/colors/create', [ColorController::class, 'create'])->name('colors.create');
    // Route::post('/colors', [ColorController::class, 'store'])->name('colors.store');
    // Route::get('/colors/{color}', [ColorController::class, 'show'])->name('colors.show');
    // Route::get('/colors/{color}/edit', [ColorController::class, 'edit'])->name('colors.edit');
    // Route::patch('/colors/{color}/edit', [ColorController::class, 'update'])->name('colors.update');
    // Route::delete('/colors/{color}', [ColorController::class, 'destroy'])->name('colors.destroy');
    Route::get('/products/trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::patch('/products/trash/{id}', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('/products/trash/{id}', [ProductController::class, 'delete'])->name('products.delete');
   
    Route::get('/products/list/{category}', [CategoryController::class, 'productlist'])->name('products.list');
    Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::patch('/categories/trash/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('/categories/trash/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::get('categories/download-pdf', [CategoryController::class, 'downloadPdf'])->name('categories.download_pdf');
    Route::get('categories/download-excel', [CategoryController::class, 'downloadExcel'])->name('categories.download_excel');
    
    Route::get('/courses/trash', [CourseController::class, 'trash'])->name('courses.trash');
    Route::get('courses/download-pdf', [CourseController::class, 'downloadPdf'])->name('courses.download_pdf');
    Route::get('courses/download-excel', [CourseController::class, 'downloadExcel'])->name('courses.download_excel');
    Route::resource('courses', CourseController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('tags', TagController::class);
    Route::resource('districts', DistrictController::class); 
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('faqs', FaqController::class);
    
    
     // ===============Slider==============

     Route::get('/sliders/trash', [SliderController::class, 'trash'])->name('sliders.trash');     
     Route::patch('/sliders/trash/{id}', [SliderController::class, 'restore'])->name('sliders.restore');
     Route::delete('/sliders/trash/{id}', [SliderController::class, 'delete'])->name('sliders.delete');

     Route::resource('sliders', SliderController::class);


    
});

Route::prefix('frontend')->group(function () {
    
});



Route::middleware('auth','isUser')->group(function () {
    Route::get('booking-list/{user}',  [CustomerController::class, 'booking'])->name('customer.bookingList');
    Route::get('wishlist/{user}',  [CustomerController::class, 'wishlist'])->name('customer.wishlist');
    Route::get('/my-account/{user}',  [CustomerController::class, 'account'])->name('customer.account');
});


Route::middleware(['auth'])->group(function () {
    // Route::get('account/{user}',  [ProfileController::class, 'account'])->name('customer.profile');
    Route::get('profile/{user}',  [ProfileController::class, 'profile'])->name('user.profile');
    Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('profile/{user}/edit',  [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/products/{product}/checkout-address', [BookingController::class, 'checkoutAddress'])->name('checkout.address');
    Route::get('/products/{product}/checkout-payment', [BookingController::class, 'checkoutPayment'])->name('checkout.payment');
    Route::get('/products/{product}/checkout-review', [BookingController::class, 'checkoutReview'])->name('checkout.review');
    Route::patch('/bookings', [BookingController::class, 'store'])
    ->name('bookings.store');

});
Route::get('/products/{product}/booking', [BookingController::class, 'booking'])->name('booking');

Route::post('/products/{product}/booking', [OrderController::class, 'booking'])->name('booking.store');
    Route::delete('cart-items/{cartItem}', [CartController::class, 'destroy'])->name('carts.destory');
    Route::post('products/{product}/cart', [CartController::class, 'store'])->name('carts.store');
    Route::get('/cart-items', [CartController::class, 'index'])->name('carts.index');



// Route::delete('cart-items/{cartItem}', [CartController::class, 'destroy'])
//     ->name('carts.destory')
//     ->middleware('auth');

// Route::post('products/{product}/cart', [CartController::class, 'store'])
//     ->name('carts.store')
//     ->middleware('auth');

// Route::get('/cart-items', [CartController::class, 'index'])
//     ->name('carts.index')
//     ->middleware('auth');
