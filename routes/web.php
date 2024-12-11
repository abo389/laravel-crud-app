<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn()=> redirect("customer"));

Route::get("customer/trash", [CustomerController::class, "trash"])->name("customer.trash");
Route::get("customer/{customer}/restore", [CustomerController::class, "restore"])->name("customer.restore");
Route::delete("customer/{customer}/forceDestroy", [CustomerController::class, "forceDestroy"])->name("customer.forceDestroy");
Route::resource("customer", CustomerController::class);
