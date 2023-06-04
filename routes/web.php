<?php

use App\Http\Controllers\{
    Grades\GradeController,
    Classrooms\ClassroomController,
    Sections\SectionController,
    Myparents\MyparentController,
    Teachers\TeacherController,
    Students\StudentController,
    Students\PromotionController,
    Students\FeeController,
    Students\FeeInvoiceController,
    Students\ReceiptStudentController,
    Students\ProcessingFeeController,
    Students\PaymentStudentController,
    Students\AttendanceController,
    SettingController,
};

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

Route::get('/', fn () => redirect()->route('login'));

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::resource('grades', GradeController::class);

    Route::resource('classrooms', ClassroomController::class);
    Route::post('delete_all_c', [ClassroomController::class, 'delete_all_c'])->name('delete_all_c');
    Route::post('Filter_Classes_Grade', [ClassroomController::class, 'Filter_Classes_Grade'])->name('Filter_Classes_Grade');
    Route::resource('sections', SectionController::class);
    Route::get('classes/{id}', [SectionController::class, 'getclasses']);

    Route::resource('myparents', MyparentController::class);

    Route::resource('teachers', TeacherController::class);
    Route::post('delete_all_t', [TeacherController::class, 'delete_all_t'])->name('delete_all_t');

    Route::resource('students', StudentController::class);
    Route::post('delete_all_s', [StudentController::class, 'delete_all_s'])->name('delete_all_s');
    Route::get('/GetClassrooms/{id}', [StudentController::class, 'GetClassrooms']);
    Route::get('/GetSections/{id}', [StudentController::class, 'GetSections']);
    Route::post('UploadAttachment', [StudentController::class, 'UploadAttachment'])->name('UploadAttachment');
    Route::get('DownloadAttachment/{studentsname}/{filename}', [StudentController::class, 'DownloadAttachment'])->name('DownloadAttachment');
    Route::post('DeleteAttachment', [StudentController::class, 'DeleteAttachment'])->name('DeleteAttachment');
    Route::resource('promotions', PromotionController::class);
    Route::resource('fees', FeeController::class);
    Route::resource('fee_invoices', FeeInvoiceController::class);
    Route::resource('receipt_students', ReceiptStudentController::class);
    Route::resource('processing_fees', ProcessingFeeController::class);
    Route::resource('payment_students', PaymentStudentController::class);
    Route::resource('attendances', AttendanceController::class);


    Route::resource('settings', SettingController::class);
});
