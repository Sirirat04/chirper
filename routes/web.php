<?php        //สำหรับแอปพลิเคชันที่ใช้ Inertia.js ซึ่งเชื่อมต่อกับ Vue.js หรือ React เพื่อสร้างหน้าเว็บ//

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChirpController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;

Route::get('/', function () {                       //เมื่อผู้ใช้ไปที่หน้าแรกระบบจะส่งข้อมูลไปยังหน้า Welcome พร้อมข้อมูลต่างๆ//
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),     //เช็คว่ามีเส้นทางเข้าสู่ระบบหรือไม่//
        'canRegister' => Route::has('register'),   //เช็คว่ามีเส้นทางการสมัครสมาชิกหรือไม่//
        'laravelVersion' => Application::VERSION,     //แสดงเวอร์ชันของ Laravel ที่ใช้งาน//
        'phpVersion' => PHP_VERSION,     // แสดงเวอร์ชันของ PHP ที่ใช้งาน//
    ]);
});

Route::get('/dashboard', function () {  //เมื่อผู้ใช้ไปที่หน้าdashระบบจะส่งข้อมูลไปยังหน้า Dashboard ผ่าน Inertia//
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); //สำหรับสร้างลิงก์ไปยังหน้าแดชบอร์ด//

Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->middleware(['auth', 'verified']); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');  //แก้ไขโปร//
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  //อัปเดต//
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  //ลบโปร//
});

Route::resource('chirps', ChirpController::class)  //ใช้ Route::resource เพื่อสร้างเส้นทางที่เชื่อมโยงกับ ChirpController ซึ่งทำหน้าที่จัดการการสร้าง, แก้ไข, และลบ Chirp//
    ->only(['index', 'store', 'update', 'destroy'])  //เพิ่มการแก้ไข และ ลบหัวข้อ
    ->middleware(['auth', 'verified']);

    /*index: ดูรายการโพสต์
store: สร้างโพสต์ใหม่
update: อัปเดตโพสต์
destroy: ลบโพสต์*/

require __DIR__.'/auth.php';  //นำเข้าการตั้งค่าเกี่ยวกับการเข้าสู่ระบบอีเมลจากไฟล์//
