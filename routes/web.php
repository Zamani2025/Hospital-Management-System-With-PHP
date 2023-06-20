<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\Admin\AddDoctorComponent;
use App\Http\Livewire\Admin\AdminAppointmentComponent;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AllDoctorsComponent;
use App\Http\Livewire\Admin\EditDoctorsComponent;
use App\Http\Livewire\Admin\EmailViewComponent;
use App\Http\Livewire\AppointmentComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DoctorsComponent;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeComponent::class)->middleware("auth", "verified")->name("home");
Route::get('/contact', ContactComponent::class)->middleware("auth", "verified")->name("contact");
Route::get('/about', AboutComponent::class)->middleware("auth", "verified")->name("about");
Route::get('/blog', BlogComponent::class)->middleware("auth", "verified")->name("blog");
Route::get('/doctors', DoctorsComponent::class)->middleware("auth", "verified")->name("doctors");
Route::post("/appointment", [AppointmentController::class, "store"])->middleware("auth", "verified")->name("appointment");
Route::get("/my-appointment", AppointmentComponent::class)->middleware("auth", "verified")->name("myappointment");
Route::delete("/cancel-appointment/{id}", [AppointmentController::class, 'destroy'])->middleware("auth")->name("cancel-appointment");
Route::put("/approved-appointment/{id}", [AppointmentController::class, 'update'])->middleware("auth")->name("approve");
Route::put("/cancel-appointments/{id}", [AppointmentController::class, 'show'])->middleware("auth")->name("cancel");


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'authadmin'
])->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/add-doctor', AddDoctorComponent::class)->name('admin.add_doctor');
    Route::get('/all-doctors', AllDoctorsComponent::class)->name('admin.all_doctor');
    Route::get('/update-doctors/{id}', EditDoctorsComponent::class)->name('admin.edit_doctor');
    Route::get('/admin-appointments', AdminAppointmentComponent::class)->name('admin.appointments');
    Route::get('/email-view/{id}', EmailViewComponent::class)->name('admin.emailview');
});
