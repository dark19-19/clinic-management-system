<?php


use Illuminate\Support\Facades\Route;

// Authentication Functions Routes:
//Route::prefix('auth')->group(base_path('routes/api/auth.php'));

// Admin Functions Routes:
Route::prefix('admin')->group(base_path('routes/api/admin.php'));

// Patient Functions Routes:
Route::prefix('patient')->group(base_path('routes/api/patient.php'));

// Doctor Functions Routes:
Route::prefix('doctor')->group(base_path('routes/api/doctor.php'));

// Pharmacist Functions Routes:
Route::prefix('pharma')->group(base_path('routes/api/pharmacist.php'));

//Appointment Functions Routes:
Route::prefix('appointment')->group(base_path('routes/api/appointment.php'));

//Medical Record Functions Routes:
Route::prefix('record')->group(base_path('routes/api/medical_record.php'));

//Prescription Functions Routes:
Route::prefix('prescription')->group(base_path('routes/api/prescription.php'));

//Staff Functions Routes:
Route::prefix('staff')->group(base_path('routes/api/staff.php'));

//Medicine Functions Routes:
Route::prefix('medicine')->group(base_path('routes/api/medicine.php'));

//Payment Functions Routes:
Route::prefix('payment')->group(base_path('routes/api/payment.php'));


//          Authentication Routes:
// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->group(function () {
    //      Doctor Routes:
    // Route::prefix('doctor')->group(function () {

    //     Route::get('/', [DoctorController::class, 'index']);

    //     Route::middleware('isAdminstrative')->group(function () {
    //         Route::post('/', [DoctorController::class, 'store']);
    //         Route::put('/', [DoctorController::class, 'update']);
    //         Route::get('/id/{id}', [DoctorController::class, 'showById']);
    //         Route::get('/docId/{doc_id}', [DoctorController::class, 'showByDocId']);
    //         Route::delete('/{id}', [DoctorController::class, 'destroy']);
    //     });
    // });

    // Route::prefix('patient')->group(function () {
    //     Route::middleware('isAdminstrative')->group(function () {});
    //     Route::post('/', [PatientController::class, 'store']);
    //     Route::put('/{id}', [PatientController::class, 'update']);
    //     Route::get('/', [PatientController::class, 'index']);
    // });
// });
