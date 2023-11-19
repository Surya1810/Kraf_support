<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    $project = Project::all()->count();

    return view('dashboard.index', compact('project'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // User | Employee
    Route::resource('employee', UserController::class);
    // Department
    Route::resource('department', DepartmentController::class);

    // Profile Section
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password/{id}', [ProfileController::class, 'password'])->name('profile.password');
    Route::delete('/profile/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Product
    Route::resource('product', ProductController::class);

    // Project Management
    Route::resource('project', ProjectController::class);
    // Route::get('/project/archive', [ProjectController::class, 'archive'])->name('project.archive');
    Route::get('/project/detail/{kode}', [ProjectController::class, 'detail'])->name('project.detail');
    Route::get('/project/task/{kode}', [ProjectController::class, 'task'])->name('project.task');
    Route::get('/project/review/{kode}', [ProjectController::class, 'review'])->name('project.review');
    Route::post('/project/done/{id}', [ProjectController::class, 'done'])->name('project.done');

    //Task Management
    Route::resource('task', TaskController::class)->except([
        'store'
    ]);
    Route::post('/task/{id}', [TaskController::class, 'store'])->name('task.store');
    Route::get('/task/status/{id}', [TaskController::class, 'status'])->name('task.status');

    // Agent
    Route::resource('agent', AgentController::class);

    //Network
    Route::resource('network', NetworkController::class);

    //Blog
    Route::resource('blog', BlogController::class);
    Route::get('/blog/status/{id}', [BlogController::class, 'status'])->name('blog.status');
});

Auth::routes();
// require __DIR__ . '/auth.php';
