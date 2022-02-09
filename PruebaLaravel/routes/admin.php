<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployesController;

// COMO YA TENGO EL PREFIJO EN ROUTESERVICEPROVIDER NO ES NECESARIO ESCIBIRLO EN LA RUTA, YA TODAS LO LLEVARAN
Route::get('admin.home', [HomeController::class, 'index']);
Route::get('admin.companies', [CompaniesController::class, 'index'])->name('adminCompanies');
Route::post('admin.companies/store', [CompaniesController::class, 'store'])->name('adminCompaniesStore');
Route::get('admin.companies/{company}/edit', [CompaniesController::class, 'edit'])->name('adminCompaniesEdit');
Route::put('admin.companies/update/{company}', [CompaniesController::class,'update'])->name('adminCompaniesUpdate');
Route::delete('admin.companies/{company}',[CompaniesController::class,'destroy'])->name('adminCompaniesDestroy');

Route::get('/set_language/{lang}', [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');


Route::get('admin.employes', [EmployesController::class, 'index'])->name('adminEmployes');
Route::post('admin.employes/store', [EmployesController::class, 'store'])->name('adminEmployesStore');
Route::get('admin.employes/{employe}/edit', [EmployesController::class, 'edit'])->name('adminEmployesEdit');
Route::put('admin.employes/update/{employe}', [EmployesController::class,'update'])->name('adminEmployesUpdate');
Route::delete('admin.employes/{employe}',[EmployesController::class,'destroy'])->name('adminEmployesDelete');

