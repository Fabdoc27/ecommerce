<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::post( '/paymentIPN', [InvoiceController::class, 'paymentIPN'] );